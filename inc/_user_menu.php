<?
					$usid = $_SESSION["user_id"];
					$db->Query("SELECT * FROM wmrush_pm WHERE user_id_in = '$usid' AND status = 0 AND inbox = 1");
					$sk = $db->NumRows();
					if ($sk > 0) {$pmm = '<font color="red">('.$sk.')</font>';} else {$pmm = '<font color="red">(0)</font>';}
					?>


<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">

	<div class="block w2">
		<div class="bal">
			�� �������: <span>{!BALANCE_B!}</span> ���<br>
			<a href="/account/insert" class="button2">���������</a><a href="/account/farm" class="button2">������ </a><br><hr>
			<a href="/account/kredit" class="button2">������</a>
			�� �����: <span>{!BALANCE_P!}</span> ���<br>
			<a href="/account/payment" class="button2">�������</a><a href="/account/swap" class="button2">�������� <b>+25%</b></a>
						
		</div>
	</div>
	<div class="block w2">
	   <div class="acmenu">
	        
			<a href="/account/farm" class="button2">�������</a><br>
			<a href="/account/store" class="button2">������������</a><br>
			<a href="/account/market" class="button2">�����</a>
			<a href="/account/insert" class="button2">���������</a><br>
			<a href="/account/pm" class="button2"><b>���������� ����� <?=$pmm; ?></b></a>
		
			
	</div></div>
	<div class="block w2">
		<div class="acmenu">
			<a href="/account/bonus" class="button2">���������� �����</a><br>
			<a href="/competition" class="button2"><b>������� ���������</b></a>
			<a href="/account/donations" class="button2">�������������</a><br>
			<a href="/account/set" class="button2">������</a>
			<a href="/account/games" class="button2">������� ������</a>
		</div>
	</div>
	
	<div class="block w2">
		<div class="acmenu">
		    <a href="/account" class="button2">��� �������</a><br>
			<a href="/account/config" class="button2">���������</a><br>
			<a href="/account/referals" class="button2">���� ��������</a><br>
			<a href="/account/ref_ban" class="button2">���. ���������</a><br>
			

			<a href="/account/exit" class="button2">�����</a>
		</div>
	</div>
</div>



      
