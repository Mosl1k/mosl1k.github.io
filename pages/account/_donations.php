<?PHP
$_OPTIMIZATION["title"] = "�������������";
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>
<div id="b3">
	<div class="block">
		<h2>������ �������</h2>
�� ������ ������� ����������� � ����� �������, ����������� ����� ���������� ������� ��� �������� �������.

<BR />
<?PHP
# �������������
if(isset($_POST["sum"])){

$sum = intval($_POST["sum"]);

	if($sum > 0){

		if($sum <= $user_data["money_b"]){

		# ������� � �������
		$db->Query("UPDATE db_users_b SET money_b = money_b - '$sum' WHERE id = '$usid'");
		$db->Query("INSERT INTO db_donations (user, sum, date_add, date_del) VALUES ('".$_SESSION["user"]."','$sum','".time()."','".(time()+60*60*12)."')");
		$db->Query("UPDATE db_stats SET donations = donations + '$sum' WHERE id = '1'");

		echo "<center><font color = 'blue'><b>������� ������� :)</b></font></center><BR />";

		}else echo "<center><font color = 'blue'><b>�� �� ������ ������������ ������, ��� ���� � ���</b></font></center><BR />";

	}else echo "<center><font color = 'blue'><b>����������� ����� ��� ������������� 1 ���</b></font></center><BR />";

}

?>
<form action="" method="post">
<table width="320" border="0" align="center">
  <tr>
    <td><b>����� [��� �������]:</b></td>
    <td align="center"><input type="text" name="sum" value="100" size="10"/></td>
  </tr>

  <tr>
    <td align="center" colspan="2"><input type="submit" value="������������" /></td>
  </tr>
</table>

</form>
<BR />
<BR />

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="3" align="center"><h4>��������� 15 �������������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">���������</h3></td>
    <td align="center" class="m-tb">�����</h3></td>
  </tr>
  <?PHP

  $db->Query("SELECT * FROM db_donations ORDER BY id DESC LIMIT 15");

	if($db->NumRows() > 0){

  		while($ref = $db->FetchArray()){

		?>
		<tr class="htt">
    		<td align="center"><?=$ref["user"]; ?></td>
    		<td align="center"><?=$ref["sum"]; ?></td>
  		</tr>
		<?PHP

		}

	}else echo '<tr><td align="center" colspan="3">� ��������� ����� ������������� �� ����</td></tr>'
  ?>


</table>

			</div>
</div>

	<div style="clear: both;"></div>
</div>
