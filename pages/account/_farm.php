<div id="b3">
	<div class="block">
		<h2>�������</h2>

<p><font color="black">� ���� �������� �� ������������ ������ ������������. ������ ������������ �������� ��� �����. ����� ����� ����� ������� �� ����� � �������� �� �������� ������. ������ ������������ �������� ��������� �����, ��� ������ ��� ��� ������ ������������. �� ������ �������� ����� �� ����������, ������������ �� ��������, �� �������� � ����� ������������ ������. </font></p><p><font color="green">����� ��� ��� �������� ������������ ������� ������� �����!</font></p><br>

<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# ������� ������ �����
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 6 => "e_t", 5 => "f_t", 7 => "g_t", 8 => "8_t", 9 => "9_t");
$array_name = array(1 => "�������", 2 => "������", 3 => "�������", 4 => "�������", 5 => "���������", 6 => "�����", 7 => "��������", 8 => "8�����", 9 => "9��������");
$item = intval($_POST["item"]);
$citem = $array_items[$item];
$amount = intval($_POST['amount']);

	if(strlen($citem) >= 3){
		
		# ��������� �������� ������������
		if($amount > 0 && $amount <= 1000) {
		$need_money = $sonfig_site["amount_".$citem]*$amount;
		if($need_money <= $user_data["money_b"]){
		
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*10) ){
				
				$to_referer = $need_money * 0.1;
				# ��������� ����� � ��������� ������
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + $amount,  
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");
				
				# ������ ������ � �������
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");
				
				echo "<center><font color = 'green'><b>�� ������� ������ $amount ������������</b></font></center><BR />";
				
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();
				
			}else echo "<center><font color = 'red'><b>����� ��� ��� �������� ������������ ������� ������� ����� �� ������!</b></font></center><BR />";
		
		}else echo "<center><font color = 'red'><b>������������ ������� ��� �������</b></font></center><BR />";
	    }else echo "<center><font color = 'red'><b>�� ������ ������ �� 1 ��� �� 1 �� 1000 ������������!</b></font></center><BR />";
	}

}

?>
</div>
</div>
<div id="center" class="yjsgsitew">
	<div class="it">���� ������������</div>
	<div style="clear: both;"></div>
</div>

<div id="center" class="yjsgsitew">
	<div id="b3">

<div class="block w3">
	<form action="" method="post">
	    <div class="title">����������</div>
		<div class="price"><span>30%</span> � �����</div>
		<img src="/images/cars/1.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["a_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_a_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["a_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="1" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">�������������</div>
		<div class="price"><span>35%</span> � �����</div>
		<img src="/images/cars/2.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["b_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_b_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["b_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="2" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">��������</div>
		<div class="price"><span>40%</span> � �����</div>
		<img src="/images/cars/3.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["c_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_c_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["c_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="3" /><input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">���������</div>
		<div class="price"><span>45%</span> � �����</div>
		<img src="/images/cars/4.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["d_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_d_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["d_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="4" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">�����������</div>
		<div class="price"><span>50%</span> � �����</div>
		<img src="/images/cars/5.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["f_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_f_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["f_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="5" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>
<div class="block w3">
	<form action="" method="post">
	    <div class="title">�������</div>
		<div class="price"><span>60%</span> � �����</div>
		<img src="/images/cars/6.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["e_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_e_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["e_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="6" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>



<div class="block w3">
	<form action="" method="post">
	    <div class="title">����������</div>
		<div class="price"><span>70%</span> � �����</div>
		<img src="/images/cars/7.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["g_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_g_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["g_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="7" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">��������</div>
		<div class="price"><span>80%</span> � �����</div>
		<img src="/images/cars/8.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["8_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_8_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["8_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="8" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>
</div>

<div class="block w3">
	<form action="" method="post">
	    <div class="title">�������� ����</div>
		<div class="price"><span>90%</span> � �����</div>
		<img src="/images/cars/9.jpg" />
		<ul class="featurelist">
		<li>�������:</li>
		<li>�����: <span><?=$sonfig_site["9_in_h"]; ?></span> / ���</li>
        <li>���������: <span><?=$sonfig_site["amount_9_t"]; ?></span>C</li>
		<li>�������: <span><?=$user_data["9_t"]; ?></span> ��.</li>
		<div class="title2">
		<input type="hidden" name="item" value="9" />
		<input type="text" name="amount" value="1" style="height: 30px; width: 40px; margin-top:10px; " /> 
		<input type="submit" value="������" style=" margin-top:15px; "  />
	</form>
	</div>

			</div>

</div>
	<div style="clear: both;"></div>
</div>
