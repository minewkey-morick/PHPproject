<?php
include "connect_db.php";

$sql="select * from fee_tbl";
$res=mysqli_query($connect, $sql);
$count=mysqli_num_fields($res);

?>
<?php 
    echo "<h2>회비 목록</h2><hr>";
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
<form name="user_form" method="post" action="fee_tbl.php">
	<input type="submit" value="회비 입력"> &nbsp;&nbsp; | &nbsp;&nbsp;
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'">
    <br><br>
    <table>
    	<tr>
    		<th>내용</th>
    		<th>금액</th>
    		<th>입금 날짜</th>
    		<th>입금자</th>
    		<th>삭제</th>
    	</tr>
    	<?php 
    	while($rows=mysqli_fetch_array($res)){
    	    echo "<tr>";
    	    echo "<td><a href='update_fee.php?fno={$rows['fno']}'>{$rows['fname']}</a></td>";
    	    echo "<td>{$rows['fmoney']}원</td>";
    	    echo "<td>{$rows['fdate']}</td>";
    	    
    	    $sql2="select u.name from user_tbl u, fee_tbl f where u.no={$rows['no']}";
    	    $res2=mysqli_query($connect, $sql2);
    	    $rows2=mysqli_fetch_array($res2);
    	    echo "<td>{$rows2['name']}</td>";
    	    ?>
    	    <td><a href="delete_fee.php?fno=<?php echo $rows['fno'] ?>" onclick="if(!confirm('회비목록을 삭제하시겠습니까?')){return false;}">삭제</a></td>
    	    <?php 
    	    echo "</tr>";
    	}
    	?>
    </table>
    <br>
    
</form>