<?php
    echo "<h2>벙 만들기</h2><hr>";
?>
<?php
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

<form name="user_form" action="insert_bung.php" method="post" onSubmit="return chk_input()">
    <input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td colspan=2>벙 만들기</td>
		</tr>
		<tr>
			<td>벙 이름</td>
			<td>
				<input type="text" name="bname">
			</td>
		</tr>
		<tr>
			<td>벙 날짜</td>
			<td>
				<?php 
                
                echo "<select name='date_y'>";
                
                echo select_year_start_end("2019", "2020", "2019");
                
                echo "</select>";
                
                echo "<select name='date_m'>";
                
                echo select_month("01");
                
                echo "</select>";
                
                echo "<select name='date_d'>";
                
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