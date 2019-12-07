<?php
include '../includes/sessions.php';
if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  include '../includes/readall.php';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	        <title><?php echo json_encode($arrayrdr['firstName']).', '.json_encode($arrayrdr['lastname']) ?>'s Store</title>
</head>
<body>
  <?php include '../layouts/navigation.php'; ?>
    <?php echo json_encode($arrayrdr['lastName']).', '.json_encode($arrayrdr['firstName']) ?>'s Profile
    <h3>Personal Information | <?php $visitor = $_SESSION['login'];
           if ($user == $visitor)
{ ?>            <a href="edit_store.php?id=<?php echo $arrayrdr['userGUID'] ?>">Edit Store</a>
<?php
}
?>
    </h3>
        <table>
            <tr>
            	<td>Store Name:</td><td><?php echo $arrayrdr['storeName'] ?></td>
            </tr>
            <tr>
                <td>Store Address:</td><td><?php echo $arrayrdr['storeAddress'] ?></td>
            </tr>
            <tr>
                <td>About</td><td><?php echo $arrayrdr['aboutSTore'] ?></td>
            </tr>
        </table>
    </body>
</html>
