<?php
session_start();
  include '../config/conn.php';

  $user_check = $_SESSION['login'];
  $qry = "Select userGUID, firstName, lastName from UserAccounts inner join UserInfo on userGUID = userID where userName = '$user_check' ";
  $ses_qry = sqlsrv_query($conn, $qry);
  $row = sqlsrv_fetch_array($ses_qry, SQLSRV_FETCH_ASSOC);
  $login_session = $row['firstName']. ', ' .$row['lastName'];

  if(!isset($_SESSION['login'])){
    header("location:login.php");
    die();
  }
?>
