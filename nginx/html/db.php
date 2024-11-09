<?php
$connections = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);
if ($connections->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$connections->set_charset("utf8mb4");
?>