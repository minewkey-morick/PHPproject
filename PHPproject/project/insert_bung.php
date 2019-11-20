<?php
$bname=$_POST['bname'];
$date1=$_POST['date_y'];
$date2=$_POST['date_m'];
$date3=$_POST['date_d'];

include "connect_db.php";

$insertsql="insert into bung_tbl(bname, date) values('$bname', '$date1-$date2-$date3')";
$res=mysqli_query($connect, $insertsql);

if($res>0){
    echo "<script>
            alert('벙 등록 성공');
            location.replace('bung.php');
            </script>";
}else{
    echo "<script>
            alert('벙 등록 실패');
            history.back();
            </script>";
}
?>