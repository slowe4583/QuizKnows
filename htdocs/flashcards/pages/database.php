<?php
// Create connection
$db_conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($db_conn->connect_error) {
  die("Database connection failed: " . $db_conn->connect_error);
}
?>