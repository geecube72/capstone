<?php

	class employee extends CI_Model{

		public function login_employee($credentials,$password,$status){
			$this->db->select('first_name,address_barangay,user_id,email_address,username,user_type'); 
			$this->db->from('user_info');
			$this->db->where('user_type','employee');
			$this->db->where('emp_status', $status);
			$this->db->where('username',$credentials);	
			$this->db->where('password',$password);

			$qry = $this->db->get();	

			if($qry->num_rows() > 0)
			{
			
			return $qry->row(); 
			
			} else {
					return false;
			}
		}

		public function getEmployeeInfo($id){
			$this->db->select('*');
			$this->db->from('user_info');
			$this->db->where('user_type','employee');
			$this->db->where('user_id',$id);

			$query = $this->db->get();
			return $query->row();
		}
	
		public function check_username($username){
			$sqlQry = "SELECT username FROM user_info WHERE username = ?"; 

			$res = $this->db->query($sqlQry,$username);

			if($res->num_rows() > 0){
				return false;
			} else {
				return true;
			}
		}

		public function employee_list(){
			$sqlQry = $this->db->get('user_info');
			return $sqlQry->result();
		}

		public function view_specific_employee($id){
			$this->db->select('*');
			$this->db->from('user_info');
			$this->db->where('user_id', $id);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function edit_specific_employee($id, $firstname, $lastname, $mi, $street, $sitio, $barangay, $age, $contact, $email, $password){

			$this->db->query("UPDATE user_info SET first_name = '$firstname' , last_name = '$lastname' , mi = '$mi' , address_street = '$street' , address_sitio = '$sitio' , address_barangay = '$barangay' , age ='$age'  , contact_number = '$contact' , email_address = '$email' , password = '$password' WHERE user_id = '$id' ");
		}

	}
?>