<?php 

	class Fetchstate extends CI_model
	{
		
		public function getstate()
		{
			$query=$this->db->get('state_list');
			return $query;
			echo $query;
		}


		public function getcity($state_id)
		{
			$query=$this->db->query("select * from all_cities where state_code='".$state_id."'");
			$query=$query->result();
			return $query;
		}
	}

?>