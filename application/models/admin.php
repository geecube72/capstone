<?php

	class admin extends CI_Model{

		public function login_admin($credentials,$password,$status)
		{
			$this->db->select('first_name,address_barangay,user_id,email_address,username,user_type'); 
			$this->db->from('user_info');
			$this->db->where('user_type','admin');
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

		public function getAdminInfo($id)
		{
			$this->db->select('*');
			$this->db->from('user_info');
			$this->db->where('user_type','admin');
			$this->db->where('user_id',$id);

			$query = $this->db->get();
			return $query->row();
		}

		public function check_username($username)
		{
			$sqlQry = "SELECT username FROM user_info WHERE username = ?"; 

			$res = $this->db->query($sqlQry,$username);

			if($res->num_rows() > 0){
				return false;
			} else {
				return true;
			}
		}
		
		public function register_employee($data)
		{
			$this->db->insert('user_info',$this->db->escape_str($data));
		}

		public function remove_employee($id)
		{
			$this->db->where('user_id', $id);
			$this->db->set('emp_status', "inactive");
			$this->db->update('user_info');
		}

		public function create_announcement($data)
		{
			$ret = $this->db->insert('announcement', $data);

			return $this->db->insert_id();
		}

		public function create_notification($data)
		{
			$this->db->insert('notifications', $data);
		}

		public function validate_announcement($title, $barangay_no)
		{
			$this->db->select('title,bar_no');
			$this->db->from('notifications');
			$this->db->where('title', $title);
			$this->db->where('bar_no', $barangay_no);

			$sqlQry = $this->db->get();
			
			if($sqlQry->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		}

		public function view_specific_complain($id)
		{
			$this->db->select('*');
			$this->db->from('complaints');
			$this->db->join('senior_citizens', 'complaints.SC_no = senior_citizens.SC_no');
			$this->db->where('complaint_no', $id);

			$sqlQry = $this->db->get('');
			return $sqlQry->result();
		}

		public function verify_complaint($complaint,$id)
		{
			$this->db->where('complaint_no', $id);
			$this->db->set('complaint_type', $complaint);
			$this->db->set('complaint_status', 'verified');
			$this->db->update('complaints');
		}

		public function getComplaintsPerMember($id){
			$this->db->select('*');
			$this->db->from('complaints');
			$this->db->where('SC_no', $id);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}
	
	}
?>
