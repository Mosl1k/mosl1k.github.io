<div class="s-bk-lf">
	<div class="acc-title">Погашение кредита</div>
</div>


<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Погашение кредита";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];



$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

/*
if($_SESSION["user_id"] != 1){
echo "<center><b><font color = red>Технические работы</font></b></center>";
return;
}
*/


$procent = '0.10';



# Вытаскиваем сумму кредита
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid'");
	
	$payeer_row = $db->FetchArray();

$kredit_sum = $payeer_row["kredit"]+($payeer_row["kredit"]*$procent);
 
?>

<div class="silver-bk">








<BR />
<BR />
<?
/// db_payeer_insert
if(isset($_POST["sum"])){

$sum = round(floatval($_POST["sum"]),2);


# Заносим в БД
$db->Query("INSERT INTO db_payeer_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - USER ".$_SESSION["user"]);
$m_shop = $config->kredit_shopID;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->kredit_secretW;

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
	<input type="hidden" name="m_shop" value="<?=$config->kredit_shopID; ?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
	<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
	<input type="hidden" name="m_curr" value="RUB">
	<input type="hidden" name="m_desc" value="<?=$desc; ?>">
	<input type="hidden" name="m_sign" value="<?=$sign; ?>">
	<input type="submit" name="m_process" value="Перейти на страницу оплаты" />
</form>
</center>
<div class="clr"></div>		
</div>
<?PHP

return;
}
?>
<script type="text/javascript">
var min = 0.01;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseFloat(st_q);
	$('#res_sum').html( (sum_insert * ser_pr).toFixed(0) );
	
	
}
	
</script>

<div id="error3"></div>
<form method="POST" action="">
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
  
<input type="hidden" value="<?=$kredit_sum;?>" name="sum" size="7" id="psevdo" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)"> 

   <?PHP
$db->Query("SELECT (kredit+(kredit*$procent)) FROM db_users_b WHERE id = '".$_SESSION["user_id"]."' LIMIT 1");
?>
<center><b><font color = "green">Ваша задолженность: <?=sprintf("%.2f", $db->FetchRow()); ?> РУБ</font></b></center> 
	<BR /><BR />

    <center><input type="submit" id="submit" value="Погасить кредит" ></center>
</form>
<script type="text/javascript">
calculate(100);
</script>
<center>

<BR />

</center>
<BR /><BR />

<div class="clr"></div>		
</div>