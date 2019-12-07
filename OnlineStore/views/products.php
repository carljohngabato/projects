<?php
// start session
//session_start();
// connect to database
include '../includes/sessions.php';
include '../config/database.php';

// include objects
include_once "../obj/product.php";
include_once "../obj/product_img.php";

// class instances will be here
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

// get ID of the product to be edited
$id = isset($_GET['prodID']) ? $_GET['prodID'] : die('ERROR: missing ID.');

// set the id as product id property
$product->id = $id;

// to read single record product
$product->readOne();

// set page title
$page_title = $product->name;

// product thumbnail will be here// set product id
$product_image->product_id=$id;

// read all related product image
$stmt_product_image = $product_image->readByProductId();

// count all relatd product image
$num_product_image = $stmt_product_image->rowCount();

echo "<div class='col-md-1'>";
    // if count is more than zero
    if($num_product_image>0){
        // loop through all product images
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            // image name and source url
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
    }else{ echo "No images."; }
echo "</div>";

// product image will be here
echo "<div class='col-md-4' id='product-img'>";

    // read all related product image
    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();

    // if count is more than zero
    if($num_product_image>0){
        // loop through all product images
        $x=0;
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            // image name and source url
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            $show_product_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }else{ echo "No images."; }
echo "</div>";

// product details will be here
echo "<div class='col-md-5'>";

    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->price, 2, '.', ',') . "</h4>";

    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";
        // make html
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));

        // show to user
        echo $page_description;
    echo "</div>";

    echo "<div class='product-detail'>Product category:</div>";
    echo "<div class='m-b-10px'>{$product->category_name}</div>";

echo "</div>";

echo "<div class='col-md-2'>";

    // if product was already added in the cart
    if(array_key_exists($id, $_SESSION['cart'])){
        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Update Cart";
        echo "</a>";

    }

    // if product was not added to the cart yet
    else{

        echo "<form class='add-to-cart-form'>";
            // product id
            echo "<div class='product-id display-none'>{$id}</div>";

            echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
            echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";

            // enable add to cart button
            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
            echo "</button>";

        echo "</form>";
    }
echo "</div>";

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

// set page title
$page_title="Products";

// page header html
include '../layouts/head.php';
echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
        echo "</div>";
    }

    if($action=='exists'){
        echo "<div class='alert alert-info'>";
            echo "Product already exists in your cart!";
        echo "</div>";
    }
echo "</div>";
// read all products in the database
$stmt=$product->read($from_record_num, $records_per_page);

// count number of retrieved products
$num = $stmt->rowCount();

// if products retrieved were more than zero
if($num>0){
    // needed for paging
    $page_url="products.php?";
    $total_rows=$product->count();

    // show products
    include_once "read_products_template.php";
}

// tell the user if there's no products in the database
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}
// contents will be here

// layout footer code
include '../layouts/footer.php';
?>
