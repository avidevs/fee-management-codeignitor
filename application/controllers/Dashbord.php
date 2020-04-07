
<?php 
	defined('BASEPATH') or exit('No direct script access allowed');
class Dashbord extends CI_Controller
 	{
 		public function __construct()
 		{
	        parent::__construct();
	        $this->load->helper('url');
		}

		public function getcity()
 		{
 			$this->load->model('Fetchstate');
			$stateid=$_POST['stateid'];
			echo json_encode($this->Fetchstate->getcity($stateid));
 	 		
 		}

	 	public function home()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('home');
			$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}


 									// **********************************************


	    				// ========================   START TEACHER SECTION =======================



 		public function addbranch()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
			$this->load->model('Fetchstate');			
			$data['state'] = $this->Fetchstate->getstate()->result();
	 		$this->load->view('add_branch',$data);	 		
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}

 		public function add_branch_data(){
 			$data=array(
 				'reg_date'=>$this->input->post('date'),
 				'branch_user_name'=>$this->input->post('user_name'),
 				'password'=>$this->input->post('password'),
 				'branch_name'=>$this->input->post('branch_name'),
 				'branch_add'=>$this->input->post('branch_add'),
 				'pincode'=>$this->input->post('pincode'),
 				'state'=>$this->input->post('state'),
 				'city'=>$this->input->post('city'),
 				'status'=>1
 			);
 			//print_r($data);
 			$this->load->model('Crud');
 			$this->Crud->add_branch($data); 			
 			echo "ok";
 		}

 		public function listbranch()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');	
			$this->load->model('Fetchstate');			
			$data['state'] = $this->Fetchstate->getstate()->result();
	 		$this->load->view('list_branch',$data);	 		
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}
 		
 		public function getbranchlist()
 		{
 	 		$this->load->model('crud');
 	 		$data=$this->crud->getbranch_list();
 	 		echo json_encode($data);
 	 	}				

 	 	function fetchmodal()
 	 	{
 	 		$id=$this->input->post('id');
 	 		print($id);
 	 		$this->load->model('crud');
 	 		$data=$this->crud->branch_modal($id);
 	 		echo json_encode($data);
 	 	}

 	 	function update_branch()
 	 	{
 	 		$data=array(
 	 			'id'=>$this->input->post('id'),
 				'reg_date'=>$this->input->post('date'),
 				'branch_user_name'=>$this->input->post('user_name'),
 				'branch_name'=>$this->input->post('branch_name'),
 				'branch_add'=>$this->input->post('branch_add'),
 				'pincode'=>$this->input->post('pincode'),
 				'state'=>$this->input->post('state'),
 				'city'=>$this->input->post('city'),
 				'status'=>$this->input->post('status')

 			);
 			$this->load->model('crud');
 			$this->crud->updatebranch($data); 			
 			echo "ok";
 	 	}


	    function delete_branch(){
	    	$this->load->model('crud');
	        $data=$this->crud->deletebranch();
	        echo json_encode($data);
	    }


	    			// ========================   END BRANCH SECTION =======================

	    							// **********************************************


	    			// ========================   START TEACHER SECTION =======================



 		public function addteacher()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
			$this->load->model('Fetchstate');			
			$data['state'] = $this->Fetchstate->getstate()->result();
	 		$this->load->view('add_teacher',$data);
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}
 		public function listteacher()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('list_teacher');
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}





					// ========================   END TEACHER SECTION =======================

	    							// **********************************************


	    			// ========================   START COURSE SECTION =======================




 		public function addcourse()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('add_course');
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}
 		public function listcourse()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('list_course');
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}

							// ========================   END COURSE SECTION =======================

				    							// **********************************************


				    			// ========================   START STUDENT SECTION =======================






		public function addstudent()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('add_student');
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		}
 		public function liststudent()
 		{
 			$this->load->view('include/top-header');
			$this->load->view('include/topbar');
			$this->load->view('include/sidebar');
 	 		$this->load->view('list_student');
 	 		$this->load->view('include/customizer');
			$this->load->view('include/footer');
 		} 	
 		

							// ========================   END STUDENT SECTION =======================

				    							// **********************************************


 		
 	}
 ?>

 