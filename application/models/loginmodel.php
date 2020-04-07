<?php  

class LoginModel extends CI_Model
{
	public function validate_login($username,$password)
	{
		$this->db->where('name',$username);
		$this->db->where('password',$password);
		$sql=$this->db->get('admin');

		if ($sql->num_rows()==1 )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
}

?>
