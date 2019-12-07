<?php
include '../includes/sessions.php';
if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  $get_user = sqlsrv_query($conn, "SELECT * FROM UserInfo inner join UserAccounts on userGUID = userID inner join MembershipType on memberID = userGUID WHERE userName = '$user'");
  $rdr = sqlsrv_fetch_array($get_user, SQLSRV_FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	        <title><?php echo $rdr['firstName'].', '.$rdr['lastname'] ?>'s Profile</title>
</head>
<body>
  <?php include '../layouts/navigation.php'; ?>
    <a href="welcome.php">Home</a> | <?php echo $rdr['lastName'].', '.$rdr['firstName'] ?>'s Profile
    <h3>Personal Information | <?php $visitor = $_SESSION['login'];
           if ($user == $visitor)
{ ?>            <a href="edit_profile.php?id=<?php echo $rdr['userGUID'] ?>">Edit Profile</a>
<?php
}
?>
    </h3>
        <table>
            <tr>
            	<td>Name:</td><td><?php echo $rdr['firstName'].', '.$rdr['lastName'] ?></td>
            </tr>
            <tr>
                <td>Gender:</td><td><?php echo $rdr['gender'] ?></td>
            </tr>
            <tr>
                <td>Address:</td><td><?php echo $rdr['homeAddress'] ?></td>
            </tr>
            <tr>
                <td>MembershipType:</td><td><?php echo $rdr['membershipType'] ?></td>
            </tr>
            <tr>
                <td>Store:</td><td><?php echo $rdr['hasStore'] ?></td>
            </tr>
        </table>
    </body>
</html>
