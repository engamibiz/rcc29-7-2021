<?php
include 'connect.php';
$stmt=$conn->prepare("SELECT * FROM users");
$stmt->execute();
$users=$stmt->fetchAll();
echo '<pre>';
print_r($users);
?>