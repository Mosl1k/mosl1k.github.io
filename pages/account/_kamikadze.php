<?PHP
$_OPTIMIZATION["title"] = "������� - ���������";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_kamikadze WHERE user_id = '$usid' and status = 0");
$bonus_data = $db->FetchArray();
?>
<div id="b3">
	<div class="block">
		<h2>���������</h2>


<style>
.silver-caxik {
background: #FFFFFF;
border: 2px solid #dddddd;
width: 140;
border-radius: 4px;
margin: -10px 0px 0px 0px;
padding: 10px 12px 10px 12px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
margin-top: 5px;
filter: alpha(Opacity=87);
opacity: 0.87; 
}

.silver-makardak {
background: #FFFFFF;
border: 2px solid #dddddd;
width: 450;
border-radius: 4px;
margin: -10px 0px 0px 0px;
padding: 10px 12px 10px 12px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
margin-top: 1px;
}

.silver-bklobux4ik781 {
background: url("/img/kamikadze/back.png") center no-repeat;
border: 1px solid #dddddd;
width: 550px;
border-radius: 21px;
margin: 6px 0px 0px 0px;
padding: 30px 12px 14px 12px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
}

.pilotik {
float: left;
width: 123px;
height: 110px;
position: relative;
top: -20px;
left: -2px;
background-image: url(/img/kamikadze/pilot_die.png);
}

.txtik {
float: left;
width: 378px;
height: 21px;
position: relative;
top: -3px;
left: 78px;
background-image: url(/img/kamikadze/text.png);
background-repeat: no-repeat;
padding-left: 33px;
padding-top: 2px;
}


</style>

<html>

<body onload="a()">
</body>
</html>


		
		<? if(!isset($bonus_data["id"]))
		{

		?>
			


	<div style="clear: both;"></div>

	

	
				<center>
				
	 <?PHP
 #��������� ����

 if(isset($_POST["item"]))
	{		if(!isset($bonus_data["id"]))
		{
	$stavka = intval($_POST['stavka']);
	if($stavka <= $user_data['money_b']) {	
	 if($stavka >= 10) {
	$dadd = time();
			$date_d = time() + 2;			$db->Query("INSERT INTO db_kamikadze (user, user_id, item, date_add, date_del, stavka, status)
											VALUES ('$uname','$usid','1', '".time()."', '$date_d', '$stavka', '0')");
	
        $db->Query("UPDATE db_users_b SET money_b=money_b-'$stavka' WHERE id = '$usid'");
			echo "<center>�� ������ ����</center>";
		
		}else echo "<center><font color='red'>����������� ������ 10 �������!</font>";
		}else echo "<center><font color='red'>������������ ������� �� �������!</font>";
		
		echo "<script language='JavaScript' type='text/javascript'>window.location.replace('/account/kamikadze')</script>";		}     }
      
?>			
				
				<form action="" method="post">
					<center>� ���� 10 ����� �� 5 ������, � � ������ ���� �� 1 ����. ���� ���� ������</center>
<center>��� ����� ����, ��� ���� �� ������������, ��� ������ ��� �������.</center> 
<center>����� � ����� ������ ���������� ����� ���� ������ �����������</center>
<center>������������ ����� ����� �� ������ "�������".</center>
		






		<input type="hidden" name="item" value="1" />
<center><br></center>					
					<center><input class="poilop" type="text" style="text-align:center" name="stavka" value="10"></center>
					<input type="submit" value="������ ����" class='btn_2d' style='height: 29px; margin-top:10px;' /></center>
				</form>
			  
			  
			  

			  
			

		<?
        }
		?>




<?
if(isset($bonus_data["id"]))
		{


	$item=$bonus_data["item"];
	$dadd = time();
             #���� ������� ���� ������ ��� ���� � ���� ���� ������
    		 if ($dadd > $bonus_data["date_del"])
    		 {
	    		 	
					//$rnd=rand(1,100); 
             }else
					{
					$db->Query("SELECT * FROM db_kamikadze WHERE user_id = '$usid' and status = 0");
					$u_data = $db->FetchArray();
							$time = $u_data['date_del'] - $dadd;


							
					$next_pay=$u_data["stavka"]*2;
					 ////////////////////////////////////////////////////
					
					
					
                  
                    				  
				 
				}

				
				
				///////////////////////////////////////////////////////////////////
				if(isset($_POST["perexod"])) {
									
									#���� ��������
									$rnd=rand(1,50);
	    		 	//$rnd == 1;					 #���� ������� ��������� � ��������� ����
				     if ($rnd >= 30 AND $item <=9)
				     {				     	
						$db->Query("UPDATE db_kamikadze SET item = item+1, stavka= stavka*2, date_add = '$dadd', date_del = '$date_d' WHERE user_id = '$usid' and status = 0");
                        echo "<script language='JavaScript' type='text/javascript'>window.location.replace('/account/kamikadze')</script>";
			     }else
				      {
				        # ��������� ����
				     	$money = "$bonus_data[stavka]";
				     	$db->Query("UPDATE db_kamikadze SET status = '2' WHERE user_id = '$usid' and status = 0");
				     	$db->Query("UPDATE db_users_b SET money_b=money_b-'$stavka' WHERE id = '$usid'");
				     	

					echo "<center>";
					   
echo "<center><font color=red>�� ������ �� ���� !</font></center>";
echo"<script language='JavaScript' type='text/javascript'>window.location.replace('/account/kamikadze')</script>";
                       				       
					    
						echo "</center>";
					 
					  } 
	}		
				///////////////////////////////////////////////////////////////////
				
	$db->Query("SELECT * FROM db_kamikadze WHERE user_id = '$usid' and status = 0");
					$u_data = $db->FetchArray();
					
	echo "<form action='' method='post'>
<input type='hidden' name='perexod'/>

<script type='text/javascript'>
function r_out03(){
var b=[];
b[0]='&nbsp;&nbsp;���������!!!';
b[1]='&nbsp;&nbsp;� ��� � ��������...';
b[2]='&nbsp;&nbsp;���������, ������������� � �����!';
b[3]='&nbsp;&nbsp;� �� ���� �������!';
var i=Math.floor(Math.random()*b.length);
document.write( b[i] );
}
</script>

<center><div class='silver-bklobux4ik781'><div id='pilot' class='pilotik'><div id='kt' class='txtik'>
<div style='float: left;'>
<div style='float: left;'><script type='text/javascript'>r_out03()</script></div>
</div>
</div></div><div class='silver-caxik'><input type='image' src='/img/kamikadze/pict_$u_data[item].png'></div>
					
					 

</div>
</center>
					 
					 
				<center>
					<div class='silver-makardak'>
					 <center>�� ����� �� <font color=green><b>$u_data[item]</b></font>-��� ����.</center>
					 <center>��� ������� ����������  <font color=green><b>$u_data[stavka]</b></font> �������.</center>
					
					
					
					
					
					
					 </div>
					 </center>

</form>
					";	
	
	//===============//
				
                   if(isset($_POST["zaberanto"])) {
     
	                  # ������� �������, ��������� ����
				     	$money = "$bonus_data[stavka]";
				     	$db->Query("UPDATE db_kamikadze SET status = '1' WHERE user_id = '$usid' and status = 0");
				     		$db->Query("UPDATE db_users_b SET money_b=money_b+'$money' WHERE id = '$usid'");
   	 
					   echo"<script language='JavaScript' type='text/javascript'>window.location.replace('/account/kamikadze')</script>";
                       
					 
				
     }				 
 
	
echo "<form action='' method='post'>
<input type='hidden' name='zaberanto'/>
<center><input id='zaberantolik'  onFocus='Javascript:if(this.value='text')this.value='������ ������' class='btn_2d' type='submit' style='height: 29px; width: 123px;' value='������� '></center>

</form>";				
				
				
				

    }

	
	
	
?>





				





	

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">

<tr>
    <td colspan="6" align="center"><h4>��������� 20 ����</h4></td>
    </tr>

  <tr>
    <td align="center" width="100" class="m-tb">ID</td>
    <td align="center" width="100" class="m-tb">������������</td>
	<td align="center" width="100" class="m-tb">�����</td>
	<td align="center" width="100" class="m-tb">���</td>
    <td align="center" width="100" class="m-tb">����</td>
	<td align="center" width="100" class="m-tb">������</td> 
 </tr>
  <?PHP

  $db->Query("SELECT * FROM db_kamikadze ORDER BY id DESC LIMIT 20");
	
	if($db->NumRows() > 0){

  		while($bon = $db->FetchArray()){
		if ($bon["status"] == 1) { 
		$winn = '<font color="green">������ :)</font>'; 
		} else { 
		$winn = '<font color="red">�������� :(</font>'; 
		}
		if ($bon["status"] == 0) { 
		$winn = '<font color="blue">������...</font>'; 
		}
		$date = date('d-m-Y', $bon["date_add"]);
		?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["stavka"]; ?></td>
			<td align="center"><?=$bon["item"]; ?></td>
	     	<td align="center"><?=$date; ?></td>
			<td align="center"><?=$winn; ?></td>
  		</tr>
		<?PHP

		}

	}else echo '<tr><td align="center" colspan="6">��� �������</td></tr>'
  ?>



</table>



			</div>
</div>

	<div style="clear: both;"></div>


