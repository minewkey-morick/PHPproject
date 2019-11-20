<?php
    $bno=$_GET['bno'];
    
    include "connect_db.php";
    
    $sql="delete from bung_tbl where bno=$bno";
    $res=mysqli_query($connect, $sql);
    
    if($res>0){
        echo "<script>
                alert('벙 삭제 성공');
                location.replace('bung.php');
                </script>";
    }else{
        echo "<script>
                alert('벙 삭제 실패');
                history.back();
                </script>";
    }
?>