<?php

$db_host = "localhost:3306";
$db_username = "root";
$db_password = "";
$db_name = "save-you-link";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
