<?php 
define("HOST", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DBNAME", 'gpay');

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

// if ($link) {
//     echo "Connection was successful";
// } else {
//     echo "Connection not successful";
//     die;
// }