<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<div id="b1">
	<div class="block">
		<h2>Финансы</h2>
		<div class="acst">
			Пополнений: <span><b><?=sprintf("%.2f",$prof_data["insert_sum"]); ?></b> руб</span><br>
			Получено с оборудование: <span><b><?=sprintf("%.2f",$prof_data["payment_sum"]); ?></b> руб</span><br>
			Реф.бонус: <span><b><?=sprintf("%.2f",$prof_data["from_referals"]); ?></b> сер</span><br>
			Для покупок: <span><b><?=sprintf("%.2f",$prof_data["money_b"]); ?></b></span><br>
			Для вывода: <span><b><?=sprintf("%.2f",$prof_data["money_p"]); ?></b> </span><br>
		</div>
	</div>
</div>
<div id="b1">
	<div class="block">
		<h2>Информация</h2>
		<div class="acst">
		    Ваш ID: <span><b><?=$prof_data["id"]; ?></b></span><br>
			Логин в игре: <span><b><?=$prof_data["user"]; ?></b></span><br>
			Регистрация: <span><b><?=date("d.m.Y в H:i:s",$prof_data["date_reg"]); ?></b></span><br>
			Мой реферер: <span><b><?=$prof_data["referer"]; ?></b></span><br>
			Мой E-mail: <span><b><?=$prof_data["email"]; ?></b></span>
		</div>
	</div>
</div>

	<div style="clear: both;"></div>
</div>


  
