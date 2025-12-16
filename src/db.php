<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123"; // the most safe passwd))
$dbName = "vasilev";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create DataBase";
}
mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create table users";
}


mysqli_close($link);

?>