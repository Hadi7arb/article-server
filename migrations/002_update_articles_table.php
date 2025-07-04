<?php 
require("../connection/connection.php");


$query = "ALTER TABLE articles
            
        ADD COLUMN category_id INT NULL,
        ADD CONSTRAINT fk_articleCategory 
        FOREIGN KEY (category_id) 
        REFERENCES categories(category_id) 
        ON DELETE CASCADE";

$execute = $mysqli->prepare($query);
$execute->execute();