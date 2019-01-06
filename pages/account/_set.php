<?PHP
$_OPTIMIZATION["title"] = "Бонусы";
$_OPTIMIZATION["description"] = "Бонусы проекта";
?>
<div id="b3">
	<div class="block">
		<h2>Список бонусов</h2>


<b>WM SET - это комбинация инструментов, которые даются пользователю при пополнении баланса. <BR /></b>
WM SET начисляется в автоматическом режиме после каждого пополнения баланса. Максимум можно получить только 1 WM SET за 1 пополнение.<BR />
<BR />
<b><font color = "red">ВАЖНО:</font> инструмент дается как бонус! У вас НЕ забирается пополняемая сумма.</b> 

<BR />


<b><center>Показать получаемый бонус</center></b><BR />
<form action="" method="post">
	
	<center>Пополняемая сумма: <input type="text" name="sum" value="<?=(isset($_POST["sum"])) ? intval($_POST["sum"]) : 100;?>" />
	<BR /><BR />
	<input type="submit" value="Расчитать бонус">
	</center>
	
</form>
<div style="clear: both;"></div>		
</div>
<div style="clear: both;"></div>		
</div>
<?PHP
$wmset = new wmset();

if(isset($_POST["sum"])){

$insum = (intval($_POST["sum"]) > 0 AND intval($_POST["sum"]) <= 100000) ? intval($_POST["sum"]) : 0;

$marray = $wmset->GetSet($insum);



?>
<BR /><BR />

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center" style="padding:5px;"><b>При пополнении на сумму <?=$insum; ?> RUB Вы получаете инструмент:</b></td>
    </tr>
  <tr>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/1.jpg" /> +<?=$marray["t_a"];?> шт.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/2.jpg" /> +<?=$marray["t_b"];?> шт.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/3.jpg" /> +<?=$marray["t_c"];?> шт.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/4.jpg" /> +<?=$marray["t_d"];?> шт.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/5.jpg" /> +<?=$marray["t_e"];?> шт.</div></td>
   
  </tr>
</table>

<BR />
<div style="clear: both;"></div>		
</div>
<div style="clear: both;"></div>		
</div>
<?PHP
return;

}

$array = $wmset->SetsList();
	
	
	foreach($array as $index => $marray){
	
	?>
	<BR /><BR />
<div style="clear: both;"></div>		
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center" style="padding:5px;"><b>При пополнении <?=$marray["desc"];?> Вы получаете инструмент:</b></td>
    </tr>
  <tr>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/1.jpg" /> +<?=$marray["t_a"];?> шт.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/2.jpg" /> +<?=$marray["t_b"];?> шт.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/3.jpg" /> +<?=$marray["t_c"];?> шт.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/4.jpg" /> +<?=$marray["t_d"];?> шт.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/5.jpg" /> +<?=$marray["t_e"];?> шт.</div></td>


    
  </tr>
</table>

<BR />
<div style="clear: both;"></div>		
</div>
<div style="clear: both;"></div>		
</div>	
	<?PHP
	
	}
	
?>