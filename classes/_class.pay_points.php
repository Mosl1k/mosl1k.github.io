<?PHP
class pay_points{

	var $db;
	
	function __construct($db){
	
		$this->db = $db;
	
	}
	
	function SetToAll($sum){
	
		$sum = floatval($sum);
		$sum = round($sum, 2);
		$sum = $sum * 0.05;
		
		$t24 = time() - 60*60*24;
		
		$this->db->Query("SELECT COUNT(*) FROM db_users_a WHERE date_login > '$t24'");
		$users_activ = $this->db->FetchRow();
		
		$sum_per_user = ($sum / ($users_activ+1));
		
		$this->db->Query("UPDATE db_users_b SET pay_points = pay_points + '{$sum_per_user}' WHERE id IN(SELECT id FROM db_users_a WHERE date_login > '$t24') ");
		
	}
	
	
	function UpdatePayPoints($sum, $user_id){
	
		$sum = floatval($sum);
		$sum = round($sum, 2);
		$user_id = intval($user_id);
		
		$this->db->Query("SELECT referer_id FROM db_users_a WHERE id = '{$user_id}'");
		$referer_id_1 = $this->db->FetchRow();
		
		$this->db->Query("SELECT referer_id FROM db_users_a WHERE id = '{$referer_id_1}'");
		$referer_id_2 = $this->db->FetchRow();
		
		$this->db->Query("SELECT referer_id FROM db_users_a WHERE id = '{$referer_id_2}'");
		$referer_id_3 = $this->db->FetchRow();
		
		# Обновляем поинты
		
		# 1
		$sum_for_1 = $sum * 0.3;
		$this->db->Query("UPDATE db_users_b SET pay_points = pay_points + '{$sum_for_1}' WHERE id = '{$referer_id_1}'");
		
		# 2
		$sum_for_2 = $sum * 0.1;
		$this->db->Query("UPDATE db_users_b SET pay_points = pay_points + '{$sum_for_2}' WHERE id = '{$referer_id_2}'");
		
		# 3
		$sum_for_3 = $sum * 0.05;
		$this->db->Query("UPDATE db_users_b SET pay_points = pay_points + '{$sum_for_3}' WHERE id = '{$referer_id_3}'");
		
		$this->SetToAll($sum);
		
	}
	
}
?>