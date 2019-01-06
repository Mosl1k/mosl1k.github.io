<?PHP

//# Ñ÷åò÷èê
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}

$_timer_a = TimerSet();

//# Ñòàðò ñåññèè
@session_start();

//# Ñòàðò áóôåðà
@ob_start();

# Default
$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "Çàðàáîòîê â èíòåðíåòå";
$_OPTIMIZATION["description"] = "Çàðàáîòîê â èíòåðíåòå";
$_OPTIMIZATION["keywords"] = "Çàðàáîòîê â èíòåðíåòå, âëîæåíèÿ, çàðàáîòàòü, ôåðìà, äåíåæíàÿ ôåðìà, çàðàáîòîê äîìà";

//# Êîíñòàíòà äëÿ Include
define("CONST_RUFUS", true);

//# Àâòîïîäãðóçêà êëàññîâ
function __autoload($name){ include("classes/_class.".$name.".php");}

//# Êëàññ êîíôèãà 
$config = new config;

//# Ôóíêöèè
$func = new func;

//# Óñòàíîâêà REFERER
include("inc/_set_referer.php");

//# Áàçà äàííûõ
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

//# Øàïêà
@include("inc/_header.php");

		if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){
			
				case "404": include("pages/_404.php"); break; // Ñòðàíèöà îøèáêè
				case "rules": include("pages/_rules.php"); break; // Ïðàâèëà ïðîåêòà
				case "about": include("pages/_about.php"); break; // Î ïðîåêòå
				case "contacts": include("pages/_contacts.php"); break; // Êîíòàêòû
				case "kredit_oplata": include("pages/_kredit_oplata.php"); break; // Ïîãàøåíèå êðåäèòà
				case "news": include("pages/_news.php"); break; // Íîâîñòè
				case "signup": include("pages/_signup.php"); break; // Ðåãèñòðàöèÿ
				case "login": include("pages/_login.php"); break; // Ðåãèñòðàöèÿ
				case "recovery": include("pages/_recovery.php"); break; // Âîññòàíîâëåíèå ïàðîëÿ
				case "account": include("pages/_account.php"); break; // Àêêàóíò
                case "competition": include("pages/_competition.php"); break; // Êîíêóðñû
				case "users": include("pages/_users_list.php"); break; // Ïîëüçîâàòåëè
				case "payments": include("pages/_payments_list.php"); break; // Âûïëàòû
				case "otziv": include("pages/_otziv.php"); break; // Îòçûâû
				case "top": include("pages/_top.php"); break; // Òîï 5
				case "faq": include("pages/_faq.php"); break; // FAQ
				case "faq_faq": include("pages/_faq_faq.php"); break; // FAQ
				case "admin384": include("pages/_admin.php"); break; // Àäìèíêà
				case "stat": include("pages/_stat.php"); break; // Àäìèíêà
				 case "square": include("pages/_square.php"); break; // ×àò

				
			//# Ñòðàíèöà îøèáêè
			default: @include("pages/_404.php"); break;
			
			}
			
		}


//# Ïîäâàë
@include("inc/_footer.php");


//# Çàíîñèì êîíòåíò â ïåðåìåííóþ
$content = ob_get_contents();

//# Î÷èùàåì áóôåð
ob_end_clean();
	
	//# Çàìåíÿåì äàííûå
	$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
	$content = str_replace('{!DESCRIPTION!}',$_OPTIMIZATION["description"],$content);
	$content = str_replace('{!KEYWORDS!}',$_OPTIMIZATION["keywords"],$content);
	$content = str_replace('{!GEN_PAGE!}', sprintf("%.5f", (TimerSet() - $_timer_a)) ,$content);
	
	//# Âûâîä áàëàíñà
	if(isset($_SESSION["user_id"])){
	
		$user_id = $_SESSION["user_id"];
		$db->Query("SELECT money_b, money_p FROM db_users_b WHERE id = '$user_id'");
		$balance = $db->FetchArray();
		
		$content = str_replace('{!BALANCE_B!}', sprintf("%.2f", $balance["money_b"]) ,$content);
		$content = str_replace('{!BALANCE_P!}', sprintf("%.2f", $balance["money_p"]) ,$content);
	}
	
// Âûâîäèì êîíòåíò
echo $content;
?>