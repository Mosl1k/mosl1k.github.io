<div id="b3">
	<div class="block">
		<h2>����� �������</h2>

<?PHP
$_OPTIMIZATION["title"] = "����� �������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_users_a WHERE id = '$usid' LIMIT 1");
$user_dataa = $db->FetchArray();



$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$status_array = array( 0 => "�����������", 1 => "�������������", 2 => "��������", 3 => "���������!!!");

# ��������� ��������!
$minPay = 100; 

?>




<h2>������� �������������� � ������ ������ � ������ �� ��������� ������� PAYEER,Qiwi,������.������!</h2>

<b> ����������� ����� 1 ��� </b> <BR /><BR />
<b>�� ��������� ������� Payeer �� ������ ������� ���� �������� � �������������� ������ �� ��� ��������� ��������� ������� � ������������� �����.</b><BR /><BR />
<b>������ �� ������� ���������:</b><BR />
 - <a href="http://payeeer.ru/create" target="_blank">�������� ����� � Payeer</a> <BR />
 - <a href="http://payeeer.ru/outpay" target="_blank">����� ������� �� payeer</a> <BR /><BR />

<center><b>����� �������:</b></center><BR />
<?PHP
# �������� �� ����������
if($user_data["insert_sum"] <= 99.99){

?>
<center><font color="blue"><b>������� ����� ���������� ������������, ������� ��������� ������ ������, ��� �� 100 RUB!<b></font></center><BR />

			</div>
</div>

	<div style="clear: both;"></div>
<?PHP

return;
}

?>





<?PHP
	
	function ViewPurse($purse){
		
		if( substr($purse,0,1) != "P" ) return false;
		if( !ereg("^[0-9]{7,8}$", substr($purse,1)) ) return false;	
		return $purse;
	}
	
	
	# ������� �������
	if(isset($_POST["purse"])){
		
		$purse = $_POST["purse"];
		$sum = intval($_POST["sum"]);
		$plat_passs = intval($_POST["plat_pass"]);
		$plat_pass = ($plat_passs);
		$val = "RUB";
		$sum_pay = round( ($sum / $sonfig_site["ser_per_wmr"]), 2);
		
		if($plat_pass == $user_dataa['plat_pass']) {
		
			if($purse !== false){
				
					if($sum >= $minPay){
					
						if($sum <= $user_data["money_p"]){
							
												# ��������� �� ������������ ������
						$db->Query("SELECT COUNT(*) FROM db_payment WHERE user_id = '$usid' AND (status = '0' OR status = '1')");
						if($db->FetchRow() == 0){
								
								
							### ������ ������� ###	

						$db->Query("INSERT INTO db_payment (user, user_id, purse, sum, valuta, serebro, payment_id, date_add, status) 											
						VALUES ('$usname','$usid','$purse','$sum_pay','RUB', '$sum','$ppid','".time()."', '1')");
											
											$db->Query("UPDATE db_users_b SET payment_sum = payment_sum + '$sum_pay'  WHERE id = '$usid'");
											$db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum_pay' WHERE id = '1'");
											

											$db->Query("UPDATE db_users_b SET money_p = money_p - '$sum' WHERE id = '$usid'");
											echo "<center><font color = 'blue'><b>������ ����������!</b></font></center><BR />";
                                     

								
							}else echo "<center><font color = 'red'><b>� ��� ������� �������������� ������. ��������� �� ����������.</b></font></center><BR />";
								
							
						}else echo "<center><font color = 'red'><b>�� ������� ������, ��� ������� �� ����� �����</b></font></center><BR />";
					
					}else echo "<center><b><font color = 'red'>����������� ����� ��� ������� ���������� {$minPay} ��������!</font></b></center><BR />";
			
			}else echo "<center><b><font color = 'red'>������� ������ �������! �������� �������!</font></b></center><BR />";
		}else echo "<center><b><font color = 'red'>��������� ������ ������ �� �����!</font></b></center><BR />";
	}
?>
<?php
if($user_dataa['plat_pass'] == 0) {
echo "<center><b><font color = 'red'>������� ��������� ������ � ����������!</font></b></center><BR />";
} else {

?>
<form action="" method="post">
<table width="99%" border="0" align="center">
  
  <td><font color="#000;">������� ������� �� PAYEER,Qiwi ��� ������.������</font>: </td> 
	<?php

    IF($sonfig_purse["purse"])
    {$pur=$sonfig_purse["purse"];
    echo"<td><input type='text' name='purse' size='15' value='".$pur."' readonly='readonly'";
    echo"</td>";
    }

    else echo"<td><input type='text' name='purse' size='15'/> </td>";


?>
 
  
  <tr>
    <td><font color="#000;">������� ������� ��� ������</font> ���. 1 ���<font color="#000;">:</font> </td>
	<td><input type="text" name="sum" id="sum" value="<?=round($user_data["money_p"]); ?>" size="15" onkeyup="PaymentSum();" /></td>
  </tr>
  <tr>
    <td><font color="#000;">��������� <span id="res_val"></span></font><font color="#000;">:</font> </td>
	<td>
	<input type="text" name="res" id="res_sum" value="0" size="15" disabled="disabled"/>
	<input type="hidden" name="per" id="RUB" value="<?=$sonfig_site["ser_per_wmr"]; ?>" disabled="disabled"/>
	<input type="hidden" name="per" id="min_sum_RUB" value="1" disabled="disabled"/>
	<input type="hidden" name="val_type" id="val_type" value="RUB" />
	</td>
  </tr>
  <tr>
    <td><font color="#000;">��������� ������[����������� � ����������]</font>: </td>
	<td><input type="text" name="plat_pass" size="15"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="swap" value="�������� �������" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
</form>
<script language="javascript">PaymentSum(); SetVal();</script>
  
  
<?php } ?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h3>���� ��������� �������</h3></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">�����</td>
	<td align="center" class="m-tb">�����</td>
	<td align="center" class="m-tb">�������</td>
	<td align="center" class="m-tb">������</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["sum"]; ?> RUB</td>
			<td align="center"><?=$ref["user"]; ?></td>
			<td align="center"><?=$ref["purse"]; ?></td>
    		<td align="center"><?=$status_array[$ref["status"]]; ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">��� �������</td></tr>'
  
  ?>

  
  
</table>

			</div>
</div>

	<div style="clear: both;"></div>
