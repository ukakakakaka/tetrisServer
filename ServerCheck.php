<?php

function ServerCheck()
{
    $http_host = $_SERVER['HTTP_HOST'];

    if ($http_host == '127.0.0.1' || $http_host == 'localhost') {
        return  true;
    }

    return false;
}

function mysqliConnect(bool $isLocal)
{
   if($isLocal)
   {
    return mysqli_connect("localhost", "root", "root", "TetrisGame");
   }
   
   // Todo : !$isLocal 일때 리얼 서버 주소로 mysql에 접속하는 코드를 추가해야 한다
}

