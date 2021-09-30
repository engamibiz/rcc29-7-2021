<?php
/*include 'connect.php';
$stmt=$conn->prepare("SELECT * FROM users");
$stmt->execute();
$users=$stmt->fetchAll();
echo '<pre>';
print_r($users);
*/
include 'model.php';
$users=$userObject->all();
print_r($users);
echo '<br>';

/*$categories=$categoryObject->all();
print_r($categories);*/




?>