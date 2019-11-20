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

$sql="create table fee_tbl(
        fno int primary key not null auto_increment,
        fname varchar(50) not null,
        fmoney int not null,
        fdate varchar(20) not null)
        default charset=utf8";

$result=mysqli_query($connect, $sql);
if($result){
    echo "<script>
            alert('테이블 생성 성공');
            location.replace('create_fee.php');
            </script>";
}else{
    echo "<script>
            alert('테이블 연결 성공');
            location.replace('create_fee.php');
            </script>";
}
?>