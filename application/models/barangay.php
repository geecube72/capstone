<?php
	
	class barangay extends CI_Model
	{

		public function register_barangay($data){
			$this->db->insert('barangay', $data);
		}

		public function check_name($barangayName){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->where('name', $barangayName);

			$query = $this->db->get();
			return $query->result();
		}

		public function barangay_list(){
			$this->db->select("*");
			$this->db->from("barangay");

			$query = $this->db->get();
			return $query->result();
		}

		public function location($id){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->where('barangay_no', $id);

			$query = $this->db->get();
			return $query->result();
		}

		public function check_barangay($id, $status){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->join('senior_citizens', 'barangay.barangay_no = senior_citizens.barangay_no');
			$this->db->where('barangay.barangay_no', $id);
			$this->db->where('senior_citizens.status', $status);

			$query = $this->db->get();
			return $query->result();
		}

		public function remove_barangay($id){
			$this->db->where('barangay_no', $id);
			$this->db->delete('barangay');
		}


		public function count_per_barangay($id,$status){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->join('senior_citizens', 'barangay.barangay_no = senior_citizens.barangay_no');
			$this->db->where('barangay.barangay_no', $id);
			$this->db->where('senior_citizens.status', $status);

			$num_rows = $this->db->count_all_results();
			return $num_rows;
		}

		public function list_per_barangay($id,$status){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->join('senior_citizens', 'barangay.barangay_no = senior_citizens.barangay_no');
			$this->db->where('barangay.barangay_no', $id);
			$this->db->where('senior_citizens.status', $status);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}
	}
?>