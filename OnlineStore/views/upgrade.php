<?php
include '../includes/sessions.php';

if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  $get_user = sqlsrv_query($conn, "SELECT userGUID, membershipType, firstname, lastName, hasStore FROM UserAccounts inner join UserInfo on userID = userGUID inner join MembershipType on memberID = userGUID WHERE userName = '$user'");
  $row2 = sqlsrv_fetch_array($get_user, SQLSRV_FETCH_ASSOC);
  /*
  $date = $row['birthDate'];
  $result = $date->format('Y-m-d H:i:s');
  if ($result) {
  echo $result;
  } else { // format failed
    echo "Unknown Time";
  }*/
}
echo $row2['userGUID'];
echo $row2['membershipType'];
echo $row2['hasStore'];
?>
<!DOCTYPE html>
<html>
	<head>  
		<meta charset="UTF-8">
		<title><?php echo $row2['firstName'].', '.$row2['lastName'] ?>'s Membership Settings</title>
	</head> 
	<body>
		Back to <a href="myprofile.php?id=<?php echo $row['userGUID'] ?>"><?php echo $row['lastName'].', '.$row['firstName'] ?></a>'s Profile       
		<h3>Update Profile Information</h3> 
			<form method="post" action="../obj/upgrade_act.php?id=<?php echo $row2['userGUID'] ?>">
				<label>Membership Type:</label><br>
				<input type="text" name="membershipType" value="<?php echo $row2['membershipType']?>" /><br>
				<input type="submit" name="upgrade" value="Upgrade Account" />       
		</form>   
	</body>
</html>
