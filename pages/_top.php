<?PHP
$_OPTIMIZATION["title"] = "��� 20 �� ������/�������";
$_OPTIMIZATION["description"] = "��� 20 �� ������/�������";
$_OPTIMIZATION["keywords"] = "��� 20, �� ������, �� �������";
?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block lh20">
		<h2>��� 5 �� ������</h2>
	
<table width="99%" border="0" align="center">
  <tr bgcolor="#efefef">
    <td align="center" class="m-tb"><b>�����</b></td>
    <td align="center" class="m-tb"><b>���� �����������</b></td>
    <td align="center" class="m-tb"><b>�����</b></td>
  </tr>
<?php
	$db->Query("SELECT * FROM `db_users_b`,`db_users_a` WHERE db_users_b.id = db_users_a.id ORDER BY `insert_sum` DESC LIMIT 5 ");
	while($data = $db->FetchArray()){
	?>
	<tr class="htt" >
		<td align="center" width="75"><?=$data['user']; ?></td>
		<td align="center"><b><?=date("d.m.Y � H:i",$data["date_reg"]); ?></b></td>
		<td align="center"><b><font color="green"><?=$data["insert_sum"]; ?></font></b></td>
	</tr>
	<?php
	}
?>
</table>

<br/>
<h2>��� 5 �� �������</h2>	
<table width="99%" border="0" align="center">
  <tr bgcolor="#efefef">
    <td align="center" class="m-tb"><b>�����</b></td>
    <td align="center" class="m-tb"><b>���� �����������</b></td>
    <td align="center" class="m-tb"><b>�����</b></td>
  </tr>
<?php
	$db->Query("SELECT * FROM `db_users_b`,`db_users_a` WHERE db_users_b.id = db_users_a.id ORDER BY `payment_sum` DESC LIMIT 5 ");
	while($data = $db->FetchArray()){
	?>
	<tr class="htt" >
		<td align="center" width="75"><?=$data['user']; ?></td>
		<td align="center"><b><?=date("d.m.Y � H:i",$data["date_reg"]); ?></b></td>
		<td align="center"><b><font color="green"><?=$data["payment_sum"]; ?></font></b></td>
	</tr>
	<?php
	}
?>
</table>




<?PHP

$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<br/>
<h2>T�� 5 �� ���������</h2>
<?PHP


$db->Query("SELECT * FROM db_users_a ORDER BY referals DESC LIMIT 5");

if($db->NumRows() > 0){

?>
<table width="99%" border="0" align="center">
  <tr bgcolor="#efefef">
    <td align="center" class="m-tb"><b>�����</b></td>
    <td align="center" class="m-tb"><b>���� �����������</b></td>
    <td align="center" width="238"  class="m-tb"><b>���������</b></td>
  </tr>
 <?PHP

	while($data = $db->FetchArray()){



	?>
  

	<tr class="htt">
	<td align="center" width="75"><?=$data['user']; ?></td>
		<td align="center"><b><?=date("d.m.Y � H:i",$data["date_reg"]); ?></b></td>
	<td align="center" ><b><font color="green"><?=$data["referals"]; ?></font></b></td>
</tr>
<?PHP
	
	}

?>

</table>
<BR />
<?PHP

}
?>



</div>
	</div>
</div>

	<div style="clear: both;"></div>
</div>