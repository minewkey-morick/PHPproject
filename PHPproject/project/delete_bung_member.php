<?php
    $bmno=$_GET['bmno'];
    
    include "connect_db.php";
    
    $sql="delete from bung_member_tbl where bmno=$bmno";
    $res=mysqli_query($connect, $sql);
    
    if($res>0){
        echo "<script>
                alert('인원 삭제 성공');
                location.replace('bung.php');
                </script>";
    }else{
        echo "<script>
                alert('인원 삭제 실패');
                history.back();
                </script>";
    }
?>