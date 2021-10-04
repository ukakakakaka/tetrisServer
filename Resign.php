<?php

include 'ServerCheck.php';

$islocal = ServerCheck();
$id = $_POST['id'];
$mysqli = mysqliConnect($islocal);

$query = "SELECT * FROM user WHERE id='$id'";
$result = $mysqli->query($query);
$isResult = false;

if($result->num_rows==1)
{
    $query = "DELETE FROM user WHERE id='$id'";
    $result_delete = $mysqli->query($query);
    // $query = "SELECT * FROM user WHERE id='$id'";
    // $result_new = $mysqli->query($query);

    // if($result_new->num_rows==1)
    // {
        $json['result'] = true;
        $json['message'] = "탈퇴 성공";
        $isResult = true;
    // }
    // else
    // {
    //     $json['result'] = false;
    //     $json['message'] = "탈퇴 실패 ".$result_delete;
    // }
 
}
else
{
    $json['result'] = false;
    $json['message'] = "존재하지 않는 아이디";
}
mysqli_close($mysqli);
$json = json_encode($json);
$json = "{\"Resign\":" . $json . '}';
print_r($json);

if($isResult)
{
    session_start();
    $res=session_destroy(); //모든 세션 변수 지우기
}

