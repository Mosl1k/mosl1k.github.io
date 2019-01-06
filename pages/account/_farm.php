<div id="b3">
	<div class="block">
		<h2>Магазин</h2>

<p><font color="black">В этом магазине Вы приобретаете разное оборудование. Каждое оборудование приносит Вам доход. Доход можно потом продать на рынке и обменять на реальные деньги. Каждое оборудование приносит различный доход, чем дороже оно тем больше зарабатывает. Вы можете покупать любое их количество, оборудование не ломается, не исчезает и будет зарабатывать всегда. </font></p><p><font color="green">Перед тем как докупить оборудование следует собрать доход!</font></p><br>

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Магазин";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового такси
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 6 => "e_t", 5 => "f_t", 7 => "g_t", 8 => "8_t", 9 => "9_t");
$array_name = array(1 => "Морковь", 2 => "Огурец", 3 => "Капуста", 4 => "Помидор", 5 => "Картофель", 6 => "Тыква", 7 => "Баклажан", 8 => "8Тыква", 9 => "9Баклажан");
$item = intval($_POST["item"]);
$citem = $array_items[$item];
$amount = intval($_POST['amount']);

	if(strlen($citem) >= 3){
		
		# Проверяем средства пользователя
		if($amount > 0 && $amount <= 1000) {
		$need_money = $sonfig_site["amount_".$citem]*$amount;
		if($need_money <= $user_data["money_b"]){
		
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*10) ){
				
				$to_referer = $need_money * 0.1;
				# Добавляем такси и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + $amount,  
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");
				
				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");
				
				echo "<center><font color = 'green'><b>Вы успешно купили $amount оборудование</b></font></center><BR />";
				
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();
				
			}else echo "<center><font color = 'red'><b>Перед тем как докупить оборудование следует собрать доход на складе!</b></font></center><BR />";
		
		}else echo "<center><font color = 'red'><b>Недостаточно серебра для покупки</b></font></center><BR />";
	    }else echo "<center><font color = 'red'><b>Вы можете купить за 1 раз от 1 до 1000 оборудование!</b></font></center><BR />";
	}

}

?>
</div>
</div>
<div id="center" class="yjsgsitew">
	<div class="it">НАШИ ОБОРУДОВАНИЕ</div>
	<div style="clear: both;"></div>
</div>

<div id="center" class="yjsgsitew">
	<div id="b3">

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Инструмент</div>
		<div class="price"><span>30%</span> в месяц</div>
		<img src="/images/cars/1.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["a_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_a_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["a_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="1" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Бетономешалка</div>
		<div class="price"><span>35%</span> в месяц</div>
		<img src="/images/cars/2.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["b_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_b_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["b_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="2" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Самосвал</div>
		<div class="price"><span>40%</span> в месяц</div>
		<img src="/images/cars/3.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["c_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_c_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["c_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="3" /><input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Бетоновоз</div>
		<div class="price"><span>45%</span> в месяц</div>
		<img src="/images/cars/4.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["d_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_d_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["d_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="4" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Манипулятор</div>
		<div class="price"><span>50%</span> в месяц</div>
		<img src="/images/cars/5.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["f_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_f_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["f_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="5" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>
<div class="block w3">
	<form action="" method="post">
	    <div class="title">Трактор</div>
		<div class="price"><span>60%</span> в месяц</div>
		<img src="/images/cars/6.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["e_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_e_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["e_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="6" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>



<div class="block w3">
	<form action="" method="post">
	    <div class="title">Экскаватор</div>
		<div class="price"><span>70%</span> в месяц</div>
		<img src="/images/cars/7.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["g_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_g_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["g_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="7" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Автокран</div>
		<div class="price"><span>80%</span> в месяц</div>
		<img src="/images/cars/8.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["8_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_8_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["8_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="8" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">Башенный кран</div>
		<div class="price"><span>90%</span> в месяц</div>
		<img src="/images/cars/9.jpg" />
		<ul class="featurelist">
		<li>Прибыль:</li>
		<li>Доход: <span><?=$sonfig_site["9_in_h"]; ?></span> / час</li>
        <li>Стоимость: <span><?=$sonfig_site["amount_9_t"]; ?></span>C</li>
		<li>Куплено: <span><?=$user_data["9_t"]; ?></span> шт.</li>
		<div class="title2">
		<input type="hidden" name="item" value="9" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="Купить" style=" margin-top:15px; "  />
	</form>
	</div>

			</div>

</div>
	<div style="clear: both;"></div>
</div>
