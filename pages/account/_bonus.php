<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# Настройки бонусов
$bonus_min = 1;
$bonus_max = 300;

?>
<center><div id="b3">
	<div class="block">
		<h2>Ежедневный бонус</h2>

Бонус выдаётся 1 раз в 24 часа. <BR />
Бонус выдается в <font color="blue">серебре</font> на счет для покупок. <BR />
Сумма бонуса генерируется случайно от <font color="green"><b><?=$bonus_min;?></b></font> до <font color="green"><b><?=$bonus_max;?></b></font> <font color="blue">серебра</font>.</center>
<center><b><h4>Для того  что-бы получить бонус нажмите на любой баннер ниже !</h4></b></center>
<BR /><BR />
<?PHP
$ddel = time() + 60*60*1;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# Выдача бонуса
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# Зачилсяем юзеру
			$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' WHERE id = '$usid'");
			
			# Вносим запись в список бонусов
			
			
			$db->Query("INSERT INTO db_bonus_list (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# Случайная очистка устаревших записей
			$db->Query("DELETE FROM db_bonus_list WHERE date_del < '$dadd'");
			
			echo "<center><font color = 'green'><b>На Ваш счет для покупок зачислен бонус в размере {$sum} серебра</b></font></center><BR />";
			
			$hide_form = true;
			
		}
			
			# Показывать или нет форму
			if(!$hide_form){
				

?>

<script type="text/javascript"> 
function showLinks(el,id){var linkBox=document.getElementById(id).style.display='block';el.style.display='none';} 
</script> 
<style type="text/css"> 
.banerBox{cursor:pointer;
width:468px;} 
.myLinkBox{display:none;} 
</style><hr> 

  


<center><div class="banerBox"  onclick="showLinks(this,'linkBox');"> 

<div id="linkslot_202709"><script src="https://linkslot.ru/bancode.php?id=202709" async></script></div>
<div id="linkslot_202711"><script src="https://linkslot.ru/bancode.php?id=202711" async></script></div>
<div id="linkslot_202712"><script src="https://linkslot.ru/bancode.php?id=202712" async></script></div>
</div> </center>
<div id="linkBox" class="myLinkBox">

<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="Получить бонус" style="height: 30px; margin-top:20px;"></td>
  </tr>

</table>
</form>
</div>
<?PHP 

			}

	}else echo "<center><font color = 'red'><b>Вы уже получали бонус за последние 24 часа</b></font></center><BR />"; ?>




<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h1>Последние 10 бонусов</h1></td>
    </tr>
  <tr>
    <td align="center" class="m-tb"><b>ID</b></td>
    <td align="center" class="m-tb"><b>Пользователь</b></td>
	<td align="center" class="m-tb"><b>Сумма</b></td>
	<td align="center" class="m-tb"><b>Дата</b></td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus_list ORDER BY id DESC LIMIT 10");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><b><?=$bon["user"]; ?></b></td>
    		<td align="center"><font color = 'green'><b><?=$bon["sum"]; ?></b></font></td>
			<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  ?>

  
</table>
	</div>
</div>

	<div style="clear: both;"></div>
</div>


