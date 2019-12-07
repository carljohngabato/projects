<?php
$serverName = "KUYAPAW-LAPTOP\SQLEXPRESS";

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"db_OnlineStore");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn == false ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
