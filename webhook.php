<?php

$dbHost = 'your_mysql_host';
$dbUser = 'your_mysql_user';
$dbPassword = 'your_mysql_password';
$dbName = 'your_mysql_database';
$tokenwebhook = 'your_token_here';

$id = $_POST['id'] ?? null;
$newBalance = $_POST['new_balance'] ?? null;
$token = $_POST['token'] ?? null;

if($token!=$tokenwebhook){
    http_response_code(400);
    exit('Invalid token');
}

if (!$id || !$newBalance) {
    http_response_code(400);
    exit('Invalid payload');
}

$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($connection->connect_error) {
    http_response_code(500);
    exit('Database connection failed');
}

$id = $connection->real_escape_string($id);

$newBalance = $connection->real_escape_string($newBalance);

$updateQuery = "UPDATE users SET balance = '$newBalance' WHERE id = '$id'";

if ($connection->query($updateQuery) === true) {
    http_response_code(200);
    echo 'User balance updated successfully';
} else {
    http_response_code(500);
    echo 'Error updating user balance: ' . $connection->error;
}

// Close the database connection
$connection->close();
