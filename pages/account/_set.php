<?PHP
$_OPTIMIZATION["title"] = "������";
$_OPTIMIZATION["description"] = "������ �������";
?>
<div id="b3">
	<div class="block">
		<h2>������ �������</h2>


<b>WM SET - ��� ���������� ������������, ������� ������ ������������ ��� ���������� �������. <BR /></b>
WM SET ����������� � �������������� ������ ����� ������� ���������� �������. �������� ����� �������� ������ 1 WM SET �� 1 ����������.<BR />
<BR />
<b><font color = "red">�����:</font> ���������� ������ ��� �����! � ��� �� ���������� ����������� �����.</b> 

<BR />


<b><center>�������� ���������� �����</center></b><BR />
<form action="" method="post">
	
	<center>����������� �����: <input type="text" name="sum" value="<?=(isset($_POST["sum"])) ? intval($_POST["sum"]) : 100;?>" />
	<BR /><BR />
	<input type="submit" value="��������� �����">
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
    <td colspan="5" align="center" style="padding:5px;"><b>��� ���������� �� ����� <?=$insum; ?> RUB �� ��������� ����������:</b></td>
    </tr>
  <tr>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/1.jpg" /> +<?=$marray["t_a"];?> ��.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/2.jpg" /> +<?=$marray["t_b"];?> ��.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/3.jpg" /> +<?=$marray["t_c"];?> ��.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/4.jpg" /> +<?=$marray["t_d"];?> ��.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/5.jpg" /> +<?=$marray["t_e"];?> ��.</div></td>
   
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
    <td colspan="5" align="center" style="padding:5px;"><b>��� ���������� <?=$marray["desc"];?> �� ��������� ����������:</b></td>
    </tr>
  <tr>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/1.jpg" /> +<?=$marray["t_a"];?> ��.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/2.jpg" /> +<?=$marray["t_b"];?> ��.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/3.jpg" /> +<?=$marray["t_c"];?> ��.</div></td>
	<td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/4.jpg" /> +<?=$marray["t_d"];?> ��.</div></td>
    <td align="center" width="20%"><div class="sm-line-nt"><img src="/images/cars/5.jpg" /> +<?=$marray["t_e"];?> ��.</div></td>


    
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