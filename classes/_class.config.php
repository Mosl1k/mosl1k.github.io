<?PHP
class config{

	public $HostDB = "localhost";
	 public $UserDB = "u821125999_11";
 public $PassDB = "OnzxbKsFjUPV8AhOuz";
 public $BaseDB = "u821125999_11";
	
	public $SYSTEM_START_TIME = 1518377542;
	public $VAL = "Руб.";
	
	# PAYEER настройки
	public $AccountNumber = 'P111111';
	public $apiId = '111111';
	public $apiKey = '111111';
	
	public $shopID = 490392606;
	public $secretW = "FAQHtzTYnzp0hXLs";
	# Настройки для оплаты кредита
        public $kredit_shopID = 490394342;
	public $kredit_secretW = "lcnLc6bFfhMOe0UZ";
	   # FREE-KASSA
    public $fk_merchant_id = '68221'; //merchant_id ID мазагина в free-kassa.ru (http://free-kassa.ru/merchant/cabinet/help/)
    public $fk_merchant_key = '8p5dd5sz'; //Секретное слово http://free-kassa.ru/merchant/cabinet/profile/tech.php
    public $fk_merchant_key2 = 'nvs1x4w7'; //Секретное слово2 (result) http://free-kassa.ru/merchant/cabinet/profile/tech.php
}
?>