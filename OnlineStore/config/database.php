<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "KUYAPAW-LAPTOP\SQLEXPRESS";
    private $connectionInfo = array( "Database"=>"db_OnlineStore"); 
 
    // get the database connection
    public function getConnection(){
      $conn = sqlsrv_connect( $this->host, $this->connectionInfo);
        
        if($conn == false ) {
             echo "Connection could not be established.<br />";
             die( print_r( sqlsrv_errors(), true));
        }
    }
 
}
?>