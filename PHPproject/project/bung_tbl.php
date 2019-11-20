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

$sql="create table bung_tbl(
        bno int primary key not null auto_increment,
        bname varchar(50) not null,
        date varchar(20) not null)
        default charset=utf8";

$result=mysqli_query($connect, $sql);
if($result){
    echo "<script>
            alert('테이블 생성 성공');
            location.replace('create_bung.php');
            </script>";
}else{
    echo "<script>
            alert('테이블 연결 성공');
            location.replace('create_bung.php');
            </script>";
}
?>