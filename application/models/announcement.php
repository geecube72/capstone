<?php

	class announcement extends CI_model
	{
		public function announcement_list($success,$pending){
			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('status', $success);
			$this->db->or_where('status', $pending);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function get_announcement_info($id){
			$this->db->select('*');
			$this->db->where('announcement_no', $id);

			$sqlQry = $this->db->get('announcement');
			return $sqlQry->result();
		}

		public function ordered_announcements(){

			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('status', 'success');
			$this->db->ORDER_BY('send_date', 'DESC');
			$this->db->limit(3);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function pending_ordered_announcements(){

			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('status', 'pending');
			$this->db->ORDER_BY('send_date', 'DESC');
			$this->db->limit(3);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function success_announcements($status){
			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('status', $status);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function validate($id){
			$this->db->select('*');
			$this->db->where('announcement_no', $id);
			$sqlQry = $this->db->get('announcement');
			return $sqlQry->result();
		}

		public function post_announcement($id,$status){
			$this->db->where('announcement_no', $id);
			$this->db->set('status', $status);
			$this->db->update('announcement');
		}

		public function delete_announcement($id,$status){
			$this->db->where('announcement_no', $id);
			$this->db->set('status', $status);
			$this->db->update('announcement');
		}

		public function expired_announcements($status){
			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('status', $status);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function allowance_list($type,$status){
			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->where('type', $type);
			$this->db->where('status', $status);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function pending_notification_list($status){
			$this->db->select('*');
			$this->db->where('notification_status', $status);

			$sqlQry = $this->db->get('notificationview');
			return $sqlQry->result();
		}

		public function sent_notification_list($status){
			$this->db->select('*');
			$this->db->where('notification_status', $status);

			$sqlQry = $this->db->get('notificationview');
			return $sqlQry->result();
		}
		
		public function send_announcement($id){
			$this->db->select('*');
			$this->db->from('notifications');
			$this->db->where('notification_no', $id);


			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}

		public function update_announcement($id,$status){
			$this->db->where('notification_no', $id);
			$this->db->set('notification_status', $status);
			$this->db->update('notifications');
		}

		public function getNumbers($areaNumber,$status){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->join('senior_citizens','barangay.barangay_no = senior_citizens.barangay_no');
			$this->db->where('barangay.barangay_no', $areaNumber);
			$this->db->where('senior_citizens.status', $status);

			$sqlQry = $this->db->get();
			return $sqlQry->result();
		}
	}

?>