<?php
$bno=$_GET['bno'];

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

$sql="create table bung_member_tbl(
        bmno int primary key not null auto_increment,
        bno int not null,
        no int not null)
        default charset=utf8";

$result=mysqli_query($connect, $sql);
if($result){
    echo "<script>
            alert('테이블 생성 성공');
            location.replace('bung_member.php?bno=$bno');
            </script>";
}else{
    
    
    echo "<script>
            alert('테이블 연결 성공');
            location.replace('bung_member.php?bno=$bno');
            </script>";
}
?>