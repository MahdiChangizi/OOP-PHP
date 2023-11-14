<?php

$host = 'localhost';
$dbName = 'oop';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbName, $username,  $password);
}
catch (Exception $e) {
    echo $e->getMessage();
}
