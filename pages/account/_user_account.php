<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<div id="b1">
	<div class="block">
		<h2>�������</h2>
		<div class="acst">
			����������: <span><b><?=sprintf("%.2f",$prof_data["insert_sum"]); ?></b> ���</span><br>
			�������� � ������������: <span><b><?=sprintf("%.2f",$prof_data["payment_sum"]); ?></b> ���</span><br>
			���.�����: <span><b><?=sprintf("%.2f",$prof_data["from_referals"]); ?></b> ���</span><br>
			��� �������: <span><b><?=sprintf("%.2f",$prof_data["money_b"]); ?></b></span><br>
			��� ������: <span><b><?=sprintf("%.2f",$prof_data["money_p"]); ?></b> </span><br>
		</div>
	</div>
</div>
<div id="b1">
	<div class="block">
		<h2>����������</h2>
		<div class="acst">
		    ��� ID: <span><b><?=$prof_data["id"]; ?></b></span><br>
			����� � ����: <span><b><?=$prof_data["user"]; ?></b></span><br>
			�����������: <span><b><?=date("d.m.Y � H:i:s",$prof_data["date_reg"]); ?></b></span><br>
			��� �������: <span><b><?=$prof_data["referer"]; ?></b></span><br>
			��� E-mail: <span><b><?=$prof_data["email"]; ?></b></span>
		</div>
	</div>
</div>

	<div style="clear: both;"></div>
</div>


  
