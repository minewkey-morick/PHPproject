<?php
    echo "<h2>회비 입력하기</h2><hr>";
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

<form name="user_form" action="insert_fee.php" method="post" onSubmit="return chk_input()">
	<input type="button" value="메인 화면" onClick="location.href='main.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회원 목록" onClick="location.href='member.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="벙 목록" onClick="location.href='bung.php'"> &nbsp;&nbsp; | &nbsp;&nbsp;
    <input type="button" value="회비 목록" onClick="location.href='fee.php'">
    <br><br>
	<table>
		<tr>
			<td colspan=2>회비 입력</td>
		</tr>
		<tr>
			<td>내용</td>
			<td>
				<input type="text" name="fname">
			</td>
		</tr>
		<tr>
			<td>금액</td>
			<td>
				<input type="text" name="fmoney">
			</td>
		</tr>
		<tr>
			<td>입금날짜</td>
			<td>
				<?php 
                
                echo "<select name='fdate_y'>";
                
                echo select_year_start_end("2019", "2020", "2019");
                
                echo "</select>";
                
                echo "<select name='fdate_m'>";
                
                echo select_month("01");
                
                echo "</select>";
                
                echo "<select name='fdate_d'>";
                
                echo select_day("01");
                
                echo "</select>";
                
                ?>
			</td>
		</tr>
		<tr>
			<td>입금자</td>
			<?php
			include "connect_db.php";
			
			$sql="select * from user_tbl";
			$res=mysqli_query($connect, $sql);
			
			echo "<td>";
			echo "<select name='no'>";
			while($rows=mysqli_fetch_array($res)){
			    echo "<option value={$rows['no']}>{$rows['name']}</option>";
			}
			echo "</select>";
			echo "</td>";
			?>
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