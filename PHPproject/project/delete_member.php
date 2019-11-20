<?php
    $no=$_GET['no'];
    
    include "connect_db.php";
    
    $sql="delete from user_tbl where no=$no";
    $res=mysqli_query($connect, $sql);
    
    if($res>0){
        echo "<script>
                alert('회원 삭제 성공');
                location.replace('member.php');
                </script>";
    }else{
        echo "<script>
                alert('회원 삭제 실패');
                history.back();
                </script>";
    }
?>