<?php 
require("../connection/connection.php");


$query = "CREATE TABLE categories(
          category_id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          name VARCHAR(255) NOT NULL)"; 
          
$execute = $mysqli->prepare($query);
$execute->execute();