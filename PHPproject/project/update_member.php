<?php
    echo "<h2>회원 수정</h2><hr>";
    
    $no=$_GET['no'];
    
    include "connect_db.php";
    
    $sql="select * from user_tbl where no=$no";
    $res=mysqli_query($connect, $sql);
    $rows=mysqli_fetch_array($res);
    $count=mysqli_num_fields($res);
    
?>

<style>
    table{
        border-collapse:collapse;
    }
    td{
        border:1px solid #ccc;
    }
</style>

<form name="user_form" action="update_member_process.php" method="post" onSubmit="return chk_input()">
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp; 
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td>등록번호</td>
			<td>
				<input type="text" name="no" value=<?php echo $rows['no']?> readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>이름</td>
			<td>
				<input type="text" name="name" value=<?php echo $rows['name']?>>
			</td>
		</tr>
		<tr>
			<td>나이</td>
			<td>
				<input type="text" name="age" value=<?php echo $rows['age']?>>
			</td>
		</tr>
		<tr>
			<td>생년월일</td>
			<td>
				<input type="date" name="birth" value=<?php echo $rows['birth']?>>
			</td>
		</tr>
		<tr>
			<td>성별</td>
			<td>
				<input type="radio" name="sex" value="남" <?php if ($rows['sex']=="남") echo "checked";?>>남 &nbsp;
				<input type="radio" name="sex" value="여" <?php if ($rows['sex']=="여") echo "checked";?>>여
			</td>
		</tr>
		<tr>
			<td>사는곳</td>
			<td>
				<input type="text" name="address" value=<?php echo $rows['address']?>>
			</td>
		</tr>
		<tr>
			<td>가입일</td>
			<td>
				<input type="date" name="joindate" value=<?php echo $rows['joindate']?>>
			</td>
		</tr>
		<tr>
			<td>회원등급</td>
			<td>
				<input type="radio" name="grade" value="1" <?php if ($rows['grade']=="1") echo "checked";?>>일반회원 &nbsp;
				<input type="radio" name="grade" value="2" <?php if ($rows['grade']=="2") echo "checked";?>>운영진 &nbsp;
				<input type="radio" name="grade" value="3" <?php if ($rows['grade']=="3") echo "checked";?>>모임장
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="submit" value="수정">
				<input type="reset" value="다시작성">
			</td>
		</tr>
	</table>
</form>

<script>
	
	function chk_input(){
		if(user_form.name.value==""){
			alert("이름을 입력하세요.");
			user_form.name.focus();
			return false;
		}
		if(user_form.age.value==""){
			alert("나이를 입력하세요.");
			user_form.age.focus();
			return false;
		}
		if(user_form.birth.value==""){
			alert("생년월일을 입력하세요.");
			user_form.birth.focus();
			return false;
		}
		if(user_form.address.value==""){
			alert("사는곳을 입력하세요.");
			user_form.address.focus();
			return false;
		}
		if(user_form.joindate.value==""){
			alert("가입일을 입력하세요.");
			user_form.joindate.focus();
			return false;
		}
				
		return true;
	}
</script>
