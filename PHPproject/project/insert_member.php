<?php
    $name=$_POST['name'];
    $age=$_POST['age'];
    $birth1=$_POST['birth_y'];
    $birth2=$_POST['birth_m'];
    $birth3=$_POST['birth_d'];
    $sex=$_POST['sex'];
    $address=$_POST['address'];
    $joindate1=$_POST['joindate_y'];
    $joindate2=$_POST['joindate_m'];
    $joindate3=$_POST['joindate_d'];
    
    include "connect_db.php";
    
    $insertsql="insert into user_tbl(name, age, birth, sex, address, joindate, grade) values('$name', '$age', '$birth1-$birth2-$birth3', '$sex', '$address', '$joindate1-$joindate2-$joindate3', 1)";
    $res=mysqli_query($connect, $insertsql);
    
    if($res>0){
        echo "<script>
            alert('회원 등록 성공');
            location.replace('main.php');
            </script>";
    }else{
        echo "<script>
            alert('회원 등록 실패');
            history.back();
            </script>";
    }
?>