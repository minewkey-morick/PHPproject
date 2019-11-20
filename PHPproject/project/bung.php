<?php
include "connect_db.php";

$sql="select * from bung_tbl";
$res=mysqli_query($connect, $sql);
$count=mysqli_num_fields($res);

?>
<?php 
    echo "<h2>벙 목록</h2><hr>";
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
<form name="user_form" method="post" action="bung_tbl.php">
	<input type="submit" value="벙 만들기"> &nbsp;&nbsp; | &nbsp;&nbsp;
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
    <table>
    	<tr>
    		<th>벙 이름</th>
    		<th>벙 날짜</th>
    		<th>참석인원</th>
    		<th>인원확인</th>
    		<th>삭제</th>
    	</tr>
    	<?php 
    	while($rows=mysqli_fetch_array($res)){
    	    echo "<tr>";
    	    echo "<td><a href='update_bung.php?bno={$rows['bno']}'>{$rows['bname']}</a></td>";
    	    echo "<td>{$rows['date']}</td>";
    	    echo "<td><center><a href='bung_member_tbl.php?bno={$rows['bno']}'>추가하기</a></center></td>";
    	    echo "<td><a href='bung_member_list.php?bno={$rows['bno']}'>확인하기</a></td>";
    	    ?>    	    
    	    <td><a href="delete_bung.php?bno=<?php echo $rows['bno'] ?>" onclick="if(!confirm('벙을 삭제하시겠습니까?')){return false;}">삭제</a></td>
    	    <?php 
    	    echo "</tr>";
    	}
    	?>
    </table>
    <br>
</form>