<?php
    $no=$_POST['no'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $birth=$_POST['birth'];
    $sex=$_POST['sex'];
    $address=$_POST['address'];
    $joindate=$_POST['joindate'];
    $grade=$_POST['grade'];
    
    include "connect_db.php";
    
    $updatesql="update user_tbl set name='$name', age='$age', birth='$birth', sex='$sex', address='$address', joindate='$joindate', grade=$grade where no=$no";
    $res=mysqli_query($connect, $updatesql);
    
    if($res>0){
        echo "<script>
            alert('회원 수정 성공');
            location.replace('member.php');
            </script>";
    }else{
        echo "<script>
            alert('회원 수정 실패');
            history.back();
            </script>";
    }
?>