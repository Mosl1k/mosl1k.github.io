<?PHP
$_OPTIMIZATION["title"] = "�������";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$dadd = time();
?>
<div id="b3">
	<div class="block">
		<h2>�������</h2>


<table cellpadding='3' cellspacing='0' border='0'  align='center' width="550" BGCOLOR="#34c924" >
  <?PHP
  
  $db->Query("SELECT * FROM db_chat ORDER BY id DESC LIMIT 30");  
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>	
		<tr>
		<td colspan="2"><HR SIZE="2" WIDTH="90%" ALIGN="center" COLOR="#00ff00"></td></tr><tr>
    		<td align="left" width="300">

			<font color=blue>
			<b><?=$bon["user"]; ?></b></font></td><td align="right" width="200"><font color=blue><?=date("d.m.Y",$bon["date_add"]); ?></td></tr><tr>
    		<td colspan="2" align="left"><? if ($bon["user"]=="admin") # ���� ��� ������������ � ���� �����- �� ��� ��������� ����� ��������� ����:
			{?><font color=#00ff00> <? } ?>  <?=$bon["tekst"]; ?></td>
  		
		</tr> 
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="3">��� �������</td></tr>'
  ?>

  <tr>
    <td colspan="2" align="center"><h4><font color="white">�������� ��������� 30 ���������</font></h4></td>
    </tr>
</table>
<?PHP

if(isset($_POST["chat"])) {

	$text =$_POST["ntext"];
if($user_data["money_b"] >0) # ��������� ������� �����
{	
if (preg_match("/[\>|\<]/",$text)) # ��������� ������� < � >
{ echo "<center><b><font color = 'red'>��������� �������� ����������� �������</font></b></center><BR />";
} else {	
	
		
			$db->Query("INSERT INTO db_chat (user, tekst, date_add) VALUES ('$uname','$text','$dadd')");
			$db->Query("UPDATE db_users_b SET money_b = money_b - 0 WHERE id = '$usid'");
			echo "<center><b><font color = 'blue'>��������� ����������</font></b></center><BR />";
			
}
} else echo "<center><b><font color = 'red'>������������ ���$ ��� �������</font></b></center><BR />";
} 
?>
<center><?PHP if($user_data["money_b"] >0) {?><form action="" method="post">
<b>���������:</b> [�������� ����������!]<BR />
<textarea  name="ntext" cols="50" rows="3"><?=(isset($_POST["ntext"])) ? $_POST["ntext"] : false; ?></textarea><BR />
<center><input type="submit" name="chat" value="���������" /></center>
</form><font color="blue"><b>��������! ��������� ����, ������, �������, ����������� ���������� � ������������� �������. � ������ ��������� ������������ ����� ���� ���������� ��� �������.</b></font> <?PHP } else {	?> ��������� ��������� 10 ���$ - �� ����� ����� ������������ �������.<?PHP } ?></center>
			</div>
</div>

	<div style="clear: both;"></div>
</div>