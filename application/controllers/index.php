<?php 
	defined('BASEPATH') or exit('NO direct script access allowed');
 	class Index extends CI_Controller
 	{
 		public function __construct()
 		{
	        parent::__construct();
	        $this->load->helper('url');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
		 	}
	 	
 	 	public function index()
 	 	{ 	 
	
 	 		$this->load->view('include/top-header');
 	 		$this->load->view('index');

 	 		$this->load->view('include/footer');
 	 		

 	 	}

 	 	public function login()
 	 	{
			$this->form_validation->set_rules('username','User Name','required|alpha|trim');
	 	 	$this->form_validation->set_rules('password','password', 'required');
	 	 		//echo "string";
	 	 			
	 	 		if ($this->form_validation->run())
		 		{	 			
	 	 			$username= $this->input->post('username');
	 	 			$password= $this->input->post('password');

	 	 			$this->load->Model('loginmodel');
	 	 			if ($this->loginmodel->validate_login($username,$password))
		 	 			{
		 	 				//Credential valid-> user login
		 	 				echo "OK";
		 	 			}
	 	 			else
		 	 			{
		 	 				//Authentication faild
		 	 				echo "Password Do Not Match.";

		 	 			}
	 	 		//echo "user:$username and pass:$password";
	 	 		
	 	 		}
	 	 		else
	 	 		{
	 	 			echo "require";
	 	 		}
	 	 	 	 		
 	 	}
 	}
 ?>