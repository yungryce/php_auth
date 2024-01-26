<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

define('DB_HOST', 'localhost');
define('DB_USER', 'juk');
define('DB_PASS', 'jUkTeK9@');
define('DB_NAME', 'auth');

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_errno) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}
