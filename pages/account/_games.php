<?PHP
######################################
# ������ Fruit Farm
# ����� Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "������� ������";
$_OPTIMIZATION["description"] = "����, �����������";
$_OPTIMIZATION["keywords"] = "����, �����������";
$user_id = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<div id="b3">
	<div class="block">
		<h2>������� ������</h2>
������������ ��� � ������� ������� ������ �������, ��� ��� �� ����� �������� ��������� ���� � ������� ��� ����� ������ � ������� �������� �������, � ������ ������� � ������-�������-������. ��� �� ������� ���������� ����� ����!<br>
<br>



<center>	
	
		<div class="acmenu">
			<a href="/account/lottery" class="button2">�������</a><br>
			<a href="/account/knb" class="button2">������-�������-������</a><br>
			<a href="/account/rul" class="button2">���� ���������</a><br>
			<a href="/account/kamikadze" class="button2">���������</a><br>

		</div>

</center>









<br>
			</div>
</div>

	<div style="clear: both;"></div>
</div>
