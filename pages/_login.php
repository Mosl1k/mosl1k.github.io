<?PHP
$_OPTIMIZATION["title"] = "�����������";
$_OPTIMIZATION["description"] = "���� � �������";
$_OPTIMIZATION["keywords"] = "���� � �������";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block">
		<h2>���� � �������</h2>
<?PHP

	if(isset($_POST["log_email"])){
	
	$lmail = $func->IsMail($_POST["log_email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, user, pass, referer_id, banned FROM db_users_a WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($_POST["pass"])){
				
					if($log_data["banned"] == 0){
						
						# ������� ���������
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["user"] = $log_data["user"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<center><font color = 'red'><b>�� ��������!</b></font></center><BR />";
				
				}else echo "<center><font color = 'red'><b>Email �/��� ������ ������ �������</b></font></center><BR />";
			
			}else echo "<center><font color = 'red'><b>��������� Email �� ��������������� � �������</b></font></center><BR />";
			
		}else echo "<center><font color = 'red'><b>Email ������ �������</b></font></center><BR />";
	
	}

?>


<form class="submission" method="post" action="">
	<form action="" method="post"><br>
   
	<div>
		<label>Mail:</label>
		<input name="log_email" type="text" size="23" maxlength="35" class="lg"/></td>
  </div>
  
	<div>
		<label>������: (<a href="/recovery">���������?</a>)</label>
    <input name="pass" type="password" size="23" maxlength="35" class="ps"/></td>
  </div>

<div class="submit">
		<button type="submit">�����</button>
	</div>
</form>
  

	</div>
</div>
</div>
	<div style="clear: both;"></div>
</div>
	

