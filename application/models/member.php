<?php

	class member extends CI_model
	{

		public function login_member($memberID)
		{
			$this->db->select('SC_no');
			$this->db->from('senior_citizens');
			$this->db->where('SC_ID', $memberID);
			$this->db->where('status', 'alive');

			$sqlQry = $this->db->get();	

			if($sqlQry->num_rows() > 0)
			{
			
				return $sqlQry->row(); 
			
			} else {
				return false;
			}
		}
 
		public function getMemberInfo($id)
		{
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->where('status', 'alive');
			$this->db->where('SC_no',$id);

			$sqlQry = $this->db->get();
			return $sqlQry->row();
		}

		public function register_member($data){
			$this->db->insert('senior_citizens', $data);
		}

		public function member_list($status){
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->join('barangay','senior_citizens.barangay_no = barangay.barangay_no');
			$this->db->where('senior_citizens.status', $status);
			$this->db->ORDER_BY('senior_citizens.first_name', 'ASC');

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function dead_members($status){
			$this->db->select('*');
			$this->db->where('status', $status);
			$sqlQry = $this->db->get('senior_citizens');
			return $sqlQry->result();
		}

		public function view_specific_SC($barangay_id,$sc_id){
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->join('barangay', 'senior_citizens.barangay_no = barangay.barangay_no');
			$this->db->where('barangay.barangay_no', $barangay_id);
			$this->db->where('senior_citizens.SC_no', $sc_id);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function validate($id){
			$this->db->select('*');
			$this->db->where('SC_no', $id);
			$sqlQry = $this->db->get('senior_citizens');
			return $sqlQry->result();
		}

		public function view_SC_modal($id){
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->where('SC_no', $id);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function update_SC_ID($id,$ID){
			$this->db->where('SC_no', $id);
			$this->db->set('SC_ID', $ID);
			$this->db->update('senior_citizens');
		}

		public function remove_SC($id,$status,$dod){
			$this->db->where('SC_no', $id);
			$this->db->set('status', $status);
			$this->db->set('date_of_death', $dod);
			$this->db->update('senior_citizens');
		}

		public function complaints_list(){
			$this->db->select('*');
			$this->db->from('complaints');
			$this->db->join('senior_citizens','complaints.SC_no = senior_citizens.SC_no','left');
			$this->db->where('complaints.complaint_status', 'unverified');

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function verified_complaints_list(){
			$this->db->select('*');
			$this->db->from('complaints');
			$this->db->join('senior_citizens','complaints.SC_no = senior_citizens.SC_no','left');
			$this->db->where('complaints.complaint_status', 'verified');

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function listForBarangay($status){
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->where('status', $status);
			$num_rows = $this->db->count_all_results();
			return $num_rows;
		}
 
		public function register_complain($data){
			$this->db->insert('complaints', $data);
		}

		

	}
?>