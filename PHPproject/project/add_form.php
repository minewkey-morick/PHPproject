<?php 
    echo "<h2>회원 등록</h2><hr>";
?>
<?php

/* 셀렉트박스 형식의 날짜 (년)*/


function select_year_start_end($start, $end, $cur=""){

 if(!$cur) $cur = date("Y");

 for($start; $start<$end+1;$start++){

  if($start==$cur){

   $date_year.="<option value='$start' selected>$start</option>\n";

  }else{

   $date_year.="<option value='$start'>$start</option>\n";

  }

 }

 return $date_year;

}

/* 셀렉트박스 형식의 날짜 (월)*/

function select_month($mo=""){ 

 $tomonth = date("m");

 for($m=1;$m<=12;$m++){   

  if(strlen($m) == 1) $m = "0".$m;

  if($m == $mo){

   $date_month .= "<option value='$m' selected>$m</option>\n";

  }else{

   $date_month .= "<option value='$m'>$m</option>\n";

  }

 }   

 return $date_month;

}

/* 셀렉트박스 형식의 날짜 (일)*/

function select_day($da){

 $today = date("d");

 for($d=1;$d<=31;$d++){

  if(strlen($d) == 1) $d = "0".$d;

  if ($d == $da){

   $date_day.="<option value='$d' selected>$d</option>\n";

  }else{

   $date_day.="<option value='$d'>$d</option>\n";

  } 

 }

 return $date_day;

}
?>
<style>
    table{
        border-collapse:collapse;
    }
    td{
        border:1px solid #ccc;
    }
</style>

<form name="user_form" action="insert_member.php" method="post" onSubmit="return chk_input()">
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp; 
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td colspan=2>회원 등록</td>
		</tr>
		<tr>
			<td>이름</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>나이</td>
			<td>
				<input type="text" name="age">
			</td>
		</tr>
		<tr>
			<td>생년월일</td>
			<td>
                <?php 
                // 셀렉트박스 년도 만들기
                
                echo "<select name='birth_y'>";
                
                echo select_year_start_end("1940", "2020", "1980");
                
                echo "</select>";
                
                // 셀렉트박스 월 만들기
                
                echo "<select name='birth_m'>";
                
                echo select_month("01");
                
                echo "</select>";
                
                // 셀렉트박스 일 만들기
                
                echo "<select name='birth_d'>";
                
                echo select_day("01");
                
                echo "</select>";
                
                ?>
			</td>
		</tr>
		<tr>
			<td>성별</td>
			<td>
				<input type="radio" name="sex" value="남" checked>남 &nbsp;
				<input type="radio" name="sex" value="여">여
			</td>
		</tr>
		<tr>
			<td>사는곳</td>
			<td>
				<input type="text" name="address">
			</td>
		</tr>
		<tr>
			<td>가입일</td>
			<td>
                <?php 
                // 셀렉트박스 년도 만들기
                
                echo "<select name='joindate_y'>";
                
                echo select_year_start_end("2019", "2020", "2019");
                
                echo "</select>";
                
                // 셀렉트박스 월 만들기
                
                echo "<select name='joindate_m'>";
                
                echo select_month("01");
                
                echo "</select>";
                
                // 셀렉트박스 일 만들기
                
                echo "<select name='joindate_d'>";
                
                echo select_day("01");
                
                echo "</select>";
                
                ?>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="submit" value="등록">
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
		
		if(user_form.address.value==""){
			alert("사는곳을 입력하세요.");
			user_form.address.focus();
			return false;
		}
						
		return true;
	}
</script>