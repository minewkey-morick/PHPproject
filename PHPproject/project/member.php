<?php
    include "connect_db.php";
    
    $sql="select * from user_tbl";
    $res=mysqli_query($connect, $sql);
    $count=mysqli_num_fields($res);
    
?>
<?php 
    echo "<h2>회원 목록</h2><hr>";
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
<form name="user_form" method="post" action="main.php">
	<input type="button" value="회원 등록" onClick="location.href='user_tbl.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="submit" value="메인 화면"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
    <table>
    	<tr>
    		<th>이름</th>
    		<th>나이</th>
    		<th>생년월일</th>
    		<th>성별</th>
    		<th>사는곳</th>
    		<th>가입일</th>
    		<th>회원등급</th>
    		<th>삭제</th>
    	</tr>
    	<?php 
    	while($rows=mysqli_fetch_array($res)){
    	    echo "<tr>";
    	    echo "<td><a href='update_member.php?no={$rows['no']}'>{$rows['name']}</a></td>";
    	    echo "<td>{$rows['age']}</td>";
    	    echo "<td>{$rows['birth']}</td>";
    	    echo "<td>{$rows['sex']}</td>";
    	    echo "<td>{$rows['address']}</td>";
    	    echo "<td>{$rows['joindate']}</td>";
    	    if($rows['grade']==1){
    	        echo "<td>일반회원</td>";
    	    }else if($rows['grade']==2){
    	        echo "<td>운영진</td>";
    	    }else if($rows['grade']==3){
    	        echo "<td>모임장</td>";
    	    }else{
    	        echo "<td>유령회원</td>";
    	    }
    	    ?>
    	    <td><a href="delete_member.php?no=<?php echo $rows['no'] ?>" onclick="if(!confirm('회원을 삭제하시겠습니까?')){return false;}">삭제</a></td>
    	    <?php
    	    echo "</tr>";
    	}
    	?>
    </table>
</form>