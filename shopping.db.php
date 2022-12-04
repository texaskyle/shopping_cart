<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shopping cart";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

$shipping_cost = 50; //shipping cost or transport cost
$taxes = array(       //other taxes on the product
    'VAT'=>10,
    'service tax'=>5 );

 if (!$conn) {
    die('connection to the database error'.mysqli_connect_error());
}else{
    echo "connection to the database successsful <br>";
}


?>