<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Касса";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

?>
<div id="b3">
	<div class="block">
		<h2>Касса</h2>
Касса позволит вам продать весь ваш доход за <font color="blue">серебро</font>, которое можно обменять на реальные 
деньги. Вырученное с продажи <font color="blue">серебро</font> распределяются между двумя счетами (счет для покупок и счет 
для вывода) в пропорциях: <?=100-$sonfig_site["percent_sell"]; ?>% на счет для покупок и <?=$sonfig_site["percent_sell"]; ?>% на вывод.<br /><br />
Курс продажи любого дохода : <b><font color="green"><?=$sonfig_site["items_per_coin"]; ?> дохода = 1 <font color="blue">серебро</font>.</font></b>
<BR />
<?PHP
# Продажа
if(isset($_POST["sell"])){

$all_items = $user_data["a_b"] + $user_data["b_b"] + $user_data["c_b"] + $user_data["d_b"] + $user_data["e_b"] + $user_data["f_b"] + $user_data["g_b"] + $user_data["8_b"] + $user_data["9_b"];

	if($all_items > 0){
	
		$money_add = $func->SellItems($all_items, $sonfig_site["items_per_coin"]);
		
		$tomat_b = $user_data["a_b"];
		$straw_b = $user_data["b_b"];
		$pump_b = $user_data["c_b"];
		$pean_b = $user_data["d_b"];
		$peas_b = $user_data["e_b"];
		$peach_b = $user_data["f_b"];
		$watermelon_b = $user_data["g_b"];
		$peach8_b = $user_data["8_b"];
		$watermelon9_b = $user_data["9_b"];
		
		$money_b = ( (100 - $sonfig_site["percent_sell"]) / 100) * $money_add;
		$money_p = ( ($sonfig_site["percent_sell"]) / 100) * $money_add;
		
		# Обновляем юзверя
		$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b', money_p = money_p + '$money_p', a_b = 0, b_b = 0, c_b = 0, d_b = 0, e_b = 0, f_b = 0, g_b = 0, 8_b = 0, 9_b = 0   
		WHERE id = '$usid'");
		
		$da = time();
		$dd = $da + 60*60*24*15;
		
		# Вставляем запись в статистику
		$db->Query("INSERT INTO db_sell_items (user, user_id, a_s, b_s, c_s, d_s, e_s, f_s, g_s, 8_s, 9_s, amount, all_sell, date_add, date_del) VALUES 
		('$usname','$usid','$tomat_b','$straw_b','$pump_b','$pean_b','$peas_b','$peach_b','$watermelon_b','$peach8_b','$watermelon9_b','$money_add','$all_items','$da','$dd')");
		
		echo "<center><font color = 'green'><b>Вы продали {$all_items} дохода, на сумму {$money_add} серебра</b></font></center><BR />";
		
		$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
		$user_data = $db->FetchArray();
		
	}else echo "<center><font color = 'red'><b>Вам нечего продавать :(</b></font></center><BR />";

}
?>	       
<form action="" method="post">
<table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" align="center" valign="middle">&nbsp;</td>
    <td height="20" align="center" valign="middle"><h1><strong>У вас в наличии</strong></h1></font></td>
    <td height="20" align="center" valign="middle"><h1><strong>На сумму (в серебре)</strong></h1><td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/1.jpg" /></div></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["a_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["a_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/2.jpg" /></div></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["b_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["b_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/3.jpg" /></div></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["c_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["c_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/4.jpg" /></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["d_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["d_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/5.jpg" /></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["f_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["f_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/6.jpg" /></div></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["e_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["e_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/7.jpg" /></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["g_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["g_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/8.jpg" /></div></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["8_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["8_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><div class="sm-line-nt"><img src="/images/cars/9.jpg" /></td>
    <td align="center" valign="middle"><font color="green"><b><?=$user_data["9_b"]; ?></b></font> ШТ.</td>
    <td align="center" valign="middle"><font color="green"><b><?=$func->SellItems($user_data["9_b"], $sonfig_site["items_per_coin"]); ?></b></font></td>
  </tr>
  
  <tr>
    <td align="center" valign="middle" colspan="3">
	<BR />
	<input type="submit" name="sell" value="Продать все" class="button_0" style="height: 30px;"></td>
  </tr>
  
</table>
</form>

			</div>
</div>

	<div style="clear: both;"></div>
</div>
