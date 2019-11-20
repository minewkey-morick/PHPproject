<?php
$bno=$_GET['bno'];

include "connect_db.php";

$sql="select bname from bung_tbl where bno=$bno";
$res=mysqli_query($connect, $sql);
$count=mysqli_num_fields($res);
$bungname=mysqli_fetch_array($res);


?>
<?php 
    echo "<h2>{$bungname['bname']} 벙 참가 인원</h2><hr>";
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
<form name="user_form" method="post" action="bung.php">
    <input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
    <table>
    	<tr>
    		<th>이름</th>
    		<th>나이</th>
    		<th>성별</th>
    		<th>삭제</th>
    	</tr>
    	<?php 
    	$sql="select  bm.bmno, u.name, u.age, u.sex from user_tbl u, bung_tbl b, bung_member_tbl bm where b.bno=$bno and bm.bno=$bno and bm.no=u.no";
    	$res=mysqli_query($connect, $sql);
    	$count=mysqli_num_fields($res);
    	
    	while($rows=mysqli_fetch_array($res)){
    	    echo "<tr>";
    	    echo "<td>{$rows['name']}</td>";
    	    echo "<td>{$rows['age']}</td>";
    	    echo "<td>{$rows['sex']}</td>";
    	    ?>
    	    <td><a href="delete_bung_member.php?bmno=<?php echo $rows['bmno'] ?>" onclick="if(!confirm('이 인원을 삭제하시겠습니까?')){return false;}">삭제</a></td>
    	    <?php
    	    echo "</tr>";
    	}
    	?>
    </table>
    <br>
    <input type="submit" value="확인">
</form>