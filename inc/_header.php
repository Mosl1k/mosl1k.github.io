<?PHP

$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <link rel="stylesheet" href="../fonts.googleapis.com/css-family=Ubuntu+Condensed&subset=latin,cyrillic.css"  type="text/css">
    <title>Stroyinvest</title>
    <meta name="description" content="STROITELY - игра с выводом средств" />
    <meta name="keywords" content="вложить, доход, заработок в интернете, прибыль, деньги, играть, инвестировать">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script src="/javascript/jquery-1.8.2.js"></script>

</head>
<body>
 <div class="messages">
        <div class="message-1">
            <div class="off"></div>
            <div class="return"></div>
        </div>
        <div class="message-2"></div>
    </div>
<div class="container">


<div class="header" style="background: url(/images/bg-header.png) no-repeat;"> 

    <div class="menu">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/news">Новости</a></li>
            <li><a href="/faq">Faq</a></li>
            <li><a href="/payments">Выплаты</a></li>
            <li><a href="/otziv">Отзывы</a></li>
            <li><a href="/rules">Правила</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/square"><B>ЧАТ</B></a></li>
        </ul>
        

		<img src="/images/prof.png"><b><?=$prof_data["user"]; ?></b>
		<a href="/login" class="login-link">
		<?php
			if(isset($_SESSION["user"]) OR isset($_SESSION["admin"])) {
			echo '<span>
			мой аккаунт			
			</span></a>';
			} else {
			echo 'вход';
			}
			?>
	
    </div>
    <a href="/signup" class="button-start"></a>
</div>   

<div id="center" class="yjsgsitew">
	<div id="b3">
		<div class="block">
			<center><h1>Акция</h1></center>
			<center><h2><font color = "red">Бонус 50% на пополнение более 500 рублей!</font></h2>
			</center>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
 <div id="center" class="yjsgsitew">
	<div id="b3">
		<div class="block">
	<center>
	 <table cellpadding="5" cellspacing="5">
	  <tr>
	   <td><div id="linkslot_49189"></div><script src="http://linkslot.ru/bancode.php?id=49189" async></script></td>
	   <td><div id="linkslot_49190"></div><script src="http://linkslot.ru/bancode.php?id=49190" async></script></td>
	  </tr>
	 </table>
	</center>
</div>
	</div>
	<div style="clear: both;"></div>
</div>   


<?php
if (!isset($_GET["menu"]) OR strtolower($_GET["menu"]) == "index") {
?>
<?PHP
$_OPTIMIZATION["title"] = "заработок в интернете";

$tfstats = time() - 60*60*48;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>

<div id="center" class="yjsgsitew">
	<div id="b2">
		<div class="block sts">
			Мы работаем<br>
			<script type="text/javascript" language="javascript">
				/* <![CDATA[ */
				getPassedTime = (function () {
				  var
					nowDate = new Date( ),
					words = [
					  [365.25, ['год', 'года', 'лет']],
					  [30, ['месяц', 'месяца', 'месяцев']],
					  [1, ['день', 'дня', 'дней']]
					],
					getRightWord = function( num, wordsArr ) {
					  var decNum = num % 10;
					  if (num >= 100) num = num % 100;
					  if (num < 21 && num >= 5) return wordsArr[2];
					  if (decNum >= 5) return wordsArr[2]
					  if (decNum > 1 && decNum < 5) return wordsArr[1];
					  return wordsArr[0]
					}
				  ;
				  return function (date) {
					var 
					  x, difference, 
					  result = "", 
					  days = (nowDate - date) / 1000 / 60 / 60 / 24;
					for (x = 0; x < words.length; x++) {
					  if (days >= words[x][0]) {
						difference = days;
						days = days % words[x][0];
						difference = (difference - days) / words[x][0];
						result += "<span>" + (result ? " " : "") + parseInt(difference) + "</span> " + getRightWord( difference, words[x][1] )
					  }
					}
					return result
				  }
				})()
				document.write(getPassedTime(new Date("2018/02/12")));
				/* ]]> */
			</script>
		</div>
		<div class="block sts">Всего участников<br><span><?=$stats_data["all_users"]+891; ?></span></div>
		<div class="block sts">Новых за 48 часов<br><span><?=($stats_data["new_users"]+100); ?></span></div>
		<div class="block sts">Мы выплатили<br><span><?=sprintf("%.2f",$stats_data["all_payment"]+3890); ?></span> руб</div>
		<div class="block sts">Резерв проекта<br><span><?=sprintf("%.2f",$stats_data["all_insert"]*0.95)+124236; ?></span> руб</div>
	</div>


	<div id="b1">
		<div class="block ht">
			<h3 class="title">Добро пожаловать в игру Строй-инвест!</h3>
			<b>Строй-инвест</b>  это новая экономическая онлайн игра с возможностью заработка реальных денег!<br><br>
			Сдавайте в аренду строительное оборудование и получайте прибыль каждый час. Выводите заработанные деньги либо покупайте еще оборудование - и получайте еще больше прибыли!<br><br>
			Играйте вместе с друзьями и получайте 40% от их покупок. <br><br>
			<center><a href="/signup"  class="button">Присоединиться</a></center>
		</div>
	</div>

	<div id="b2">
		<div class="block ht">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- taxifarm -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1763107797776825"
     data-ad-slot="8693886793"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>

<div id="center" class="yjsgsitew">
	<div class="it">Наш Прайс </div>
	<div style="clear: both;"></div>
</div>

<div id="center" class="yjsgsitew">
	<div id="b3">
		<div class="block w3">
			<div class="title">инструмент</div>
			<div class="price"><span>30%</span> в месяц</div>
			<img src="images/cars/1.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>7.20 руб.</span> / месяц</li>
				<li><span>0.24 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>24 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">бетономешалка</div>
			<div class="price"><span>35%</span> в месяц</div>
			<img src="images/cars/2.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>17.70 руб.</span> / месяц</li>
				<li><span>0.59 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>50 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">Самосвал</div>
			<div class="price"><span>40%</span> в месяц</div>
			<img src="images/cars/3.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>72 руб.</span> / месяц</li>
				<li><span>2.40 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>180 руб.</span></div>
		</div>
		<div style="clear: both;"></div>
		<div class="block w3">
			<div class="title">бетоновоз</div>
			<div class="price"><span>45%</span> в месяц</div>
			<img src="images/cars/4.jpg" />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>135 руб.</span> / месяц</li>
				<li><span>4.50 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>300 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">манипулятор</div>
			<div class="price"><span>50%</span> в месяц</div>
			<img src="images/cars/5.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>249.9 руб.</span> / месяц</li>
				<li><span>8.33 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>500 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">трактор</div>
			<div class="price"><span>60%</span> в месяц</div>
			<img src="images/cars/6.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>480 руб.</span> / месяц</li>
				<li><span>16 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>800 руб.</span></div>
		</div>
		<div style="clear: both;"></div>
		<div class="block w3">
			<div class="title">экскаватор</div>
			<div class="price"><span>70%</span> в месяц</div>
			<img src="images/cars/7.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>1 050 руб.</span> / месяц</li>
				<li><span>35 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>1 500 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">автокран</div>
			<div class="price"><span>80%</span> в месяц</div>
			<img src="images/cars/8.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>2 010 руб.</span> / месяц</li>
				<li><span>67 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>2 500 руб.</span></div>
		</div>
		<div class="block w3">
			<div class="title">башенный кран</div>
			<div class="price"><span>90%</span> в месяц</div>
			<img src="images/cars/9.jpg"  />
			<ul class="featurelist">
				<li>прибыль:</li>
				<li><span>4 500 руб.</span> / месяц</li>
				<li><span>150 руб.</span> / день</li>
			</ul>
			<div class="title2">цена: <span>5 000 руб.</span></div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<div style="clear: both;"></div>
</div>

<?php } ?>
<?php
	 if(isset($_SESSION["admin"]) or isset($_GET["menu"]) AND $_GET["menu"] == "admin4ik"){
	
		include("inc/_admin_menu.php");
	
	}elseif(isset($_SESSION["user"])){ 
	 include("inc/_user_menu.php");
	 }
	 if (isset($_GET["menu"]) and strtolower($_GET["menu"]) == "news" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "otziv" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "contacts" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "rules" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "top" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "stat" or isset($_GET["menu"]) and strtolower($_GET["menu"]) == "login") {
	 echo "



	 </div>";
	 } else {
	 // include("inc/_stats.php");
	  }
	 ?>
