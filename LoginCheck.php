<?php

include 'GetUserInfo.php';
include 'ServerCheck.php';

session_start();

$islocal = ServerCheck();

$id = $_POST['id'];
$pw = $_POST['pw'];

$mysqli = mysqliConnect($islocal);//mysqli_connect("localhost", "root", "root", "tetrisGame");

$check = "SELECT * FROM user WHERE id='$id'";
$result = $mysqli->query($check);
if ($result->num_rows == 1) {
    $row = $result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
    if ($row['pw'] == $pw) {  //MYSQLI_ASSOC 필드명으로 첨자 가능
        $_SESSION['id'] = $id;           //로그인 성공 시 세션 변수 만들기
        if (isset($_SESSION['id']))    //세션 변수가 참일 때
        {
            $json['result'] = true;
            mysqli_close($mysqli);
            $json = GetUserInfo($islocal, $json,$id);
        } else {

            $json['result'] = false;
            $json['message'] = "세션 저장 실패";
            mysqli_close($mysqli);
        }
    }
    else
     {
        $json['result'] = false;
        $json['message'] = "패스워드가 틀림";
        mysqli_close($mysqli);
    }
} else {
    $json['result'] = false;
    $json['message'] = "존재하지 않는 아이디";
    mysqli_close($mysqli);
}

$json = json_encode($json);
$json = "{\"LoginCheck\":" . $json . '}';
print_r($json);
