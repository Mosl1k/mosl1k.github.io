<?PHP
$_OPTIMIZATION["title"] = "���. �������";
$_OPTIMIZATION["description"] = "���. �������";
$_OPTIMIZATION["keywords"] = "���. �������";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<div id="b3">
	<div class="block">
		<h2>���. ������</h2>
	
����������� � ���� ����� ������ � ��������, �� ������ �������� 40% �� ������� ���������� �������  
������������ ���� ���������. ����� �� ��� �� ���������. ���� ��������� ������������ ����� 
�������� ��� ����� 1000 ������.<br>
���� ������������ ������ ��� ����������� ���������.<br />
<img src="/img/piar-link.png" style="vertical-align:-2px; margin-right:5px;" /><font color="#000;"><b>http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?></b></font>
<br><hr>
<br>
	<h2>�������</h2>



<center><font color="#00bbf2"><h3>������ 468�60</h3></font><p>
<img src="http://<?=$_SERVER['HTTP_HOST']; ?>/468.gif">
<br>
<textarea onmouseover="this.select()" style="width: 495px; height: 55px;">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?> target="_blank"&gt;
&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/468.gif" /&gt;&lt;/a&gt;
</textarea>
<br>
</center><p>
<br><hr>
<center><font color="#00bbf2"><h3>������ 200x300</h3></font><p>
<img src="http://<?=$_SERVER['HTTP_HOST']; ?>/200.gif">
<br>
<textarea onmouseover="this.select()" style="width: 495px; height: 55px;">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>" target="_blank"&gt;
&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/200.gif" /&gt;&lt;/a&gt;
</textarea>
<br>
</center><p>











			</div>
</div>

	<div style="clear: both;"></div>
</div>