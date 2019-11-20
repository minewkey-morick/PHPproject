<?php
    echo "<h2>벙 수정</h2><hr>";
    
    $bno=$_GET['bno'];
    
    include "connect_db.php";
    
    $sql="select * from bung_tbl where bno=$bno";
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

<form name="user_form" action="update_bung_process.php" method="post" onSubmit="return chk_input()">
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp; 
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td colspan=2>벙 수정하기</td>
		</tr>
		<tr>
			<td>등록번호</td>
			<td>
				<input type="text" name="bno" value=<?php echo $rows['bno']?> readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>벙 이름</td>
			<td>
				<input type="text" name="bname" value=<?php echo $rows['bname']?>>
			</td>
		</tr>
		<tr>
			<td>벙 날짜</td>
			<td>
				<input type="date" name="date" value=<?php echo $rows['date']?>>
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
		if(user_form.bname.value==""){
			alert("벙 이름을 입력하세요.");
			user_form.bname.focus();
			return false;
		}
		if(user_form.date.value==""){
			alert("벙 날짜를 입력하세요.");
			user_form.date.focus();
			return false;
		}				
		return true;
	}
</script>