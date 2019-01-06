<?PHP
######################################
# Модуль Кредит
# Сайт: Farm-Sell.RU
######################################

# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);





if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"]))
{
	$m_key = $config->kredit_secretW;
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	
	$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));
	if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success")
	{
		
	$db->Query("SELECT * FROM db_payeer_insert WHERE id = '".intval($_POST['m_orderid'])."'");
	if($db->NumRows() == 0){ echo $_POST['m_orderid']."|error"; exit;}
	
	$payeer_row = $db->FetchArray();
	if($payeer_row["status"] > 0){ echo $_POST['m_orderid']."|success"; exit;}
	
	$db->Query("UPDATE db_payeer_insert SET status = '1' WHERE id = '".intval($_POST['m_orderid'])."'");
	
	$ik_payment_amount = $payeer_row["sum"];
	$user_id = $payeer_row["user_id"];
   

   

   
   # Зачисляем баланс
   $db->Query("UPDATE db_users_b SET kredit = '0', insert_sum = insert_sum + '$ik_payment_amount' WHERE id = '{$user_id}'");
   
   
   
   echo $_POST['m_orderid']."|success";
	exit;
	
	
	}
	echo $_POST['m_orderid']."|error";
}
?>