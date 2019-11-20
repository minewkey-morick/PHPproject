<?php
    include "connect_db.php";
    
    if($db){
        echo "<script>
            alert('DB 연결 성공');
            </script>";
    }else{
        "<script>
            alert('DB 연결 실패');
            </script>";
        exit;
    }
    
    $sql="create table user_tbl(
        no int primary key not null auto_increment,
        name varchar(12) not null,
        age int not null,
        birth date,
        sex char(4) not null,
        address varchar(50),
        joindate varchar(20),
        grade int)
        default charset=utf8";
    
    $result=mysqli_query($connect, $sql);
    if($result){
        echo "<script>
            alert('테이블 생성 성공');
            location.replace('add_form.php');
            </script>";
    }else{
        echo "<script>
            alert('테이블 연결 성공');
            location.replace('add_form.php');
            </script>";
    }
?>