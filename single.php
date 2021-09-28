<?php
include 'connect.php';
$id=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM users WHERE id='$id'");
$stmt->execute();
$users=$stmt->fetch();
echo '<pre>';
// userName
print_r($users);

//http://localhost/rcc29-7-2021/single.php?id=1