<?php
/*
db_connect.php
*/
define("HOST", "localhost"); // The host you want to connect to.
define("USER", "client"); // The database username.
define("PASSWORD", "pass"); // The database password. 
define("DATABASE", "client_info"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
?>