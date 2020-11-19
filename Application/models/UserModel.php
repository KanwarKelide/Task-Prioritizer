<?php

	class UserModel extends CI_Model
	{
		 function __construct()  
      	{  
         // Call the Model constructor  
        # parent::__construct();  
     	 }


/*
/////
///////---------------------------Login Models---------------------------------------------
/////
*/
     	



  //    	 //this function insert users in the DB
  //    	public function insert($data)
		// {
		// 	$this->db->insert('users', $data);
		// }



		// //this function is used for user login verification
		// public function verify_login($username,$password)
		// {
		// 	$this->db->where('username',$username);
		// 	$this->db->where('password',$password);
		// 	$query = $this->db->get('users');
		// 	return $query->result_array();
		// }



/*
/////
///////---------------------------Dashboard Models---------------------------------------------
/////
*/



		public function statusCheck($status,$userid)
		{
			$this->db->where('status',$status);
			$this->db->where('created_by',$userid);
			$stat = $this->db->get('tasks');
			//print_r($this->db->last_query());
			return $stat->num_rows();


		}

		public function userInfo($id)
		{
			$this->db->where('id',$id);
			$query=$this->db->get('users');
			return $query->row_array();
		}

		public function tagsCheck($tags,$userid)
		{
			$this->db->where('tags', $tags);
			$this->db->where('created_by',$userid);
			$tag = $this->db->get('tasks');
			//print_r($this->db->last_query());
			return $tag->num_rows();
		}







/*
/////
///////---------------------------Task Models---------------------------------------------
/////
*/




     	 //this function inserts task in the DB
		public function insertTask($value)
		{
		$this->db->insert('tasks', $value);
		}

		

		//this function shows all the tasks stored in the DB
		public function tasktable($id)
		{
			$this->db->where('created_by',$id);
			$query = $this->db->get('tasks');
			return $query->result_array();
		}



/*
/////
///////---------------------------Visit Models---------------------------------------------
/////
*/




		//this function is used to insert visit records in the DB
		public function insertVisit($qty)
		{
		$this->db->insert('visits',$qty);
		}



		//this function shows the visits added in the DB
		public function visittable($id)
		{
			$this->db->where('created_by',$id);
			$query = $this->db->get('visits');
			return $query->result_array();
		}


/*
/////
///////---------------------------Delete Models---------------------------------------------
/////
*/

		
		public function deleteTask($id)
   		{
        	$this->db->where('id', $id);
        	return $this->db->delete('tasks');
    	}


    	public function deleteVisit($id)
    	{
    		$this->db->where('id', $id);
    	    return $this->db->delete('visits');
    	}


 
 /*
/////
///////---------------------------Update Task Models---------------------------------------------
/////
*/
 		public function editTask($id)
 		{
 			$this->db->where('id', $id);
			$query = $this->db->get('tasks');

			return $query->result_array();

 		}


 		public function insertUpdatedTask($value,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('tasks', $value);
		}

 /*
/////
///////---------------------------Update Visit Models---------------------------------------------
/////
*/

		public function editVisit($id)
 		{
 			$this->db->where('id', $id);
			$query = $this->db->get('visits');

			return $query->result_array();

 		}

 		public function insertUpdatedVisit($qty,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('visits', $qty);
		}

		




		// public function userProfile($id)
 	// 	{
 	// 		$this->db->where('id', $id);
		// 	$query = $this->db->get('users');

		// 	return $query->result_array();

 	// 	}
		public function editUser($id)
 		{
 			$this->db->where('id', $id);
			$query = $this->db->get('tasks');

			return $query->result_array();

 		}
 		public function insertUpdatedUser($value,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}


 		


	}


?>
