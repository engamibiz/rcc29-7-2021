<?php
if(isset($_GET['do'])){
$do=$_GET['do'];
}else{
    $do='select';
}

echo $do;