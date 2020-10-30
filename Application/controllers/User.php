<?php
class User extends CI_Controller
{




	public function __construct()
	{
		//CI default constructor call
		parent::__construct();

		//load model
		// $this->load->model('LoginModel');
		$this->load->model('UserModel');

		$this->load->library('email');
	}





/*
/////
///////-----------------Dashboard related controllers------------------------------------------
/////
*/

	//this function is used for dashboard operations
	public function dashboard()
	{

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
		    { 
		        redirect('login');
		        
		    }


		$data['pageTitle'] = 'Dashboard';

	

// -------------------Dashboard status Elements--------------------------------------	
		

		//show pending tasks in the dashboard
		$status     			     = "Pending";
		$userid = $this->session->userdata('id');
		$data['showStatusPending']   = $this->UserModel->statusCheck($status,$userid);

		//show On going tasks in the dashboard
		$status   			 	     = "On Going";
		$userid = $this->session->userdata('id');
		$data['showStatusOnGoing']   = $this->UserModel->statusCheck($status,$userid); 

		//show completed tasks in the dashboard
		$status                      = "Completed";
		$userid = $this->session->userdata('id');
		$data['showStatusCompleted'] = $this->UserModel->statusCheck($status,$userid);

		//shoe Delivered tasks in the dashboard
		$status 					 = "Delivered";
		$userid = $this->session->userdata('id');
		$data['showStatusDelivered'] = $this->UserModel->statusCheck($status,$userid);



// -------------------Dashboard Tags Elements--------------------------------------	

		//show urgrnt tasks in the dashboard
		$tags      					 = "Urgent";
		$userid = $this->session->userdata('id');
		$data['showTagUrgent']		 = $this->UserModel->tagsCheck($tags,$userid);	

		//show very important tasks in the dashboard
		$tags 						 = "Very Important";
		$userid = $this->session->userdata('id');
		$data['showTagVeryImportant']= $this->UserModel->tagsCheck($tags,$userid);

		//show important tasks in the dashboard
		$tags 						 = "Important";
		$userid = $this->session->userdata('id');		
		$data['showTagImportant']	 = $this->UserModel->tagsCheck($tags,$userid);

		//show ignorant tasks in the dashboard
		$tags  						 = "ignorant";
		$userid = $this->session->userdata('id');
		$data['showTagIgnorant']	 = $this->UserModel->tagsCheck($tags,$userid);



		$this->load->view('template/header',$data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');

	}

/*
/////
///////-----------------Login related controllers------------------------------------------
/////
*/


	
// //show login page
// 	public function index()
// 	{

// 		$this->load->view('login');
// 	}

// 	//show password reset page
// 	public function reset()
// 	{
// 		$this->load->view('reset');
// 	}

// 	//show registration page
// 	public function register()
// 	{
// 		$this->load->view('register');
// 	}

// 	//load session library
// 	public function insert()
// 	{
// 		//validation for user input in sign up form
// 		$this->form_validation->set_rules('fullname','Fullname','trim|required');
// 		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
// 		$this->form_validation->set_rules('address','Address','trim|required');
// 		$this->form_validation->set_rules('city','City','trim|required');
// 		$this->form_validation->set_rules('country','Country','trim|required');
// 		$this->form_validation->set_rules('username','Username','trim|required');
// 		$this->form_validation->set_rules('password','Password','trim|required');
// 		$this->form_validation->set_rules('rpassword','Re-Type Password','trim|required|matches[password]');
// 		if ($this->form_validation->run() == FALSE)
// 		{
// 			$this->load->view('register');
// 		}
// 		else
// 		{
// 			//insertng data into db
// 			$data['fullname'] = $this->input->post('fullname');
// 			$data['email'] = $this->input->post('email');
// 			$data['address'] = $this->input->post('address');
// 			$data['city'] = $this->input->post('city');
// 			$data['country'] = $this->input->post('country');
// 			$data['username'] = $this->input->post('username');
// 			$data['password'] = $this->input->post('password');
// 			$insert = $this->UserModel->insert($data);
// 			if($insert == FALSE)
// 			{
// 				echo "Registration Successful";
// 				// $data['message_display'] = 'Registration Successful';
// 				redirect('login');
// 			}
// 			else
// 			{
// 				echo "Something went wrong. Please try again";
// 				$this->load->view('register',$data);
// 			}
// 		}

// 	}
// 	public function login()
// 	{
// 		$this->form_validation->set_rules('username','Username','trim|required');
// 		$this->form_validation->set_rules('password','Password','trim|required');

// 		if($this->form_validation->run()==FALSE)
// 		{
// 			$this->load->view('login');
// 		}
// 		else
// 		{
// 			$username = $this->input->post('username');
// 			$password = $this->input->post('password');	
// 			$result   = $this->UserModel->verify_login($username, $password);
// 			if(!empty($result))
// 			{
// 				$newdata = array(
// 				        'username'  => $result[0]['username'],
// 				        'email'     => $result[0]['email'],
// 				        'id'     	=> $result[0]['id'],
// 				        'logged_in' => TRUE
// 				);
// 				$this->session->set_userdata($newdata);
// 				redirect('dashboard');
// 			}
// 			else
// 			{
// 				$this->session->set_flashdata('error_msg', 'No such User! Wrong username or password.');
// 				redirect('login');
				
// 			}
// 		}
// 	}
// 	public function logout()
// 	{

		
// 		$array_items = array('username', 'email', 'id', 'logged_in');
// 		$this->session->unset_userdata($array_items);
// 		$this->session->sess_destroy();
// 		redirect('login');
// 	}

/*
/////
///////-----------------Task related controllers------------------------------------------
/////
*/



	//this function loads the view files needed for adding task
	public function addTask()
	{

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
		    { 
		        redirect('login');
		    }


		
		
		$data['pageTitle'] = 'Add Task';
		$this->load->view('template/header',$data);
		$this->load->view('addtask');
		$this->load->view('template/footer');
	}



	//this function controls the files for viewing the list of tasks from DB
	public function viewTask()
	{
		

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
	    { 
	        redirect('login');
	    }
		


		$data['pageTitle'] = 'View Task';
		$this->load->model('UserModel');
		
		//fetch sesion data from db
		$userid = $this->session->userdata('id');
		$data['task_list'] = $this->UserModel->tasktable($userid);
		
		//load all the concern view files
		$data['pageTitle'] = 'View Task';
		$this->load->view('template/header',$data);
		$this->load->view('viewtask');
		$this->load->view('template/footer');
	}

	//this function is used to insert task in the DB
	public function insertTask()
	{
			$id = $this->session->userdata('id');
			$userinfo = $this->UserModel->userInfo($id);
			$email = $userinfo['email'];
			$value['created_by'] = $id;

			$value['task_title'] = $this->input->post('task_title');
			$value['task_desc']  = $this->input->post('task_desc');
			$value['duedate']    = $this->input->post('due_date');
			$value['status']     = $this->input->post('status');
			$value['tags']       = $this->input->post('tags');
			$insert = $this->UserModel->insertTask($value);
			echo 1;			
			$this->sendMail($email);
	}




/*
/////
///////----------------Visit related controllers-----------------------------------------
/////
*/




	//this function loads the view files needed for adding visit
	public function addVisit()
	{
		

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
	    { 
	        redirect('login');
	    }

		$data['pageTitle'] = 'Add visits';
		$this->load->view('template/header',$data);
		$this->load->view('addvisit');
		$this->load->view('template/footer');
	}



	//this function controls the files for viewing the list of visits from DB
	public function viewVisit()
	{
		

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
		    { 
		        redirect('login');
		    }


		//fetch sesion data from db
		$data['pageTitle']  = 'View visits';
		$this->load->model('UserModel');
		$userid = $this->session->userdata('id');
		$data['visit_list'] = $this->UserModel->visittable($userid);

		//load all the concern view files
		$data['pageTitle']  = 'View Visit';
		$this->load->view('template/header',$data);
		$this->load->view('viewvisit');
		$this->load->view('template/footer');
	}

	

	//this function is used to insert visit in the DB
	public function insertVisit()
	{	
			$qty['created_by']     = $this->session->userdata('id'); //for fetching session data 
			$qty['person']         = $this->input->post('person');
			$qty['purpose']        = $this->input->post('purpose');
			$qty['meeting_date']   = $this->input->post('date');
			$qty['location']       = $this->input->post('location');
			$insert = $this->UserModel->insertVisit($qty);
			echo 1;
			

	}

/*
/////
///////----------------Delete related controllers-----------------------------------------
/////
*/

	public function taskDelete()
	{
		
	   $this->UserModel->deleteTask($this->input->post("id"));
	   echo 1;

    }

    public function visitDelete()
    {
    	
    	$this->UserModel->deleteVisit($this->input->post("id"));
    	echo 1;
    }



/*
/////
///////----------------Task Update related controllers-----------------------------------------
/////
*/



    public function Taskedit()
    {
    	$data = $this->UserModel->editTask($this->input->post("id"));
    	echo json_encode($data);
    }


    public function Taskupdate()
	{
			$id = $this->input->post('id');	
			$value['created_by'] = $this->session->userdata('id');	
			$value['task_title'] = $this->input->post('task_title');
			$value['task_desc']  = $this->input->post('task_desc');
			$value['duedate']    = $this->input->post('due_date');
			$value['status']     = $this->input->post('status');
			$value['tags']       = $this->input->post('tags');
			$update = $this->UserModel->insertUpdatedTask($value,$id);
			echo 1;			
	}



/*
/////
///////----------------Task Update related controllers-----------------------------------------
/////
*/




	public function Visitedit()
    {
    	$data = $this->UserModel->editVisit($this->input->post("id"));
    	echo json_encode($data);
    }

    public function Visitupdate()
	{	
			$id = $this->input->post('id');	
			$qty['created_by']     = $this->session->userdata('id'); //for fetching session data 
			$qty['person']         = $this->input->post('person');
			$qty['purpose']        = $this->input->post('purpose');
			$qty['meeting_date']   = $this->input->post('date');
			$qty['location']       = $this->input->post('location');
			$update = $this->UserModel->insertUpdatedVisit($qty,$id);
			echo 1;
			

	}


/*
/////
///////---------------------------Email Controllers---------------------------------------------
/////
*/  

	public function profile()
		{

		//user allowed to view this page only if logged in
		if ( !$this->session->userdata('logged_in'))
		    { 
		        redirect('login');
		    }

		  $id = $this->session->userdata('id');
		$data['userinfo'] = $this->UserModel->userInfo($id);
		
		
		$data['pageTitle'] = 'User Profile';
		$this->load->view('template/header',$data); 
		$this->load->view('userprofile');
		$this->load->view('template/footer');
		}


 	public function sendMail($email)
		{
		   $config    = Array(
		  'protocol'  => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'kanwarkelide15@stu.utm.ac.in', 
		  'smtp_pass' => 'Jupiter@1996', 
		  'mailtype'  => 'html',
		  'charset'   => 'iso-8859-1',
		  'wordwrap'  => TRUE
		);

		      $message = '';
		      $this->load->library('email', $config);
		      $this->email->set_newline("\r\n");
		      $this->email->from('kanwarkelide15@stu.utm.ac.in'); 
		      $this->email->to($email);//
		      $this->email->subject('test email');
		      $this->email->message($message);
		      if($this->email->send())
		     {
		      echo 'Email sent.';
		     }
		     else
		    {
		     show_error($this->email->print_debugger());
    }

	}
	  public function Useredit()
    {
    	$data = $this->UserModel->editUser($this->input->post("id"));
    	echo json_encode($data);
    }
     public function Userupdate()
	{	

			$id = $this->input->post('id');	
			//$qty['created_by']     = $this->session->userdata('id'); //for fetching session data 
			$qty['fullname']         = $this->input->post('fullname');
			$qty['email']        = $this->input->post('email');
			$qty['address']   = $this->input->post('address');
			$qty['city']       = $this->input->post('city');
			$qty['country']       = $this->input->post('country');
			$qty['username']       = $this->input->post('username');
			$update = $this->UserModel->insertUpdatedUser($qty,$id);
			echo 1;
			
	}



}

	
