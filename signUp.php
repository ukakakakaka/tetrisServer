<?php

include 'ServerCheck.php';

$islocal = ServerCheck();

$id = $_POST['id'];
$pw = $_POST['pw'];

// $pwc=$_POST['pwc']; // 웹전용

// // 웹전용
// if($pw!=$pwc) //비밀번호와 비밀번호 확인 문자열이 맞지 않을 경우
// {
//     echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
//     echo "<a href=signUp.html>back page</a>";
//     exit();
// }
// // 웹전용
// if($id==NULL || $pw==NULL) //
// {
//     echo "빈 칸을 모두 채워주세요";
//     echo "<a href=signUp.html>back page</a>";
//     exit();
// }


$mysqli = mysqliConnect($islocal);

$check = "SELECT * from user WHERE id='$id'";
$result = $mysqli->query($check);

//echo $result;
if ($result->num_rows >= 1) {
    $json['result'] = false;
    $json['message'] = "중복된 id입니다";
} else {
    $signup = mysqli_query($mysqli, "INSERT INTO user (id, pw, rank, score) 
    VALUES ('$id','$pw',0,0)");
    if ($signup) {
        $json['result'] = true;
        $json['message'] = $id . "가입 성공";
    } else {
        $json['result'] = false;
        $json['message'] = "DB 추가 에러";
    }
}
mysqli_close($mysqli);
$json = json_encode($json);
$json = "{\"signUp\":" . $json . '}';
print_r($json);
?>