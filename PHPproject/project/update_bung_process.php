<?php
    $bno=$_POST['bno'];
    $bname=$_POST['bname'];
    $date=$_POST['date'];
    
    include "connect_db.php";
    
    $updatesql="update bung_tbl set bname='$bname', date='$date' where bno=$bno";
    $res=mysqli_query($connect, $updatesql);
    
    if($res>0){
        echo "<script>
            alert('벙 수정 성공');
            location.replace('bung.php');
            </script>";
    }else{
        echo "<script>
            alert('벙 수정 실패');
            history.back();
            </script>";
    }
?>