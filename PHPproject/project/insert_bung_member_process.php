<?php
    $bno=$_POST['bno'];
    $no=$_POST['no'];
    
    include "connect_db.php";
    
    $sql="insert into bung_member_tbl(bno, no) values($bno, $no)";
    $res=mysqli_query($connect, $sql);
    
    if($res>0){
        echo "<script>
            alert('인원추가 성공');
            location.replace('bung_member_list.php?bno=$bno');
            </script>";
    }else{
        echo "<script>
            alert('인원추가 실패');
            history.back();
            </script>";
    }
?>