<?php
$id=$_POST['id'];
$pw=$_POST['pw'];
$pwc=$_POST['pwc']; // 웹전용

// 웹전용
if($pw!=$pwc) //비밀번호와 비밀번호 확인 문자열이 맞지 않을 경우
{
    echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
    echo "<a href=signUp.html>back page</a>";
    exit();
}
// 웹전용
if($id==NULL || $pw==NULL) //
{
    echo "빈 칸을 모두 채워주세요";
    echo "<a href=signUp.html>back page</a>";
    exit();
}
 
$mysqli=mysqli_connect("127.0.0.1","root","root","tetrisGame");
 
$check="SELECT * from user WHERE id='$id'";
$result=$mysqli->query($check);

//echo $result;
if($result->num_rows>=1)
{
    echo "중복된 id입니다.";
    echo "<a href=signUp.html>back page</a>";
    exit();
}
//exit();

$signup=mysqli_query($mysqli,"INSERT INTO user (id, pw) 
VALUES ('$id','$pw')");
if($signup){
    echo "success";
   
}
 
?>