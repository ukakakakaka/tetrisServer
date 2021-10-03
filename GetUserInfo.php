
<?php
function GetUserInfo($islocal, $json, $id)
{
    if ($islocal) {
        //local Server DB
        $conn = mysqli_connect("localhost", "root", "root", "tetrisGame");
    } else {
        // DotHome Server DB
        // $conn = mysqli_connect("localhost","ukakakakaka","XTP9dyzVB7Ma29m!","ukakakakaka");
    }

    mysqli_options($conn, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);

    $check = "SELECT id,COALESCE(score,0) as score from user where id='$id'";
    $result = $conn->query($check);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $addRow = array("id" => $row['id'], "score" => $row['score']);

    $json['user'] = $addRow;
    mysqli_close($conn);

    return $json;
}
?>