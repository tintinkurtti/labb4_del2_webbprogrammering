<?php
$site_title = "Min webbplats";
$divider = " | ";

$servername = "studentmysql.miun.se";
$username = "tiku2200";
$password = "*********";
$dbname = "tiku2200";

// Create connection to the database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
