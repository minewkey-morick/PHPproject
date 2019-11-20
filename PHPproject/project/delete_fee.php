<?php
    $fno=$_GET['fno'];
    
    include "connect_db.php";
    
    $sql="delete from fee_tbl where fno=$fno";
    $res=mysqli_query($connect, $sql);
    
    if($res>0){
        echo "<script>
                alert('회비 삭제 성공');
                location.replace('fee.php');
                </script>";
    }else{
        echo "<script>
                alert('회비 삭제 실패');
                history.back();
                </script>";
    }
?>