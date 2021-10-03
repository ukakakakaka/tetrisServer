<?php
include 'GetUserInfo.php';
include 'ServerCheck.php';

session_start();

$islocal = ServerCheck();
// $http_host = $_SERVER['HTTP_HOST'];
// $islocal = false;
// if ($http_host == '127.0.0.1') 
// {
//     $islocal = true;
// }

$json = array();

if (isset($_SESSION['id'])) 
{
    $json['result'] = true;
    $json = GetUserInfo($islocal, $json,$_SESSION['id']);
} 
else 
{
    $json['result'] = false;
}

$json = json_encode($json);
$json = "{\"SessionCheck\":" . $json . '}';
print_r($json);

?>
