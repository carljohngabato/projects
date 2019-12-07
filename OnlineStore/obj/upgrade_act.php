<?php
include '../includes/sessions.php';

if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  $get_user = sqlsrv_query($conn, "SELECT * FROM UserInfo inner join UserAccounts on userGUID = userID inner join MembershipType on userGUID = memberID WHERE userName = '$user'");
  $rdr = sqlsrv_fetch_array($get_user, SQLSRV_FETCH_ASSOC);
	$guid = $rdr['memberID'];
  $userid = $rdr['userID'];
  $type = $rdr['membershipType'];
}
if (isset($_POST['upgrade']))
{
//declare params userinfo
	$type = $_POST['membershipType'];

	$params2 = array(
			array(&$type, SQLSRV_PARAM_IN)
			//array(&$modified, SQLSRV_PARAM_IN)
	);
	//call procedure query

	$update = "UPDATE MembershipType SET
							membershipType = '$type'
						WHERE
							memberID = '$guid';
						";
  if($type !== 'Free'){
    $update2 = "UPDATE UserInfo SET
							hasStore = '1'
						WHERE
							userID = '$userid';
						";
  }
  else if($type === 'Free'){
    $update2 = "UPDATE UserInfo SET
              hasStore = '0'
            WHERE
              userID = '$userid';
            ";
  }
	$rdr = sqlsrv_query($conn, $update, $params2);
  $rdr2 = sqlsrv_query($conn, $update2);

	if($rdr === false || $rdr2 === false){
		#sqlsrv_configure("WarningsReturnAsErrors", 0);
		echo (print_r(sqlsrv_errors(), true));
	}
	else{
		echo "<script>alert('Success')</script>";
		header ("Location: ../views/myprofile.php?id=$guid");
	}
}
?>
