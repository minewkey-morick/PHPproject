<?php
    echo "<br><br><center><h2>회원 관리 프로그램</h2><hr>";
    echo "<br><br> -회원 관리 프로그램을 가동합니다 - <br>";
    echo "<br><br> ->>>이동할 화면을 선택하세요 <<<- <br><br><br>";
    ?>
    <form name="user_form" method="post">
        <input type="button" value="회원 등록" onClick="location.href='user_tbl.php'"> &nbsp;&nbsp; | &nbsp;&nbsp; 
        <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
        <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
        <input type="button" value="회비 목록" onClick="location.href='fee.php'">
	</form>
    <?php 
    echo "</center>";
?>