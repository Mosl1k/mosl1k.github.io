<?PHP
$_OPTIMIZATION["title"] = "�����������";
$_OPTIMIZATION["description"] = "����������� ������������ � �������";
$_OPTIMIZATION["keywords"] = "����������� ������ ��������� � �������";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block">
		<h2>�����������</h2>
<?PHP
	
	# �����������

	if(isset($_POST["login"])){
	
	

	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	$ipregs = $db->Query("SELECT * FROM `db_users_a` WHERE INET_NTOA(db_users_a.ip) = '$ip' ");
	$ipregs = $db->NumRows();

	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "Admin"; }
	}else{ $referer_id = 1; $referer_name = "Admin"; }
	
		if($rules){
			if($ipregs == 0) {

			if($email !== false){
		
			if($login !== false){
			
				if($pass !== false){
			
					if($pass == $_POST["repass"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){
						
						# ������ ������������
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user, money_b, a_t, last_sbor) VALUES ('$lid','$login','10000','1', '".time()."')");
						
						# ��������� ����������
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						echo "<center><b><font color = 'green'>�� ������� ������������������. ����������� ����� ������ ��� ����� � �������</font></b></center><BR />";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<center><b><font color = 'red'>��������� ����� ��� ������������</font></b></center><BR />";
						
					}else echo "<center><b><font color = 'red'>������ � ������ ������ �� ���������</font></b></center><BR />";
			
				}else echo "<center><b><font color = 'red'>������ �������� �������</font></b></center><BR />";
			
			}else echo "<center><b><font color = 'red'>����� �������� �������</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>Email ����� �������� ������</b></font></center>";
		
		}else echo "<center><font color = 'red'><b>����������� � ����� IP ��� �������������</b></font></center>";

		}else echo "<center><b><font color = 'red'>�� �� ����������� �������</font></b></center><BR />";
	
		

	}
	
	
?>


<BR />






      <form class="submission" method="post" action="">
 
      
  <div>
  <label for="first_name">��� ���������:</label>
  <input type="text" name="login" type="text" size="25" maxlength="10" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false; ?>"/>
</div>
<div>
  <label for="email">������:</label>
  <input type="password" name="pass" />
</div>
<div>
  <label for="email">������ ��� ���:</label>
  <input type="password" name="repass" />
</div>
<div>
  <label for="email">����������� �����:</label>
  <input type="text" name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/>
</div>
<div>   
  <label class="checkbox terms">
    <input name="rules" value="check" checked="checked" type="checkbox">
    �&nbsp;��������&nbsp;<a href="/rules" target="_blank" class="service-page-link">�������&nbsp;�������������</a>.
  </label>
</div>
  <div class="controls actions">
    <button type="submit" class="btn btn-primary" id="btnContinue">�����������</button>
  </div>


</form>    </div>
  </div>
</div>
  </div>
</div>


</div>
	<div style="clear: both;"></div>
</div>