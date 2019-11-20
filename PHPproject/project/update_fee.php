<?php
    echo "<h2>회비 수정하기</h2><hr>";
    
    $pass=$_GET['fno'];
    
    include "connect_db.php";
    
    $sql="select * from fee_tbl where fno=$pass";
    $res=mysqli_query($connect, $sql);
    $rows=mysqli_fetch_array($res);
    
?>

<style>
    table{
        border-collapse:collapse;
    }
    td{
        border:1px solid #ccc;
    }
</style>

<form name="user_form" action="update_fee_process.php" method="post" onSubmit="return chk_input()">
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp; 
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td colspan=2>회비 수정</td>
		</tr>
		<tr>
			<td>등록번호</td>
			<td>
				<input type="text" name="fno" value=<?php echo $rows['fno']?> readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>내용</td>
			<td>
				<input type="text" name="fname" value="<?php echo $rows['fname'] ?>">
			</td>
		</tr>
		<tr>
			<td>금액</td>
			<td>
				<input type="text" name="fmoney" value="<?php echo $rows['fmoney'] ?>">
			</td>
		</tr>
		<tr>
			<td>입금날짜</td>
			<td>
				<input type="date" name="fdate" value="<?php echo $rows['fdate'] ?>">
			</td>
		</tr>
		<tr>
			<td>입금자</td>
			<?php
			
			$sql2="select * from user_tbl";
			$res2=mysqli_query($connect, $sql2);
			
			echo "<td>";
			echo "<select name='no'>";
			while($rows2=mysqli_fetch_array($res2)){
			    if($rows['no'] == $rows2['no']){
			        echo "<option value={$rows['no']}>{$rows2['name']}</option>";
			    }
			}
			echo "</select>";
			echo "</td>";
			?>
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
		if(user_form.fname.value==""){
			alert("내용을 입력하세요.");
			user_form.fname.focus();
			return false;
		}
		if(user_form.fmoney.value==""){
			alert("금액을 입력하세요.");
			user_form.fmoney.focus();
			return false;
		}
		if(user_form.fdate.value==""){
			alert("입금날짜를 입력하세요.");
			user_form.fdate.focus();
			return false;
		}				
		return true;
	}
</script>