<?PHP
######################################
# Скрипт Fruit Farm
# Автор Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "Игровой раздел";
$_OPTIMIZATION["description"] = "Игры, развлечения";
$_OPTIMIZATION["keywords"] = "Игры, развлечения";
$user_id = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<div id="b3">
	<div class="block">
		<h2>Игровой раздел</h2>
Приветствуем вас в игровом разделе нашего проекта, тут вам на выбор доступны некоторые игры в которых вам можно играть с другими игроками проекта, а именно Лотерея и Камень-Ножницы-Бумага. Так же ведется разработка новой игры!<br>
<br>



<center>	
	
		<div class="acmenu">
			<a href="/account/lottery" class="button2">Лотерея</a><br>
			<a href="/account/knb" class="button2">Камень-Ножницы-Бумага</a><br>
			<a href="/account/rul" class="button2">Игра наперстки</a><br>
			<a href="/account/kamikadze" class="button2">Камикадзе</a><br>

		</div>

</center>









<br>
			</div>
</div>

	<div style="clear: both;"></div>
</div>
