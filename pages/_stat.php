<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";

$tfstats = time() - 60*60*48;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>

<?PHP

$db->Query("SELECT 
	COUNT(id) all_users, 
	SUM(money_b) money_b, 
	SUM(money_p) money_p, 
	
	SUM(a_t) a_t, 
	SUM(b_t) b_t, 
	SUM(c_t) c_t, 
	SUM(d_t) d_t, 
	SUM(e_t) e_t, 
	SUM(f_t) f_t, 
	SUM(g_t) g_t, 
	
	SUM(a_b) a_b, 
	SUM(b_b) b_b, 
	SUM(c_b) c_b, 
	SUM(d_b) d_b, 
	SUM(e_b) e_b, 
	SUM(f_b) f_b, 
	SUM(g_b) g_b, 
	
	SUM(all_time_a) all_time_a, 
	SUM(all_time_b) all_time_b, 
	SUM(all_time_c) all_time_c, 
	SUM(all_time_d) all_time_d, 
	SUM(all_time_e) all_time_e,
	SUM(all_time_f) all_time_f, 
	SUM(all_time_g) all_time_g,
	
	SUM(payment_sum) payment_sum, 
	SUM(insert_sum) insert_sum
	
	
	FROM db_users_b");
$data_stats = $db->FetchArray();

?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block lh20">
		<h2>Статистика сайта</h2>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td colspan="2" align="center">&nbsp;</td></tr>
  <tr>
    <td align="left" style="padding:3px;"><b>Пользователей:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><?=$stats_data["all_users"]; ?> чел.</font></td>
  </tr>
  <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>Новых за 48 часов:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><?=($stats_data["new_users"]+0); ?> чел.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>Выплачено всего:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><?=sprintf("%.2f",$stats_data["all_payment"]); ?></a></font><font color="blue"> руб.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>Резерв проекта:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><?=sprintf("%.2f",$stats_data["all_insert"]+0); ?><font color="blue"> руб.</font></font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
  <?php
		$data_trees_all=intval($data_stats["a_t"])+intval($data_stats["b_t"])+intval($data_stats["c_t"])+intval($data_stats["d_t"])+intval($data_stats["e_t"])+intval($data_stats["f_t"])+intval($data_stats["g_t"]);
	?>
    <td align="left" style="padding:3px;"><b>Куплено саженцев:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><?=$data_trees_all; ?> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
      <tr>
    <td align="left" style="padding:3px;"><b>Курс кредита:</b></td>
    <td align="left" style="padding:3px;"><font color="green">1<font color="green">Кр</font> = 0.01<font color="green">руб.</font></font></td>
  </tr>
   <tr>
  <td colspan="2">
    <hr>
  </td>
  </tr>
  
  
  
  
</table>
<h2>Статистика </h2>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td colspan="2" align="center">&nbsp;</td></tr>
  <tr>
    <td align="left" style="padding:3px;"><b>1:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["a_t"]); ?></b> шт.</font></td>
  </tr>
  <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>2:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["b_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>3:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["c_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;"><b>4:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["d_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  <tr>
  
    <td align="left" style="padding:3px;"><b>5:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["f_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
    <tr>
    <td align="left" style="padding:3px;"><b>6:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["e_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
    <tr>
    <td align="left" style="padding:3px;"><b>7:</b></td>
    <td align="left" style="padding:3px;"><font color="green"><b><?=intval($data_stats["g_t"]); ?></b> шт.</font></td>
  </tr>
   <tr>
  <td colspan="2">
  <hr>
  </td>
  </tr>
  
  
  
</table>
	</div>
</div>

	<div style="clear: both;"></div>
</div>