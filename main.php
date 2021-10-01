<?php
session_start();

// 세션이 존재하지 않을 때
if(!isset($_SESSION['id']))
{
    header('Location: ./login.html');
}
else
{
    $conn = mysqli_connect("127.0.0.1","root","root","tetrisGame");
    $check = "SELECT id from user";
    $result = $conn->query($check);
    $row = mysqli_fetch_row($result);
    echo $row[0];
    echo '<br>';
    print_r($row);
    mysqli_close($conn);
    echo '<br><br>';
}
?>
<html>
    <body>
        <?php
        echo '<br><br>';
        echo "<a href=logout.php>로그아웃</a>";
        ?>
    </body>
</html>