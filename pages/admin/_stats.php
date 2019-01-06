<div id="b3">
	<div class="block">
		<h2>Статистика проекта</h2>

		

	
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

<table width="450" border="0" align="center">
  <tr class="htt">
    <td><b>Зарегистрировано пользователей:</b></td>
	<td width="100" align="center"><?=$data_stats["all_users"]; ?> чел.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Серебра на счетах (Для покупок):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_b"]); ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Серебра на счетах (На вывод):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_p"]); ?></td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (1):</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (2):</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (3):</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (4):</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (5):</b></td>
	<td width="100" align="center"><?=intval($data_stats["f_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (6):</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (7):</b></td>
	<td width="100" align="center"><?=intval($data_stats["g_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (8):</b></td>
	<td width="100" align="center"><?=intval($data_stats["8_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено такси (9):</b></td>
	<td width="100" align="center"><?=intval($data_stats["9_t"]); ?> шт.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>На складах (1):</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (2):</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (3):</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (4):</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (5):</b></td>
	<td width="100" align="center"><?=intval($data_stats["f_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (6):</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (7):</b></td>
	<td width="100" align="center"><?=intval($data_stats["g_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (8):</b></td>
	<td width="100" align="center"><?=intval($data_stats["8_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах (9):</b></td>
	<td width="100" align="center"><?=intval($data_stats["9_b"]); ?> шт.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (1):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_a"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (2):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (3):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_c"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (4):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_d"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (5):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_f"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (6):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_e"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (7):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_g"]); ?> шт.</td>
  </tr>
  
  
  <tr class="htt">
    <td><b>Собрано за все время (8):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_8"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время (9):</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_9"]); ?> шт.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Введено пользователями:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["insert_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Выплачено пользователям:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["payment_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
</table>

	</div>
</div>

	<div style="clear: both;"></div>
	
