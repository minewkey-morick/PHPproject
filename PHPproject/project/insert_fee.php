<?php
$fname=$_POST['fname'];
$fmoney=$_POST['fmoney'];
$fdate1=$_POST['fdate_y'];
$fdate2=$_POST['fdate_m'];
$fdate3=$_POST['fdate_d'];
$no=$_POST['no'];

include "connect_db.php";

$sql="insert into fee_tbl(fname, fmoney, fdate, no) values('$fname', $fmoney, '$fdate1-$fdate2-$fdate3', $no)";
$res=mysqli_query($connect, $sql);

if($res>0){
    echo "<script>
            alert('회비 등록 성공');
            location.replace('fee.php');
            </script>";
}else{
    echo "<script>
            alert('회비 등록 실패');
            history.back();
            </script>";
}
?>