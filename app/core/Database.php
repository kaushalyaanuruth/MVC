<?php  

$string = "mysql:host=localhost;";

$connection = new PDO($string, "root", "");

show($connection);