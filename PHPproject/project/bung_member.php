<?php
$bno=$_GET['bno'];

include "connect_db.php";

$sql="select * from user_tbl";
$res=mysqli_query($connect, $sql);
$count=mysqli_num_fields($res);

?>
<?php 
    echo "<h2>인원 추가하기</h2><hr>";
?>
<style type="text/css">
table {
	border-collapse: collapse;
}

th,td {
	border: 1px solid #000;
}

td:nth-child(1) {
	text-align: center;
}
</style>
<form name="user_form" method="post" action="insert_bung_member_process.php">
    <input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
    <table>
    	<tr>
    		<td>벙 번호</td>
    		<td><input type="text" name="bno" value=<?php echo $bno?> readonly="readonly"></td>
    	</tr>
    	<tr>
    		<td>참석자 이름</td>
    		<?php
			echo "<td>";
			echo "<select name='no'>";
			while($rows=mysqli_fetch_array($res)){
			    echo "<option value={$rows['no']}>{$rows['name']}</option>";
			}
			echo "</select>";
			echo "</td>";
			?>
    	</tr>
    </table>
    <br>
    <input type="submit" value="참석자 추가">
</form>