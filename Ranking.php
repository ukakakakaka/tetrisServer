<?php

include 'ServerCheck.php';
session_start();
$islocal = ServerCheck();

if(isset($_SESSION['id']))
{
    $id = $_POST['id'];

    $mysqli = mysqliConnect($islocal);

    mysqli_options($mysqli, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);

    
    $query = "SELECT id,score FROM user ORDER BY score DESC LIMIT 5";
    $result = $mysqli->query($query);
   
    header('Content-Type: application/json');

    $json['result'] = true;
    $json['ranking'] = array();
    
    $rankcount = 0;

    while($row = mysqli_fetch_array($result))
    {
        $rankcount++;

        $row = array( "id"=>$row['id'], "score"=>$row['score'], "rank"=>$rankcount);
       //['ranking']
        array_push($json['ranking'], $row );
    }
  
    // 제일 마지막 값은 유저의 현재 랭킹값이다
    $query = "SELECT count(*)+1 FROM user WHERE score > (SELECT score  FROM user WHERE id=\"$id\")";
    $result = $mysqli->query($query);
    $row= $result->fetch_array(MYSQLI_ASSOC);
   // $myrank = $row['count(*)+1'];
   // $row = array( "id"=>$id, "score"=>$myrank);
  
    $json['myrank'] = $row['count(*)+1'];

    //array_push($json, $row);
    mysqli_close($mysqli);
}
else
{
    $json['result'] = false;
    $json['message'] = "없는 세션입니다";
}

$json = json_encode($json);
$json = "{\"rank\":".$json.'}';
print_r( $json);

?>