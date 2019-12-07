<?php
  include '../config/conn.php';
  include '../includes/guid.php';

  //declare params useraccount and userinfo
  $uname = $_POST['userName'];
  $upass = hash('sha256', $_POST['userPass']);
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $email = $_POST['emailAddress'];

  $params2 = array(
    array(&$uname, SQLSRV_PARAM_IN),
    array(&$upass, SQLSRV_PARAM_IN),
      array(&$fname, SQLSRV_PARAM_IN),
      array(&$lname, SQLSRV_PARAM_IN),
      array(&$email, SQLSRV_PARAM_IN)
  );
  //call procedure query

  $validate = "{call validateUID (?)}";
  $rdr = sqlsrv_query($conn, $validate, $params2);

  if($rdr === false){
    #sqlsrv_configure("WarningsReturnAsErrors", 0);
  }
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
  }
?>
