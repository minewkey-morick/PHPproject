<?php
    $fno=$_POST['fno'];
    $fname=$_POST['fname'];
    $fmoney=$_POST['fmoney'];
    $fdate=$_POST['fdate'];
    
    include "connect_db.php";
    
    $updatesql="update fee_tbl set fname='$fname',fmoney=$fmoney, fdate='$fdate' where fno=$fno";
    $res=mysqli_query($connect, $updatesql);
    
    if($res>0){
        echo "<script>
            alert('회비 수정 성공');
            location.replace('fee.php');
            </script>";
    }else{
        echo "<script>
            alert('회비 수정 실패');
            history.back();
            </script>";
    }
?>