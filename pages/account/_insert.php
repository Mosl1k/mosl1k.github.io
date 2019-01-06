<div id="b3">
	<div class="block">
		<h2>Пополнение баланса</h2>


<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Пополнение баланса";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

/*
if($_SESSION["user_id"] != 1){
echo "<center><b><font color = red>Технические работы</font></b></center>";
return;
}
*/
?>

<script type="text/javascript">
var min = 0.01;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseFloat(st_q);
	$('#res_sum').html( (sum_insert * ser_pr).toFixed(0) );
	
	
}
	
</script>


<?
switch($_GET['action']){
    case 'payeer':
/// db_payeer_insert
if(isset($_POST["sum"])){

$sum = round(floatval($_POST["sum"]),2);


# Заносим в БД
$db->Query("INSERT INTO db_payeer_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - USER ".$_SESSION["user"]);
$m_shop = $config->shopID;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

?>
<center>
<form method="GET" action="//payeer.com/api/merchant/m.php">
	<input type="hidden" name="m_shop" value="<?=$config->shopID; ?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
	<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
	<input type="hidden" name="m_curr" value="RUB">
	<input type="hidden" name="m_desc" value="<?=$desc; ?>">
	<input type="hidden" name="m_sign" value="<?=$sign; ?>">
	<input type="submit" name="m_process" value="Оплатить и получить серебро" />
</form>
</center>	
</div></div><div style="clear: both;"></div></div>
<?PHP

return;
}
?>


<div id="error3"></div>
<h2>Создание запроса на пополнение серебра<font color=red></font><font color=blue>*</font></h2>
<form method="POST" action="">
Введите сумму [<?=$config->VAL; ?>]:  
<input type="text" value="100" name="sum" size="7" id="psevdo" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)"> 

    Вы получите <span id="res_sum">10000</span><font color="blue"><b>C</b></font>
	<BR /><BR />
    <input type="submit" id="submit" value="Пополнить баланс" >
</form>
<script type="text/javascript">
calculate(100);
</script>
<center>


</center>
<?
break;
case 'free':
if(isset($_POST["sum"])){

$sum = intval($_POST["sum"]);

# Заносим в БД
$db->Query("INSERT INTO db_free_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$merchant_id = $config->fk_merchant_id;
$order_id = $db->LastInsert();
$out_amount=$sum;
$merchant_key= $config->fk_merchant_key;
$descript=md5($merchant_id.":".$out_amount.":".$merchant_key.":".$order_id);
?>
<center>
<form method=GET action="http://www.free-kassa.ru/merchant/cash.php">
    <input type="hidden" name="m" value="<?=$merchant_id?>"/>
    <input type="hidden" name="oa" id="oa" value="<?=$sum?>"/>
    <input type="hidden" name="s" id="s" value="<?=$descript?>"/>
    <input type="hidden" name="o" value="<?=$order_id?>"/>
    <input type="submit" id="submit" value="Оплатить и получить серебро"/>
</form>
</center>
</div></div><div style="clear: both;"></div></div>
<?


return;
}
?>

<h2>Создание запроса на пополнение серебра<font color=red></font><font color=blue>*</font></h2>

<form method='POST' action="">
Введите сумму [<?=$config->VAL; ?>]: 
    <input type="text" name="sum" id="sum" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)" value="100"/>

    Вы получите <span id="res_sum">10000</span><font color="blue"><b>C</b></font>
	<BR /><BR />
    <input type="submit" id="submit" value="Пополнить баланс"/>
</form>

<?
break;
default:
echo '

		<h2>Выберите способ Пополнения баланса</h2>
<a href="/account/insert/free-kassa"><div id="b3">
	<div class="block">
<BR>
<h2>Free-Kassa</h2>
<center><a href="/account/insert/free-kassa"><img style=" width: 70%;" src="/img/insert/free.png" alt="Пополнение счёта с помощью платёжной системы FREE-KASSA"></a></center><br>
			</div>
</div></a>
<a href="/account/insert/payeer"><div id="b3">
	<div class="block">
<h2>Payeer</h2>
<center><a href="/account/insert/payeer"><img style=" width: 70%;" src="/img/insert/payeer.png" alt="Пополнение счёта с помощью платёжной системы PAYEER"></a></center><br>

			</div>
</div>
</a>
	<div style="clear: both;"></div>
</div>
';
}
?>

			</div>
</div>

	<div style="clear: both;"></div>
</div>
