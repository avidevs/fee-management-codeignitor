<?php 

	class Crud extends CI_model
	{
		
		public function getbranch_list()
		{
			$this->db->select('state_list.state, all_cities.city_name ,branch.id, branch.reg_date, branch.branch_code, branch.branch_name, branch.branch_user_name, branch.branch_add, branch.pincode, branch.status, state_list.id as state_id, all_cities.city_code as citycode');
			$this->db->from('branch');
			$this->db->order_by('id');
			$this->db->join('state_list','branch.state=state_list.id');
			$this->db->join('all_cities','branch.city=all_cities.city_code');
			$query=$this->db->get();
			return $query->result();
		}

		public function add_branch($data)
		{
			$query=$this->db->insert('branch',$data);
			$id=$this->db->insert_id($query);
			if (!empty($id))
			 {
				$branch_code="BRANCH00".$id;
				$sql= "UPDATE branch SET branch_code='$branch_code' where id=$id";
				$this->db->query($sql);

			}
		}



		function branch_modal($id)
		{
			$this->db->select("*");
			$this->db->from("branch");
			$this->db->where('id',$id);
			$query=$this->db->get();
			return $query;
		}


		function updatebranch($data)
		{
			$this->db->where('id',$data['id']);
			$query=$this->db->update('branch',$data);
		}

		 
    function deletebranch(){
        $id=$this->input->get('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('branch');
        return $result;
    }



		public function getteacher_list()
		{
			$this->db->select('state_list.state, all_cities.city_name ,teacher.id, teacher.reg_date, teacher.teacher_code, teacher.teacher_name, teacher.teacher_user_name, teacher.teacher_add, teacher.pincode, teacher.status, state_list.id as state_id, all_cities.city_code as citycode');
			$this->db->from('teacher');
			$this->db->order_by('teacher_code', 'DESC');
			$this->db->join('state_list','teacher.state=state_list.id');
			$this->db->join('all_cities','teacher.city=all_cities.city_code');
			//$this->db->order_by('branch_code', 'DESC');
			$query=$this->db->get();
			//print_r($query);
			return $query->result();
		}


	}
?>