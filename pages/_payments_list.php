<?PHP
######################################
# ������ Fruit Farm
# ����� Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "��������� �������";
$_OPTIMIZATION["description"] = "������ ��������� ������";
$_OPTIMIZATION["keywords"] = "��������� �������";
?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block lh20">
		<h2>��������� �������</h2>

<center><h3><b>���������� ��������� 10 ������</b></h3></center>
<BR />
<?PHP

$dt = time() - 60*60*24;

$db->Query("SELECT * FROM db_payment WHERE status = '3'  ORDER BY id DESC LIMIT 10");



if($db->NumRows() > 0){

$all_pay = 0;
$all_pay_sum = 0;

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">������������</td>
	<td align="center" width="50" class="m-tb">�����</td>
	<td align="center" width="50" class="m-tb">�������</td>
	<td align="center" width="50" class="m-tb">����</td>
  </tr>


<?PHP

	while($data = $db->FetchArray()){
	$all_pay ++;
	$all_pay_sum += $data["sum"];
	?>
	<tr class="htt">
	<td align="center"><?=$data["user"]; ?></td>
    <td align="center"><?=sprintf("%.2f",$data["sum"]); ?> <?=$data["valuta"]; ?></td>
	<td align="center"><?=substr($data["purse"],0,-3); ?><font color = 'red'>XXX</font></td>
	<td align="center"><?=date("d.m.Y H:i:s",$data["date_add"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>
	<tr bgcolor="#efefef">
		<!--<td align="center" width="50" class="m-tb" colspan=2>����� ������: <?=121+$all_pay; ?> ��.</td>
		<td align="center" width="50" class="m-tb" colspan=2>�� �����: <?=sprintf("%.2f",$all_pay_sum)+6044,01; ?> RUB</td>-->
	</tr>
</table>
<BR />
<?PHP


}else echo "<center><b>������ ��� :(</b></center><BR />";


?>
	</div>
</div>

	<div style="clear: both;"></div>
</div>