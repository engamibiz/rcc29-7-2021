<?php
$names=['ahmed','omar','adham'];
$ages=[10,13,8];
$names=array('ahmed','omar','adham');

foreach($names as $key=>$name){
    echo $key + 1 . '- ' .$name . ' '  . $ages[$key] . '<br>';
}


$student=[
  'name'=>'ahmed',
  'phone'=>'0123456798' ,
  'degree'=>60
];

echo $student['degree'];
