<?php

class ProductImage{
 
    // database connection and table name
    private $conn;
    private $table_name = "Product_Images";
 
    // object properties
    public $id;
    public $product_id;
    public $name;
    public $timestamp;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
}
// read the first product image related to a product
function readFirst(){

    // select query
    $query = "SELECT imgID, prodID, prodimgName
            FROM " . $this->table_name . "
            WHERE prodID = ?
            ORDER BY prodName DESC
            LIMIT 0, 1";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind prodcut id variable
    $stmt->bindParam(1, $this->product_id);

    // execute query
    $stmt->execute();

    // return values
    return $stmt;
}

// read all product image related to a product
function readByProductId(){

    // select query
    $query = "SELECT imgID, prodID, prodimgName
            FROM " . $this->table_name . "
            WHERE prodID = ?
            ORDER BY prodimgName ASC";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // sanitize
    $this->product_id=htmlspecialchars(strip_tags($this->product_id));

    // bind prodcut id variable
    $stmt->bindParam(1, $this->product_id);

    // execute query
    $stmt->execute();

    // return values
    return $stmt;
}
?>
