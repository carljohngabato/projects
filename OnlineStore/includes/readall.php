<?php
include '../config/conn.php';
  $qry_all = "{call sp_userqryAll}";
  $stmt = sqlsrv_query($conn, $qry_all);
  $arrayrdr = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
