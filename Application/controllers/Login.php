<?php
class Login extends CI_Controller
{




	public function __construct()
	{
		//CI default constructor call
		parent::__construct();

		//load model
		// $this->load->model('LoginModel');
		$this->load->model('LoginModels');
	}

/*
/////
///////-----------------Login related controllers------------------------------------------
/////
*/


	
//show login page
	public function index()
	{
		

		$this->load->view('login');
	}

	//show password reset page
	public function reset()
	{
		$this->load->view('reset');
	}

	//show registration page
	public function register()
	{
		$this->load->view('register');
	}

	//load session library
	public function insert()
	{
		//validation for user input in sign up form
		$this->form_validation->set_rules('fullname','Fullname','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		$this->form_validation->set_rules('country','Country','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('rpassword','Re-Type Password','trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			//insertng data into db
			$data['fullname'] = $this->input->post('fullname');
			$data['email'] = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['city'] = $this->input->post('city');
			$data['country'] = $this->input->post('country');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$insert = $this->LoginModels->insert($data);
			if($insert == FALSE)
			{
				echo "Registration Successful";
				// $data['message_display'] = 'Registration Successful';
				redirect('login');
			}
			else
			{
				echo "Something went wrong. Please try again";
				$this->load->view('register',$data);
			}
		}

	}
	public function login()


	{
		if(isset($_SESSION['username'])){
    	redirect('dashboard');
	}

		
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');	
			$result   = $this->LoginModels->verify_login($username, $password);
			if(!empty($result))
			{
				$newdata = array(
				        'username'  => $result[0]['username'],
				        'email'     => $result[0]['email'],
				        'id'     	=> $result[0]['id'],
				        'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('error_msg', 'No such User! Wrong username or password.');
				redirect('login');
				
			}
		}
	}
	public function logout()
	{

		

		
		$array_items = array('username', 'email', 'id', 'logged_in');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>
