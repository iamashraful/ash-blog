<?php

$servername = "localhost";  // Host name. may be localhost
$username = "admin";  // database user name
$password = "admin";  // Change the password if you need
$database = "ash_blog";  // database name
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Success!!";

