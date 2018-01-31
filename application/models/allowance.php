<?php

	class allowance extends CI_Model{

		public function create_allowance($allowanceData){
			$this->db->insert('allowance', $allowanceData);
		}

		public function getTransactionPerMember($id)
		{
			$this->db->select('*');
			$this->db->from('allowancetrackerview');
			$this->db->where('SC_no', $id);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function getTrackSC($SC_id){
			$this->db->select('*');
			$this->db->from('senior_citizens');
			$this->db->where('SC_ID', $SC_id);

			$sqlQry = $this->db->get();
			if($sqlQry->num_rows() > 0){
				return $sqlQry->result();
			}else{
				return false;
			}
		}

		public function checkDuplicate($SC_id,$allowance_no){
			$this->db->select('*');
			$this->db->from('allowancetrackerview');
			$this->db->where('SC_ID', $SC_id);
			$this->db->where('allowance_no', $allowance_no);

			$sqlQry = $this->db->get();
			if($sqlQry->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function update_allowance($id, $status){
			$this->db->where('allowance_no', $id);
			$this->db->set('allowance_status', $status);
			$this->db->update('allowance');
		}

		public function delete_allowance($id,$status){
			$this->db->where('allowance_no', $id);
			$this->db->set('allowance_status', $status);
			$this->db->update('allowance');
		}

		public function register_transaction($data){
			$this->db->insert('allowance_tracker', $data);
		}

		public function tracked_allowance(){
			$this->db->select('*');

			$sqlQry = $this->db->get('allowancetrackerview');
			return $sqlQry->result();
		}

	}

?>