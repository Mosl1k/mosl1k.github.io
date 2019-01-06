<br>
<div class="s-bk-lf">
	<div class="acc-title">Чат</div>
</div>
<style>
div.wrapPaging {padding: 6px 0px 6px 16px; font-family: Arial, sans-serif; font-size: 14px; clear: both;}
div.wrapPaging a, div.wrapPaging span {margin: 0 1px; padding: 2px 5px; line-height: 26px; text-decoration: none;}
div.wrapPaging a {background: none; color: #025A9C !important; text-decoration: underline; font-size: 14px;}
div.wrapPaging span {background: #E8E9EC; color: #000;}
div.wrapPaging span.ways {background: none; font-size: 15px; color: #000;}
div.wrapPaging span.ways span {background: none; color: #000;}
div.wrapPaging span.ways a {font-size: 15px;}
div.wrapPaging span.divider {color: #000;}
div.wrapPaging i {font-family: Times, sans-serif; margin: 0 5px 0 0;}
div.wrapPaging a:hover {color: #ff0000;}
div.wrapPaging strong {margin: 0 15px 0 0; font-size: 16px; font-weight: bold; color: #000;}

}


</style>
<div class="silver-bk">
<?PHP $stranica=intval($_GET["page"])?>
<?PHP
$_OPTIMIZATION["title"] = "Площадь";
$usid = $_SESSION["user_id"];
$u = $db->Query("SELECT * FROM `db_users_b` WHERE `id`='$usid'");
$us = $db->FetchArray();
#Сумма
$sum = -50;
	echo '<center>';
class pag{
public function paginator($sql,$page,$url, $dop = FALSE)

	{
            global $db;
            $url = htmlspecialchars($url);
            $result = array();
            $result['echo'] = '';
            $config["c_in_page"] = 10;
            // c_in_page - на 1-й странице
            $row = $db->Query($sql);
            $c_rows = $db->NumRows($row);
            $pages = $c_rows/$config["c_in_page"];
            settype($pages, "integer");

            if ($pages*$config["c_in_page"]!=$c_rows)
                    $pages = $pages+1;
            if ($pages==1 OR $page>$pages)
                                    {
                                                    $result["sql"] = $sql.' LIMIT '.$config["c_in_page"];
                    return $result;
                                    }


            //Получаем номер текущей страницы
            $page = ($page>0) ? $page : 1;
            $cur_page = $page;
            $num_pages = $pages;
            $num_links = 4;
            $start_row = ($pages-1)*$config["c_in_page"];
            $total = $c_rows;
            $per_page = $config["c_in_page"];
            if ($cur_page > $total){
                $cur_page = ($num_pages - 1) * $per_page;
            }

            $cur_page = $page;

            //Получаем номер стартовой страницы выводимой в пейджинге
            $start = (($cur_page - $num_links) > 0) ? $cur_page - $num_links : 0;
            //Получаем номер последней страницы выводимой в пейджинге
            $end   = (($cur_page + $num_links) < $num_pages) ? $cur_page + $num_links : $num_pages;

            $output = '<span class="ways">';
			
            //Формируем ссылку на предыдущую страницу
            if  ($page != 1){
                    $i = $page - 1;
                    $output .= '<a href="'.$url.$i.'/'.$this->dopPaginator($dop).'">«</a>';
            }
            else{
                    $output .='<span>«</span>';
            }
    // Формируем список страниц с учетом стартовой и последней страницы   >
                    for ($loop = $start; $loop <= $end; $loop++){
                    if ($loop > 0)
                    {
                            if ($cur_page == $loop)
                               $output .= '<span><class="stn">'.$loop.'</span>'; 
                            else
                               $output .= '<class="stn"><a href="'.$url.$loop.'/'.$this->dopPaginator($dop).'">'.$loop.'</a>';
                    }
            }
            

            //Формируем ссылку на следующую страницу
            if ($cur_page < $num_pages){
                    $next_page = $cur_page+1;
                    $output .= '<a href="'.$url.$next_page.'/'.$this->dopPaginator($dop).'">»</a>';
            }
            else{
                    $output .='<span>»</span>';
            }

           
$output .= '</span><br/>';
            //Формируем ссылку на первую страницу
            if  ($cur_page > ($num_links + 1)){
                    $output .= '<a href="'.$url.'1" title="Первая"><img src="/img/left_active.png"></a>';
            }
        

            //Формируем ссылку на последнюю страницу
            if (($cur_page + $num_links) < $num_pages){
                    $output .= '<a href="'.$url.$num_pages.'" title="Последняя"><img src="/img/right_active.png"></a>';
            }

                            $result["echo"] = '<div class="wrapPaging"><center><strong>Страницы:</strong></center>'.$output.'</div>';
                            $num = $page==1?0:($page-1)*$config["c_in_page"];

                            $sql .= " LIMIT $num,".$config["c_in_page"];
                                                    $result["sql"] = $sql;
        return $result;

	}
		
	function dopPaginator($dop)
		{
			if ($dop !== FALSE)
				return $dop;
	}
	
	

	
	
}





error_reporting(E_ALL);
	if (!empty($_POST["text"]) AND $us["insert_sum"]>=$sum)
	{
	
	
		$text = $db->RealEscape($_POST["text"]);
		$text = ($text);


			
		$db->Query("INSERT INTO `square`(`user_id`, `time`, `text`) 
		VALUES ('$usid','".time()."','$text')");
		echo '<font color="green"><center>Успешно добавлено</center></font>';
	}
	$pag = new pag;
	$sql = "SELECT * FROM `square` JOIN `db_users_b` ON `db_users_b`.`id`=`square`.`user_id`  JOIN `db_users_a` ON `db_users_a`.`id`=`square`.`user_id` ORDER BY `sq_id` DESC";
	if ($stranica<1) { $pag = $pag->paginator($sql,1,"/?menu=square&page="); } else {
	$pag = $pag->paginator($sql,$_GET["page"],"/?menu=square&page="); }
    $db->Query($pag["sql"]);

	if (!empty($_GET["id"]) AND ($usid==1 OR $usid==1))
	{
		$id = (int)$_GET["id"];
		$db->Query("DELETE FROM `square` WHERE `sq_id`='$id'");
		header("Location: /account/square/");
		return;
	}
	
?>



<div style="border: left">


 - Запрещены нецензурные выражения.<br>
 - Запрещено рекламировать другие сайты/проекты.<br><br>
<center> За нарушение возможна блокировка в игре с обнулением баланса.<br></center>

</div><hr><br>

<form>
<input type="submit" name="reload" value="Обновить страницу" action="" class="btn_7">
</form>


<?PHP if ($us["insert_sum"]>=$sum) {?>

<form action="" method="post">
<script>
function inputSmile(smile)
	{
		$('#text').val($('#text').val() + ' ' + smile);
	}

</script>
   <script type="text/javascript"> 
function openbc(ndx) {
    $("#bblock"+ndx).slideToggle("fast");
    return true;
}
</script>
		<table border="0" style="margin-top: 10px;">
		<tbody>
    	<tr>
    		
			
		<br><textarea name="text" id="text" style="width: 500px; height: 100px;"></textarea>
    	</tr>
    
    	<tr>
    		<td><center><b><input type="submit" class="btn_7" value="Отправить"></b></center><br></td>
    	</tr>
    </tbody></table>
</form>
<?PHP } else {	?> <center><font color="red">В чате могут писать пользователи, пополнившие баланса более, чем на 50 рублей!</font></center><br><?PHP } ?>



<script>
	function inputSmile(smile)
	{
		$('#text2').val($('#text2').val() + ' ' + smile);
	}
</script>

<table border="0" width="570">
        <tbody>
            <?php
			while($view = $db->FetchArray()){
				$view["text"] = nl2br($view["text"]);
				$view["data"] = date("d.m.Y H:i",$view["time"]);
			?>
      
    		<table border="0" cellpadding="10" cellspacing="20" width="500">
    			<tbody><tr><td bgcolor="#DDDDDD">
    				<b><? if ($view["id"]==1 OR $view["id"]==1) echo '<font color="red"><b>'.$view['user'].'</b></font>'; else echo $view['user']?>&nbsp;&nbsp; <?=$view["data"]?> <?php if ($usid==1 OR $usid==1) echo '<a href="/account/square/'.$view['sq_id'].'">удалить</a>';?></b>
					   <hr> 			
    			
    				<center><div style="text"></center>
					
					<?=$view["text"]?>			
					</div>
    			<form action=\"\" method=\"post\">
			<input type=\"hidden\" name=\"del_id\" value=\"$by_user_id\">
			<input type=\"submit\" name=\"delotz\" value=\"Удалить\" />
			</form>
				</td>
				 </tr>
				 </td>
    		</tbody></table>
    	
   
<? } ?>
</tbody></table>
<?=$pag["echo"]?>
<?
if(isset($_POST["delotz"]) AND isset($_POST["del_id"]))
{
	$id=intval($_POST["del_id"]);
	if(isset($_SESSION["admin"]))
	{
		$db->Query("DELETE FROM db_otziv WHERE user_id = {$id};");
		echo('<tr><td align="center" colspan="6">Отзыв успешно удалён!</td></tr>');
	}
}	
	

		//
if ($us["insert_sum"]>=$sum){
?>

<? }?>
<a href="/square/{$smarty.section.id.index}/"></a>

</div>
<div class="clr"></div>
