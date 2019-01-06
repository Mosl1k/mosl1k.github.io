<?
					$usid = $_SESSION["user_id"];
					$db->Query("SELECT * FROM wmrush_pm WHERE user_id_in = '$usid' AND status = 0 AND inbox = 1");
					$sk = $db->NumRows();
					if ($sk > 0) {$pmm = '<font color="red">('.$sk.')</font>';} else {$pmm = '<font color="red">(0)</font>';}
					?>


<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">

	<div class="block w2">
		<div class="bal">
			На покупку: <span>{!BALANCE_B!}</span> сер<br>
			<a href="/account/insert" class="button2">Пополнить</a><a href="/account/farm" class="button2">Купить </a><br><hr>
			<a href="/account/kredit" class="button2">Кредит</a>
			На вывод: <span>{!BALANCE_P!}</span> сер<br>
			<a href="/account/payment" class="button2">Вывести</a><a href="/account/swap" class="button2">Обменять <b>+25%</b></a>
						
		</div>
	</div>
	<div class="block w2">
	   <div class="acmenu">
	        
			<a href="/account/farm" class="button2">Магазин</a><br>
			<a href="/account/store" class="button2">Оборудование</a><br>
			<a href="/account/market" class="button2">Рынок</a>
			<a href="/account/insert" class="button2">Пополнить</a><br>
			<a href="/account/pm" class="button2"><b>Внутренняя почта <?=$pmm; ?></b></a>
		
			
	</div></div>
	<div class="block w2">
		<div class="acmenu">
			<a href="/account/bonus" class="button2">Ежедневный бонус</a><br>
			<a href="/competition" class="button2"><b>Конкурс рефералов</b></a>
			<a href="/account/donations" class="button2">Пожертвования</a><br>
			<a href="/account/set" class="button2">Бонусы</a>
			<a href="/account/games" class="button2">Игровой раздел</a>
		</div>
	</div>
	
	<div class="block w2">
		<div class="acmenu">
		    <a href="/account" class="button2">Мой профиль</a><br>
			<a href="/account/config" class="button2">Настройки</a><br>
			<a href="/account/referals" class="button2">Ваши рефералы</a><br>
			<a href="/account/ref_ban" class="button2">Реф. материалы</a><br>
			

			<a href="/account/exit" class="button2">Выход</a>
		</div>
	</div>
</div>



      
