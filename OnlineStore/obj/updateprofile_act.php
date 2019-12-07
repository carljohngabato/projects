<?php
include '../includes/sessions.php';

if(isset($_SESSION['login']))
{
  $user = $_SESSION['login'];
  $get_user = sqlsrv_query($conn, "SELECT * FROM UserInfo inner join UserAccounts on userGUID = userID WHERE userName = '$user'");
  $row = sqlsrv_fetch_array($get_user, SQLSRV_FETCH_ASSOC);
	$guid = $row['userID'];    
} 
if (isset($_POST['update_profile']))
{
	/*
	$user = $_GET['userID'];
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$update_profile = $mysqli->query("UPDATE users SET full_name = '$fullname',
                    gender = '$gender', age = $age, address = '$address'
                    WHERE username = '$user'");
    if ($update_profile) {
	   header("Location: profile.php?user=$user");
    } else {
	  echo $mysqli->error;
    }*/

//declare params userinfo
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$gender = $_POST['gender'];
	$about = $_POST['about'];
	$bdate = $_POST['bdate'];
	$homeAdd = $_POST['homeAdd'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	//$modified = $_POST[date('Y/m/d')];

	$params2 = array(
			array(&$fname, SQLSRV_PARAM_IN),
			array(&$lname, SQLSRV_PARAM_IN),
			array(&$mname, SQLSRV_PARAM_IN),
			array(&$gender, SQLSRV_PARAM_IN),
			array(&$about, SQLSRV_PARAM_IN),
			array(&$bdate, SQLSRV_PARAM_IN),
			array(&$homeAdd, SQLSRV_PARAM_IN),
			array(&$country, SQLSRV_PARAM_IN),
			array(&$zip, SQLSRV_PARAM_IN),
			array(&$email, SQLSRV_PARAM_IN),
			array(&$contact, SQLSRV_PARAM_IN),
			//array(&$modified, SQLSRV_PARAM_IN)
	);
	//call procedure query

	$update = "UPDATE UserInfo SET
							firstName = '$fname',
							lastName = '$lname',
							middleName = '$mname',
							gender = '$gender',
							about = '$about',
							birthDate = '$bdate',
							homeAddress = '$homeAdd',
							country = '$country',
							zipcode = '$zip',
							emailAddress = '$email',
							contactNumber = '$contact'
						WHERE
							userID = '$guid';
						";
	$rdr = sqlsrv_query($conn, $update, $params2);

	if($rdr === false){
		#sqlsrv_configure("WarningsReturnAsErrors", 0);
		echo (print_r(sqlsrv_errors(), true));
	}
	else{
		echo "<script>alert('Success')</script>";
		header ("Location: ../views/myprofile.php?id=$guid");
	}
	/*
	else{
		$rows = sqlsrv_has_rows($rdr);
		if($rows === true){
			echo "<script>alert('Registration Failed: Username is already taken')</script>";
		}
		else{
			$acctqry = "{call sp_register_init(?, ?, ?, ?, ?)}";
			$stmt = sqlsrv_query($conn, $acctqry, $params2);
			echo (print_r(sqlsrv_errors(), true));
			echo "<script>alert('Congratulations: You have joined the club')</script>";
		}
	}*/
}
?>