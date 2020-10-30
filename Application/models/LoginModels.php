<?php

	class LoginModels extends CI_Model
	{
		 function __construct()  
      	{  
         // Call the Model constructor  
         parent::__construct();  
     	 }


/*
/////
///////---------------------------Login Models---------------------------------------------
/////
*/
     	



     	 //this function insert users in the DB
     	public function insert($data)
		{
			$this->db->insert('users', $data);
		}



		//this function is used for user login verification
		public function verify_login($username,$password)
		{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('users');
			return $query->result_array();
		}
	}
?>

