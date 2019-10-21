<?php
// Database configuration
$dbHost     = "mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbUsername = "h7l9ehepp73f4lp6";
$dbPassword = "qn81i2ospadx0b5v";
$dbName     = "jvkaflsb5i15egxa";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
