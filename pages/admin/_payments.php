<?
if(isset($_GET["option"])) {
	$id = (isset($_POST["id"])) ? intval($_POST["id"]) : false;
	$id = $_GET["id"];
	
		$db->Query("UPDATE `db_payment` SET `status`='3' WHERE `id`='$id'") or die(mysql_error());

		echo '<br><b style="color:#2E8B57">���������!</b><br>';
	
}
?>
<?
if(isset($_GET["vozvrat"])) {
	$id = (isset($_POST["id"])) ? intval($_POST["id"]) : false;
	$id = $_GET["id"];
	$sum = $_GET["sum"];
		
		
		$db->Query("SELECT user_id FROM db_payment WHERE `id` = '$id'");
		$us_id = $db->FetchArray();
		$user_id = $us_id["user_id"];
		
		
		
		$db->Query("UPDATE `db_users_b` SET `money_p`=`money_p`+'$sum' WHERE `id`='$user_id'") or die(mysql_error());
		$db->Query("DELETE FROM db_payment WHERE `id`='$id'") or die(mysql_error());
		echo '<br><b style="color:#2E8B57">����������!</b><br>';
	
}
?>
<div class="s-bk-lf">
	<div class="acc-title">������ ������ �� Payeer</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<center><a href="/?menu=admin384&sel=payments">������� �� �������</a> || <a href="/?menu=admin384&sel=payments&balance">������ �� Payeer</a> || 
<a href="/?menu=admin384&sel=payments&list_day">�� ����</a> || <a href="/?menu=admin384&sel=payments&last_31">������ �� 30 ����</a></center><BR />
<?PHP
# ������
if(isset($_GET["last_31"])){
	
	$dlim = time() - 60*60*24*30;
	$db->Query("SELECT * FROM db_payment WHERE date_add > $dlim ORDER BY id DESC");
	
	$days_money = array();
	$days_insert = array();
	
	if($db->NumRows() > 0){
		
		while($data = $db->FetchArray()){
		$index = date("d.m.Y", $data["date_add"]);
		
			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["sum"] : $data["sum"];
			$days_insert[$index] = (isset($days_insert[$index])) ? $days_insert[$index] + 1 : 1;
			
		}
	
	# �����
	if(count($days_money) > 0){
		
		$array_for_chart = array();
		$array_for_chart2 = array();
		$array_for_chart3 = array();
		
			foreach($days_money as $date => $sum){
			
				$array_for_chart[] = "['".$date."', ".round($sum)."]";
				$array_for_chart2[] = "['".$date."', ".$days_insert[$date]."]";
				$array_for_chart3[] = "['".$date."', ".round($sum / $days_insert[$date], 2)."]";
			
			}
			
			$retd = implode(", ", array_reverse($array_for_chart));
			$retd2 = implode(", ", array_reverse($array_for_chart2));
			$retd3 = implode(", ", array_reverse($array_for_chart3));
			
		?>

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['����', '�����'],
          <?=$retd; ?>
        ]);

        var options = {
          title: '������� ������ (�����)',
          hAxis: {title: 'Last 30 Days',  titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	<div id="chart_div" style="width: 100%; height: 500px;"></div>
	
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['����', '���-��'],
          <?=$retd2; ?>
        ]);

        var options2 = {
          title: '������� ������ (���-��)',
          hAxis: {title: 'Last 30 Days',  titleTextStyle: {color: 'green'}}
        };

        var chart2 = new google.visualization.SteppedAreaChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
      }
    </script>
	<div id="chart_div2" style="width: 100%; height: 500px;"></div>
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart3);
      function drawChart3() {
        var data3 = google.visualization.arrayToDataTable([
          ['����', '�����'],
          <?=$retd3; ?>
        ]);

        var options3 = {
          title: 'AVG (����� / ���-��)',
          hAxis: {title: 'Last 30 Days',  titleTextStyle: {color: 'green'}}
        };

        var chart3 = new google.visualization.SteppedAreaChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
      }
    </script>
	<div id="chart_div3" style="width: 100%; height: 500px;"></div>
	
	
		<?PHP
		
	}
	
	}else echo "<center><b>������� ���</b></center><BR />";
	
	
	
?></div><div class="clr"></div>	<?PHP
return;
}


# ����� ���������� �� ����
if(isset($_GET["list_day"])){

	$db->Query("SELECT * FROM db_payment ORDER BY id DESC");
	
	$days_money = array();
	$days_insert = array();
	
	if($db->NumRows() > 0){
		
		while($data = $db->FetchArray()){
		$index = date("d.m.Y", $data["date_add"]);
		
			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["sum"] : $data["sum"];
			$days_insert[$index] = (isset($days_insert[$index])) ? $days_insert[$index] + 1 : 1;
			
		}
	
	# �����
	if(count($days_money) > 0){
	
		?>
		<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
		  <tr bgcolor="#efefef">
			<td align="center" class="m-tb">����</td>
			<td align="center" class="m-tb">������</td>
			<td align="center" class="m-tb">�� �����</td>
			<td align="center" class="m-tb">AVG</td>
		  </tr>
		<?PHP
		
		$array_for_chart = array();
		
			foreach($days_money as $date => $sum){
			
				?>
				<tr class="htt">
					<td align="center"><b><?=$date; ?></b></td>
					<td align="center"><?=$days_insert[$date]; ?> ��.</td>
					<td align="center"><?=$sum; ?> <?=$config->VAL;?></td>
					<td align="center"><?=round($sum/$days_insert[$date],2); ?> <?=$config->VAL;?></td>
				</tr>
				<?PHP
				
			}
			
		?>
		</table>
		<?PHP
		
	}
	
	}else echo "<center><b>������� ���</b></center><BR />";
	
	
	
?></div><div class="clr"></div>	<?PHP
return;
}

# �������� ������� Payeer
if(isset($_GET["balance"])){

$payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
	if ($payeer->isAuth())
	{
		
		$arBalance = $payeer->getBalance();
		echo "<pre>".print_r($arBalance, true)."</pre>";	
	
	}
	
?></div><div class='clr'></div><?PHP

return;			
}	



$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

$db->Query("SELECT * FROM db_payment WHERE status='1' ORDER BY id DESC LIMIT {$lim}, 100");

function colorSum($sum){

	if($sum >= 100) return "red";
	return "#000000";
}

if($db->NumRows() > 0){

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">User</td>
	<td align="center" width="50" class="m-tb">Eco$</td>
	<td align="center" width="50" class="m-tb">Money</td>
	<td align="center" width="50" class="m-tb">Purse</td>
	<td align="center" width="50" class="m-tb">Date</td>
  </tr>


<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
	<td align="center"><a href="/?menu=admin384&sel=users&edit=<?=$data["user_id"]; ?>" class="stn"><?=$data["user"]; ?></a></td>
    <td align="center"><?=$data["serebro"]; ?></td>
    
	
	
    <td align="center"><a href="https://payeer.com/account/transfer/"><font color="<?=colorSum($data["sum"]); ?>"><?=sprintf("%.2f",$data["sum"]); ?> <?=$data["valuta"]; ?></font></a></td>
	<td align="center"><a href="/?menu=admin384&sel=payments&vozvrat=vozvrat&id=<?=$data["id"]; ?>&sum=<?=$data["serebro"]; ?>">�������<?=$data["purse"]; ?></a></td>
	<td align="center"><a href="/?menu=admin384&sel=payments&option=pay&id=<?=$data["id"]; ?>">��������</a></td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<?PHP


}else echo "<center><b>�� ������ �������� ��� �������</b></center><BR />";

	
$db->Query("SELECT COUNT(*) FROM db_payment");
$all_pages = $db->FetchRow();

	if($all_pages > 100){
	
	$sort_b = (isset($_GET["sort"])) ? intval($_GET["sort"]) : 0;
	
	$nav = new navigator;
	$page = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"])) : 1;
	
	echo "<BR /><center>".$nav->Navigation(10, $page, ceil($all_pages / 100), "/?menu=admin384&sel=payments&page="), "</center>";
	
	}
?>
</div><div class='clr'></div>
