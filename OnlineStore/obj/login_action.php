<?php
  require_once '../config/conn.php';

  $username= $_POST['userName'];
  $userpass= hash('sha256', $_POST['userPass']);
  $params = array(
    array(&$username, SQLSRV_PARAM_IN),
    array(&$userpass, SQLSRV_PARAM_IN)
  );

  $query = "{call sp_login(?, ?)}";
  $stmt = sqlsrv_query($conn, $query, $params);
  $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

  if($stmt === false){
    sqlsrv_configure("WarningsReturnAsErrors", 0);
  }
  else{
    $rows = sqlsrv_has_rows($stmt);
    if($rows === true){
      $_SESSION['login'] = $_POST['userName'];
      header("location:welcome.php");
    }
    else{
      $_SESSION['login']=$_POST['userName'];
      echo "<script>alert('Login Failed: Username or Password incorrect');</script>";
      $extra="login.php";
    }
  }
  sqlsrv_close($conn);
?>
