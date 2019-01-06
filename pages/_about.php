<?PHP
######################################
# Скрипт Fruit Farm
# Автор Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "О проекте";
$_OPTIMIZATION["description"] = "О нашем проекте";
$_OPTIMIZATION["keywords"] = "Немного о нас и о нашем проекте";
?>
<div style="clear: both; height: 40px;"></div>
<div id="center" class="yjsgsitew">
<div id="b3">
	<div class="block lh20">
		<h2>О проекте</h2>
<?PHP

$db->Query("SELECT about FROM db_conabrul WHERE id = '1'");
$xt = $db->FetchRow();
echo $xt;
?></font>
</div>
</div>
</div>

	<div style="clear: both;"></div>
</div>