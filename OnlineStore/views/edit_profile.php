<?php
include '../includes/sessions.php';

if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  $get_user = sqlsrv_query($conn, "SELECT * FROM UserInfo inner join UserAccounts on userGUID = userID WHERE userName = '$user'");
  $row = sqlsrv_fetch_array($get_user, SQLSRV_FETCH_ASSOC);
  /*
  $date = $row['birthDate'];
  $result = $date->format('Y-m-d H:i:s');
  if ($result) {
  echo $result;
  } else { // format failed
    echo "Unknown Time";
  }*/
} 

?>
<!DOCTYPE html>
<html>
	<head>  
		<meta charset="UTF-8">
		<title><?php echo $row['firstName'].', '.$row['lastName'] ?>'s Profile Settings</title>
	</head> 
	<body>
		Back to <a href="myprofile.php?id=<?php echo $row['userGUID'] ?>"><?php echo $row['lastName'].', '.$row['firstName'] ?></a>'s Profile        
		<h3>Update Profile Information</h3> 
			<form method="post" action="../obj/updateprofile_act.php?id=<?php echo $row['userGUID'] ?>">
				<label>First Name:</label><br>
				<input type="text" name="fname" value="<?php echo $row['firstName']?>" /><br>
        <label>Last Name:</label><br>
				<input type="text" name="lname" value="<?php echo $row['lastName'] ?>" /><br>
        <label>Middle Name:</label><br>
				<input type="text" name="mname" value="<?php echo $row['middleName'] ?>" /><br>
				<label>Gender:</label><br>
				<input type="text" name="gender" value="<?php echo $row['gender'] ?>" /><br>
        <label>About:</label><br>
				<input type="text" name="about" value="<?php echo $row['about'] ?>" /><br>
        <label>Birthdate:</label><br>
				<input type="text" name="bdate" value="<?php echo $row['birthDate'] ?>" /><br>
				<label>Address:</label><br>
				<input type="text" name="homeAdd" value="<?php echo $row['homeAddress'] ?>" /><br>
        <label>Country:</label><br>
				<input type="text" name="country" value="<?php echo $row['country'] ?>" /><br>
        <label>Zip Code:</label><br>
				<input type="text" name="zip" value="<?php echo $row['zipcode'] ?>" /><br>
        <label>Email Address:</label><br>
				<input type="text" name="email" value="<?php echo $row['emailAddress'] ?>" /><br>
        <label>Contact Number:</label><br>
				<input type="text" name="contact" value="<?php echo $row['contactNumber'] ?>" /><br>
				<input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
	</body>
</html>