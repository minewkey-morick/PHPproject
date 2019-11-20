<?php
    $host="localhost";
    $user="root";
    $passwd="123456";
    
    $connect=mysqli_connect($host,$user,$passwd) or die("mysql서버 접속 에러");
    $db=mysqli_select_db($connect,'project_db');
?>