<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
$platform=$_POST['platform'];
$mysqli=mysqli_connect("localhost","root","root","tetrisGame");

$check="SELECT * FROM user WHERE id='$id'";
$result=$mysqli->query($check); 
if($result->num_rows==1){
    $row=$result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
    if($row['pw']==$pw){  //MYSQLI_ASSOC 필드명으로 첨자 가능
        $_SESSION['id']=$id;           //로그인 성공 시 세션 변수 만들기
        if(isset($_SESSION['id']))    //세션 변수가 참일 때
        {
            //echo "Connecting";
            if( $platform == "unity")
            {
                echo("success");
            }
            else
            {
                 header('Location: ./main.php');   //로그인 성공 시 페이지 이동
            }
        }
        else{
            echo "세션 저장 실패";
        }            
    }
    else{
       // echo $result->num_rows;
        echo "wrong id or pw";
    }
}
else{
   // echo $result->num_rows;
    echo "wrong id or pw";
}
?>