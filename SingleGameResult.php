<?php

include 'ServerCheck.php';

$islocal = ServerCheck();

$id = $_POST['id'];
$score = $_POST['score'];

$mysqli = mysqliConnect($islocal);

mysqli_options($mysqli, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);

$check = "SELECT * from user WHERE id='$id'";
$result = $mysqli->query($check);

if ($result->num_rows >= 1) {
    $json['result'] = true;

    $check = "SELECT id,COALESCE(score,0) as score from user where id='$id'";
    $result = $mysqli->query($check);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if( $score > $row['score'] )
    {
        $check = "UPDATE user SET score =$score where id='$id'";
        $result = $mysqli->query($check);
        $json['updateScore'] = true;

        $check = "SELECT id,COALESCE(score,0) as score from user where id='$id'";
        $result = $mysqli->query($check);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $json['Score'] = $row['score'];

    }   
    else
    {
        $json['updateScore'] = false;
        $json['Score'] =$score;
    }
} 
else
{
    $json['result'] = false;
    $json['message'] = "존재하지 id입니다";
}

mysqli_close($mysqli);
$json = json_encode($json);
$json = "{\"SingleGameResult\":" . $json . '}';
print_r($json);