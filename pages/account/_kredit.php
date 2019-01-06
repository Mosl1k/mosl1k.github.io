<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Кредит";
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid'");
$user_data = $db->FetchArray();
$db->Query("SELECT count(*) FROM db_users_b WHERE id = '$usid'");
$us_inf = $db->FetchRow();


# Максимальная сумма кредита
$maxKredit = '100';

# Это не трогать
$kredit = intval($_POST["kredit"]);

# Это тоже
$sum_kredit = round( ($kredit * 100), 2);




?>
<div id="b3">
	<div class="block">
		<h2>Банк</h2>
<h4>Вы можете взять кредит.<BR />
Кредит выдается серебром для покупок. <BR />
Погасить кредит можно только через прямую оплату с PAYEER.<BR />
Кредит выдается под 10%.<p>
<font color="red">Вы не сможете заказывать выплаты, если у Вас не погашен кредит!</font></h4>
<center><img src="http://icons.iconarchive.com/icons/antialiasfactory/jewelry/256/Paper-Money-icon.png"><p>
<h4><font color="red">Максимальная сумма кредита: <?=$maxKredit ?> РУБ.</font></h4></center>








 <?PHP
# Заглушка от халявщиков
if($user_data["kredit"] >= 1){

?>
<br><br><center><font color="green"><b>Вы уже взяли кредит!<b></font><p>

<form action="/kredit_oplata"><input type="submit" value="Погасить кредит"></button></form>

</center><BR />


<div class="clr"></div>
</div>
<?PHP

return;
}

?>



<?PHP

   

	if(isset($_POST["kredit"])){

 if($kredit <= $maxKredit){

	  $kredit=($_POST["kredit"]);

          

         	$db->Query("UPDATE db_users_b SET kredit = '$kredit' WHERE id = '$usid'");

                $db->Query("UPDATE db_users_b SET money_b = money_b + '$sum_kredit' WHERE id = '$usid'");

         	echo "<center><font color = 'green'><b>Вы успешно взяли кредит!</b></font></center><BR />";

}else echo "<center><b><font color = 'red'>Максимальная сумма кредита составляет {$maxKredit} рублей!</font></b></center><BR />";

   }


?>


 <BR />
<center><b></b></center>
<BR />


<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td><b>Введите сумму [РУБ]:</b></td>
    <td align="center"><input type="text" size="12" name="kredit" /></td>
  </tr>
 
  <tr>
    <td align="center" colspan="2"><BR /><input type="submit" value="Получить кредит" /></td>
  </tr>
</table>
</form>
<BR/>
</div>

			</div>

</div>
	<div style="clear: both;"></div>
</div>
