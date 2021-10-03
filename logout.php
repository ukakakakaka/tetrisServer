<?php
session_start();
$res=session_destroy(); //모든 세션 변수 지우기

$json['result'] = true;
$json = json_encode($json);
$json = "{\"LogOut\":" . $json . '}';
print_r($json);
?>

