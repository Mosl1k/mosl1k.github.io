<div class="s-bk-lf">
	<div class="acc-title">Склад </div>
</div>
<div class="silver-bk">Собирайте на складе ваши кредиты  заработаные . Ваши инструменты дают кредиты
каждые 10 минут. кредиты постоянно накапливаются, не обязательно собирать каждые 10 мин. достаточно
собрать их раз в месяц.<br /> Как вам удобнее.
<BR />
<BR />
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Склад";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			$peach_s = $func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);
			$watermelon_s = $func->SumCalc($sonfig_site["g_in_h"], $user_data["g_t"], $user_data["last_sbor"]);
			
			$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			f_b = f_b + '$peach_s', 
			g_b = g_b + '$watermelon_s', 
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			all_time_f = all_time_f + '$peach_s',
			all_time_g = all_time_g + '$watermelon_s',
			last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			echo "<center><font color = 'green'><b>Вы собрали кредиты</b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'red'><b>кредиты можно собирать не чаще 1го раза за 10 минут</b></font></center><BR />";
	
	}



?>
<form action="" method="post">
<div class="clr"></div>	
<div class="sm-line">
<img src="/img/fruit/lime-small.jpg" /><b>Ваши <font color="green"><?=$user_data["a_t"]; ?></font>  заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line">
<img src="/img/fruit/cherry-small.jpg" /><b>Ваши <font color="green"><?=$user_data["b_t"]; ?></font> заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line"><img src="/img/fruit/strawberries-small.jpg" /><b>Ваши <font color="green"><?=$user_data["c_t"]; ?></font>  заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line"><img src="/img/fruit/kiwi-small.jpg" /><b>Ваши <font color="green"><?=$user_data["d_t"]; ?></font>  заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line"><img src="/img/fruit/peach-small.jpg" /><b>Ваши <font color="green"><?=$user_data["f_t"]; ?></font>  заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line"><img src="/img/fruit/orange-small.jpg" /><b>Ваши <font color="green"><?=$user_data["e_t"]; ?></font>  заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="sm-line"><img src="/img/fruit/watermelon-small.jpg" /><b>Ваши <font color="green"><?=$user_data["g_t"]; ?></font> заработали:</b> <font color="green"> <?=$func->SumCalc($sonfig_site["g_in_h"], $user_data["g_t"], $user_data["last_sbor"]);?> билетов</font></div>
<div class="clr"></div>
<center><input type="submit" name="sbor" value="Собрать все" style="height:30px;"/></center>
</form>
<td colspan="5" align="center" style="padding:5px;">Друзья! Пожалуйста рекламируйте свои ссылки, рассказывайте о проекте друзьям! Приглашайте рефералов! Не забывайте что у нас проводится конкурс <a href=#>рефералов.</a></td>
                   
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="7" align="center" style="padding:5px;"><b>У вас имеется на складе:</b></td>
    </tr>
  <tr>
    <td align="center"><div class="sm-line-nt"><img src="/img/fruit/lime-small.jpg" /></div></td>
    <td align="center"><div class="sm-line-nt"><img src="/img/fruit/cherry-small.jpg" /></div></td>
	<td align="center"><div class="sm-line-nt"><img src="/img/fruit/strawberries-small.jpg" /></div></td>
    <td align="center"><div class="sm-line-nt"><img src="/img/fruit/kiwi-small.jpg" /></div></td>
	<td align="center"><div class="sm-line-nt"><img src="/img/fruit/peach-small.jpg" /></div></td>
    <td align="center"><div class="sm-line-nt"><img src="/img/fruit/orange-small.jpg" /></div></td>
	<td align="center"><div class="sm-line-nt"><img src="/img/fruit/watermelon-small.jpg" /></div></td>    
  </tr>
  <tr>
    <td align="center"><b><font color="green"><?=$user_data["a_b"]; ?></font></b></td>
    <td align="center"><b><font color="green"><?=$user_data["b_b"]; ?></font></b></td>
    <td align="center"><b><font color="green"><?=$user_data["c_b"]; ?></font></b></td>
    <td align="center"><b><font color="green"><?=$user_data["d_b"]; ?></font></b></td>
	<td align="center"><b><font color="green"><?=$user_data["f_b"]; ?></font></b></td>
    <td align="center"><b><font color="green"><?=$user_data["e_b"]; ?></font></b></td>
	<td align="center"><b><font color="green"><?=$user_data["g_b"]; ?></font></b></td>
  </tr>
</table>
<div class="clr"></div>
</div>