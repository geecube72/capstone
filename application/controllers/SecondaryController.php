<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class SecondaryController extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('admin');
			$this->load->model('barangay');
			$this->load->model('member');
			$this->load->model('employee');
			$this->load->model('announcement');
			$this->load->model('allowance');
			$this->load->model('reports_model');
		}

		public function checkMemberLogIn()
		{
			$this->output->set_content_type("json");

			$this->form_validation->set_rules('SC_ID', 'Senior Citizen ID', 'required|numeric');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{
				$memberID = $this->input->post('SC_ID');

				if($member_credentials = $this->member->login_member($memberID)){
					$memberdata = array('id' => $member_credentials->SC_no, 'logged_in'=>TRUE);
					$this->session->set_userdata($memberdata);
					$this->output->set_output(json_encode(['result' => true]));
				}
				else{
					$this->output->set_output(json_encode(['result' => "error"]));
				}
			}
		}

		public function checkLogIn()
		{
			$this->output->set_content_type("json");

			$this->form_validation->set_rules('username','username','required|strtolower', TRUE);
			$this->form_validation->set_rules('password','password','required',TRUE);

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{
				$username = $this->input->post('username'); 
				$password = md5($this->input->post('password'));
				$status = "active"; 
				
				if($employee_credentials = $this->employee->login_employee($username,$password,$status)){
					$employeedata = array('id'=>$employee_credentials->user_id, 'user_type' => 'employee' , 'logged_in'=>TRUE);
					$this->session->set_userdata($employeedata);
					$this->output->set_output(json_encode(['result' => true, 'user' => 'employee']));
				}
				else if($admin_credentials = $this->admin->login_admin($username,$password,$status)){
					$admindata = array('id'=>$admin_credentials->user_id, 'user_type' => 'admin', 'logged_in'=>TRUE);
					$this->session->set_userdata($admindata);
					$this->output->set_output(json_encode(['result' => true, 'user' => 'admin']));
				}else{
					$this->output->set_output(json_encode(['result' => 'error']));
				}
			}
		}

		public function logOut()
		{
			$this->output->set_content_type("json");

			$data = $this->session->sess_destroy();
			$this->output->set_output(json_encode($data));
		}

		public function registerEmployee()
		{
			$this->output->set_content_type('json');
			
			$this->form_validation->set_rules('emp_firstname','First Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('emp_lastname','Last Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('emp_middle','Middle Name', 'trim|required|alpha|max_length[2]');
			$this->form_validation->set_rules('emp_street','Street', 'trim|required');
			$this->form_validation->set_rules('emp_sitio','Sitio', 'trim|required');
			$this->form_validation->set_rules('emp_barangay','Barangay', 'trim|required');
			$this->form_validation->set_rules('emp_birthday','Birthday', 'trim|required');
			$this->form_validation->set_rules('emp_age','Age', 'trim|required|numeric|is_natural');
			$this->form_validation->set_rules('emp_contact_number','Contact Number', 'trim|required|is_natural|exact_length[11]');
			$this->form_validation->set_rules('emp_email','E-mail Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('emp_usertype','User Type', 'trim|required');
			

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{

				$this->load->helper(array('form','url','file'));

				//for profile_photo start
				$config3['upload_path'] = './assets/images/employee/profile_photo';
				$config3['allowed_types'] = 'gif|jpg|png';
				$config3['encrypt_name'] = true;

				$this->upload->initialize($config3);

				if(! $this->upload->do_upload('emp_profilephoto'))
				{
					$this->output->set_output(json_encode([
						'result' => 'err',
						'errors' => $this->upload->display_errors()
					]));
				}
				else
				{
					$file_data3 = $this->upload->data();
				
				//profile_photo end

				//for signature_photo start				
				$config2['upload_path'] = './assets/images/employee/signature_photo/';
				$config2['allowed_types'] = 'gif|jpg|png';
				$config2['encrypt_name'] = true;
				
				$this->upload->initialize($config2);

				if(! $this->upload->do_upload('emp_signaturephoto'))
				{
					$this->output->set_output(json_encode([
						'result' => 'err',
						'errors' => $this->upload->display_errors()
					]));
				}
				else
				{
					$file2_data = $this->upload->data();
				
				// signature_photo end


					$firstname = $this->input->post('emp_firstname');
					$trim = str_replace(' ','',$firstname);
					$get = substr($trim,'0','2');
					$lastname = $this->input->post('emp_lastname');
					$trimmed = str_replace(' ','',$lastname);

					$emp_status = "active";
					
					$username = $trimmed.$get;
					$password = '12345';

					$data = array(

							'first_name' => ucfirst($firstname),
							'last_name' => ucfirst($lastname),
							'mi' => ucfirst($this->input->post('emp_middle')),
							'address_street' => ucfirst($this->input->post('emp_street')),
							'address_sitio' => ucfirst($this->input->post('emp_sitio')),
							'address_barangay' => ucfirst($this->input->post('emp_barangay')),
							'birthday' => $this->input->post('emp_birthday'),
							'age' => $this->input->post('emp_age'),
							'contact_number' => $this->input->post('emp_contact_number'),
							'email_address' => $this->input->post('emp_email'),
							'emp_status' => $emp_status,
							'username' => $username,
							'password' => md5($password),
							'user_type' => $this->input->post('emp_usertype'),
							'profile_photo' => $file_data3['file_name'],
							'signature_photo' => $file2_data['file_name']

					);

					$this->admin->register_employee($data);

					$this->output->set_output(json_encode(['result' => true]));
				}
				}
			}
		}

		public function viewSpecificEmployee()
		{
			$this->output->set_content_type('json');

			$id = $_POST['id'];

			$emp_data = $this->employee->view_specific_employee($id);

			$this->output->set_output(json_encode($emp_data));
		}

		public function updateEmployeeInfo()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('middle', 'Middle Initial', 'trim|required|alpha|max_length[2]');
			$this->form_validation->set_rules('street', 'Street', 'trim|required');
			$this->form_validation->set_rules('sitio', 'Sitio', 'trim|required');
			$this->form_validation->set_rules('barangay', 'Barangay', 'trim|required');
			$this->form_validation->set_rules('age', 'Age', 'trim|required|numeric|max_length[3]');
			$this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required|is_natural|exact_length[11]');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));

			}else{

			$id = $this->input->post('user_id');
			$firstname = ucfirst($this->input->post('firstname'));
			$lastname = ucfirst($this->input->post('lastname'));
			$mi = ucfirst($this->input->post('middle'));
			$street = ucfirst($this->input->post('street'));
			$sitio = ucfirst($this->input->post('sitio'));
			$barangay = ucfirst($this->input->post('barangay'));
			$age = $this->input->post('age');
			$contact = $this->input->post('contact_number');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$this->employee->edit_specific_employee($id,$firstname,$lastname,$mi,$street,$sitio,$barangay,$age,$contact,$email,$password);

			$this->output->set_output(json_encode(['result' => true]));
			}

		}

		public function removeEmployee()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];

			$data = $this->admin->remove_employee($id);
			$this->output->set_output(json_encode($data));
		}

		public function registerSC() 
		{	
			$this->employee = $this->employee->getEmployeeInfo($this->session->userdata('id'));
			$this->admin = $this->admin->getAdminInfo($this->session->userdata('id'));

			$this->output->set_content_type('json');		

			$this->form_validation->set_rules('SC_firstname', 'Firstname', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('SC_lastname', 'Lastname', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('SC_mi','Middle Initial', 'trim|required|alpha|max_length[2]');
			$this->form_validation->set_rules('SC_street','Street', 'trim|required');
			$this->form_validation->set_rules('SC_sitio','Sitio', 'trim|required');
			$this->form_validation->set_rules('SC_barangay','Barangay', 'trim|required');
			$this->form_validation->set_rules('SC_religion','Religion', 'trim|required');
			$this->form_validation->set_rules('SC_contact_number','Contact Number', 'trim|required|is_natural|exact_length[11]');
			$this->form_validation->set_rules('SC_rel_status','Civil Status', 'trim|required');
			$this->form_validation->set_rules('SC_gender', 'Gender', 'trim|required');
			$this->form_validation->set_rules('SC_birthday','Birthday', 'trim|required');
			$this->form_validation->set_rules('SC_age','Age', 'trim');
			$this->form_validation->set_rules('SC_birthplace','Place of Birth', 'trim');
			$this->form_validation->set_rules('SC_highest_educ_attained','Attainment', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}

			else
			{

				$this->load->helper(array('form','url','file'));

				//for member_ID_photo start
				$config['upload_path'] = './assets/images/member/member_id_photo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = true;

				$this->upload->initialize($config);

				if(!$this->upload->do_upload('SC_id_photo'))
				{
					$this->output->set_output(json_encode([
						'result' => 'err'
					]));
				}
				else
				{
					$file_data = $this->upload->data();

				$config1['upload_path'] = './assets/images/member/member_photo/';
				$config1['allowed_types'] = 'gif|jpg|png';
				$config1['encrypt_name'] = true;

				$this->upload->initialize($config1);

				if(! $this->upload->do_upload('SC_member_photo'))
				{
					$this->output->set_output(json_encode([
						'result' => 'err'
					]));
				}
				else
				{
					$file_data2 = $this->upload->data();

				$config2['upload_path'] = './assets/images/member/signature_photo/';
				$config2['allowed_types'] = 'gif|jpg|png';
				$config2['encrypt_name'] = true;

				$this->upload->initialize($config2);

				if (! $this->upload->do_upload('SC_signature_photo'))
				{
					$this->output->set_output(json_encode([
						'result' => 'err'
					]));
					
				}
				else
				{
					$file_data3 = $this->upload->data();
				
					$sc_id = "not yet generated";
					$status = "alive";
					$number = $this->input->post('SC_contact_number');
					$newNum = preg_replace('/0/',"63",$number,1);
					
					$data = array(
						
						'date_registered' => $this->input->post('SC_date_registered'),
						'SC_ID' => $sc_id,
						'first_name' => ucfirst($this->input->post('SC_firstname')),
						'last_name' => ucfirst($this->input->post('SC_lastname')),
						'middle_name' => ucfirst($this->input->post('SC_mi')),
						'address_street' => ucfirst($this->input->post('SC_street')),
						'address_sitio' => ucfirst($this->input->post('SC_sitio')),
						'barangay_no' => $this->input->post('SC_barangay'),
						'religion' => $this->input->post('SC_religion'),
						'rel_status' => $this->input->post('SC_rel_status'),
						'gender' => $this->input->post('SC_gender'),
						'date_of_birth' => $this->input->post('SC_birthday'),
						'age' => $this->input->post('SC_age'),
						'place_of_birth' => $this->input->post('SC_birthplace'),
						'highest_educ_attained' => $this->input->post('SC_highest_educ_attained'),
						'contact_number' => $newNum,
						'status' => $status,
						'SC_ID_image' => $file_data['file_name'],
						'SC_image' => $file_data2['file_name'],
						'SC_signature_image' => $file_data3['file_name']

					);

						$this->member->register_member($data);

						$this->output->set_output(json_encode(['result' => true]));	
						
				}
				}
				}						
			
			}
		}

		public function viewSpecificSC()
		{	
			$this->output->set_content_type('json');
			
			$barangay_id = $_POST['barangay_id'];
			$sc_id = $_POST['sc_id'];

			$data = $this->member->view_specific_SC($barangay_id,$sc_id);

			$this->output->set_output(json_encode($data));
		}

		public function generateID()
		{
			$this->output->set_content_type('json');
			$value = 'not yet generated';
			$id = $_POST['id'];
			$validation = $this->member->validate($id);

			foreach($validation as $data)
			{
				if($data->SC_ID == $value)
				{

					$add = $_POST['add'];
					$date1 = $_POST['date'];
					$date = str_replace('-','',$date1);

					$combine = $id . $date . $add;

					$this->output->set_output(json_encode(['result' => true, 'number' => $data->contact_number, 'name' => $data->first_name, 'id' => $id, 'data' => $combine]));
				}
				else
				{
					$this->output->set_output(json_encode(['result' => false]));
				}
			}
		}

		public function sendGeneratedID_CHIKKA()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$name = $_POST['name'];
			$ID = $_POST['message'];

			$number = $_POST['number'];	
			$message = "Good day!"." ".$name.","." "."Your New generated ID that will serve as your identification in OSCA is: ".$ID.".";

			$result = $this->CHIKKAsendSMS($number,$message);

			if($result == NULL){
				$this->output->set_output(json_encode(['result' => false]));
			}
			else{
				$this->member->update_SC_ID($id,$ID);
				$this->output->set_output(json_encode(['result' => "res", 'error' => $result]));
			}
		}

		public function sendGeneratedID_itexmo()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$name = $_POST['name'];
			$ID = $_POST['message'];

			$number = $_POST['number'];
			$newNum = preg_replace('/63/',"0",$number,2);	
			$message = "Good day"."".$name."."." "."Your New generated ID that will serve as your identification in OSCA is: ".$ID.".";
			$api_code = 'TR-JIMSV868490_3N4B9';

			$result = $this->itexmo($newNum,$message,$api_code);

			if ($result == ""){
				$this->output->set_output(json_encode(['result' => false]));
			}else if ($result == 0){
				$this->member->update_SC_ID($id,$ID);
				$this->output->set_output(json_encode(['result' => true]));
			}
			else{	
				$this->output->set_output(json_encode(['result' => "err", 'error' => $result]));
			}
		}

		public function removeSC()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$status = 'dead';
			$dod = date('Y-m-d');

			$data = $this->member->remove_SC($id,$status,$dod);

			$this->output->set_output(json_encode($data));
		}

		public function createAnnouncement()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('post_date','Post Date','trim|required');
			$this->form_validation->set_rules('announcement_type','Type','trim|required');
			$this->form_validation->set_rules('title','Title','trim|required');
			$this->form_validation->set_rules('announcement_message','Message','trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}
			else {
				$status = 'pending';
				$allowance = 'allowance';
				$type = $this->input->post('announcement_type');

				if($type != $allowance){
					$data = array(
						'title' => $this->input->post('title'),
						'send_date' => $this->input->post('post_date'),
						'type' => $type,
						'date_created' => $this->input->post('date_created'),
						'message' => $this->input->post('announcement_message'),
						'status' => $status
					);
					$this->admin->create_announcement($data);
					$this->output->set_output(json_encode(['result' => true]));
				}else{
					$data = array(
						'title' => $this->input->post('title'),
						'send_date' => $this->input->post('post_date'),
						'type' => $type,
						'date_created' => $this->input->post('date_created'),
						'message' => $this->input->post('announcement_message'),
						'status' => $status
					);

					$returnID = $this->admin->create_announcement($data);

					$allowanceData = array(
						'allowance_no' => $returnID,
						'name' => $this->input->post('title'),
						'description' => $this->input->post('announcement_message'),
						'allowance_status' => $status
					);

					$this->allowance->create_allowance($allowanceData);
					$this->output->set_output(json_encode(['result' => true]));
				}
			}
		}

		public function postAnnouncement()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$status = 'success';
			$validation = $this->announcement->validate($id);

			foreach($validation as $data)
			{	
				if($data->status == $status){
					$this->output->set_output(json_encode(['result' => false]));
				}
				else{
				$this->allowance->update_allowance($id,$status);
				$this->announcement->post_announcement($id,$status);
				$this->output->set_output(json_encode(['result' => true]));
				}	
			}
		}

		public function deletePost()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$status = 'expired';

			$this->allowance->delete_allowance($id,$status);
			$this->announcement->delete_announcement($id,$status);

			$this->output->set_output(json_encode(['result' => true]));
		}

		public function getAnnouncementInfo()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];

			$data = $this->announcement->get_announcement_info($id);
			$this->output->set_output(json_encode($data));
		}

		public function createNotification()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('submit_date','Submit Date','trim|required');
			$this->form_validation->set_rules('type','Type','trim|required');
			$this->form_validation->set_rules('title','Title','trim|required');
			$this->form_validation->set_rules('notifbarangay','Barangay','trim|required');
			$this->form_validation->set_rules('notifmessage','Message','trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => "error",
					'errors' => array_values($this->form_validation->error_array())
				]));
			}

			else{

				$title = ucfirst($this->input->post('title'));
				$barangay_no = $this->input->post('notifbarangay');
				$validate = $this->admin->validate_announcement($title, $barangay_no);

				$status = 'pending';
			
				if($validate == false){
					$this->output->set_output(json_encode(['result' => false]));
				}
				else{

					$data = array(
						'title' => $title,
						'send_date' => $this->input->post('submit_date'),
						'type' => $this->input->post('type'),
						'date_created' => $this->input->post('date_created'),
						'bar_no' => $barangay_no,
						'notification_status' => $status,
						'message' => $this->input->post('notifmessage')
					);

					$this->admin->create_notification($data);

					$this->output->set_output(json_encode(['result' => true]));
				}
			}		
		}

		public function viewSpecificAnnouncement()
		{
			$this->output->set_content_type('json');

			$id = $_POST['id'];
			$data = $this->announcement->send_announcement($id);

			$this->output->set_output(json_encode($data));
		}

		public function updateAnnouncement()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$status = 'success';
			
			$data = $this->announcement->update_announcement($id,$status);
			$this->output->set_output(json_encode($data));
		}

		public function viewMessageModal(){

			$this->output->set_content_type('json');
			
			$id = $_POST['id'];

			$data = $this->member->view_SC_modal($id);

			$this->output->set_output(json_encode($data));

		}

		//FOR SMS API

			//CHIKKA SMS API START
		public function generateString(){
			$str = '';

			for($i = 0; $i < 32; $i++){
				$str .= mt_rand(0,9);
			}

			return $str;
		}

		public function CHIKKAsendSMS($number,$message)
		{
			$generatedID = $this->generateString();

			$arr_post_body = array(
				"message_type" => "SEND",
				"mobile_number" => $number,
				"shortcode" => "2929021195",
				"message_id" => $generatedID,
				"message" => urlencode($message),
				"client_id" => "7887af99997adcbee8bca23ba52a3b773c13f45fb06fc7dd7d15ec350576f727",
				"secret_key" => "ce4b1854a2c2b98ef6c4d20ca9ff66599a94b116c6da9d717cd546caab5782d8"
			);

			$query_string = "";
			foreach($arr_post_body as $key => $frow)
			{
				$query_string .= '&' .$key. '=' . $frow;
			}

			$URL = "https://post.chikka.com/smsapi/request";

			$curl_handler = curl_init();
			curl_setopt($curl_handler, CURLOPT_URL, $URL);
			curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
			curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
			curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
			return curl_exec($curl_handler);
			curl_close($curl_handler);

			exit(0);

		}

		public function sendSMS_CHIKKA()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('message', 'Message', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}

			else{

				$number = $this->input->post('contact_number');	
				$message = $this->input->post('message');

				$result = $this->CHIKKAsendSMS($number,$message);

				if($result == NULL){
					$this->output->set_output(json_encode(['result' => "err"]));
				}
				else{
					$this->output->set_output(json_encode(['result' => "res", 'error' => $result]));
				}
				
			}
		}

		public function sendGroupSMS_CHIKKA()
		{
			$this->output->set_content_type('json');

			$number = array();

			$areaNumber = $this->input->post('barangay_number');
			$status = 'alive';

			$holder = $this->announcement->getNumbers($areaNumber,$status);

			foreach($holder as $row){
				$number[] = $row->contact_number;				

				/*$contacts = implode(",",$number);*/				 	
			}
				$count = count($number);
			for($i = 0; $i < $count; $i++){

				$message = $this->input->post('message');
				$result = $this->CHIKKAsendSMS($number[$i],$message);
			}

			if($result == NULL){
				$this->output->set_output(json_encode(['result' => false]));
			}
			else{
				$this->output->set_output(json_encode(['result' => "res", 'error' => $result]));
			}
			 		
		}
			//CHIKKA SMS API END

			//ITEXTMO SMS API START
		public function itexmo($number,$message,$apicode){
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
		}

		public function sendSMS_itexmo(){
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('message', 'Message', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{

				$number = $this->input->post('contact_number');
				$newNum = preg_replace('/63/',"0",$number,2);	
				$message = $this->input->post('message');
				$api_code = 'TR-JIMSV868490_3N4B9';

				$result = $this->itexmo($newNum,$message,$api_code);
				if ($result == ""){
					$this->output->set_output(json_encode(['result' => "none"]));
				}else if ($result == 0){
					$this->output->set_output(json_encode(['result' => true]));
				}
				else{	
					$this->output->set_output(json_encode(['result' => "err", 'error' => $result]));
				}
			}
		}

		public function sendGroupSMS_itexmo(){
			$this->output->set_content_type('json');

			$number = array();

			$areaNumber = $this->input->post('barangay_number');
			$status = 'alive';

			$holder = $this->announcement->getNumbers($areaNumber,$status);

			foreach($holder as $row){
				$number[] = $row->contact_number;
				$newNum = preg_replace('/63/',"0",$number,2);						 	
			}
				$count = count($newNum);
			for($i = 0; $i < $count; $i++){

				$message = $this->input->post('message');
				$api_code = 'TR-JIMSV868490_3N4B9';

				$result = $this->itexmo($newNum[$i],$message,$api_code);
			}

			if ($result == ""){
				$this->output->set_output(json_encode(['result' => false]));
			}else if ($result == 0){
				$this->output->set_output(json_encode(['result' => true]));
			}
			else{	
				$this->output->set_output(json_encode(['result' => "err", 'error' => $result]));
			} 		
		}
			//ITEXMO SMS API END

		public function submitComplain()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('complain_message', 'message', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{

			$data = array(
				'date' => $this->input->post('date_created'),
				'message' => $this->input->post('complain_message'),
				'complaint_status' => 'unverified',
				'SC_no' => $this->session->userdata('id'),
				'complaint_type' => "unverified"
			);

				$this->member->register_complain($data);
				$this->output->set_output(json_encode(['result' => true]));
			}
		}

		public function viewSpecificComplain()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];

			$data = $this->admin->view_specific_complain($id);
			$this->output->set_output(json_encode($data));
		}

		public function verifyComplaint()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('complaint_type', 'Complaint Type', 'trim|required');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}else{

				$id = $this->input->post('verify_complain_no');
				$complaint = $this->input->post('complaint_type');
				$this->admin->verify_complaint($complaint,$id);

				$this->output->set_output(json_encode(['result' => true]));
			}
		}

		public function registerBarangay()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('barangayname', 'Barangay Name', 'trim|required');
			$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|numeric');
			$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|numeric');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}

			else
			{
				$barangayName = ucfirst($this->input->post('barangayname'));
				$name = $this->barangay->check_name($barangayName);
				if($name){
					$this->output->set_output(json_encode(['result' => 'error']));
				}
				else{
				$data = array(
					'name' => $barangayName,
					'longitude' => $this->input->post('longitude'),
					'latitude' => $this->input->post('latitude')
				);

				$this->barangay->register_barangay($data);
					
				$this->output->set_output(json_encode(['result' => true]));
				}
			}
		}

		public function checkBarangay()
		{
			$this->output->set_output('json');

			$id = $_POST['id'];
			$status = 'alive';

			if($this->barangay->check_barangay($id, $status))
			{
				$this->output->set_output(json_encode(['result' => true]));
			}else{
				$this->output->set_output(json_encode(['result' => false]));
			}
		}

		public function barangayCounter()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];
			$status = 'alive';

			$data = $this->barangay->count_per_barangay($id,$status);

			$this->output->set_output(json_encode($data));
		}

		public function listPerBarangay()
		{
			$this->output->set_content_type("json");
			$id = $_POST['id'];
			$status = 'alive';

			if($id == 0){
				$this->output->set_output(json_encode(['result' => false]));
			}else{
				
			$holder = $this->barangay->list_per_barangay($id,$status);
			$data['list_per_barangay'] = $holder;	

			$this->output->set_output(json_encode(['result' => true]));
			}
		}

		public function location()
		{
			$this->output->set_content_type('json');

			$id = $_POST['id'];

			$data = $this->barangay->location($id);

			$this->output->set_output(json_encode($data));
		}

		public function deleteBarangay()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];

			$data = $this->barangay->remove_barangay($id);

			$this->output->set_output(json_encode($data));
		}

		public function getSCname()
		{
			$this->output->set_content_type('json');
			$id = $_POST['id'];

			$data = $this->allowance->getTrackSC($id);

			$this->output->set_output(json_encode($data));
		}

		public function registerAllowance()
		{
			$this->output->set_content_type('json');

			$this->form_validation->set_rules('trac_SC_id', 'Senior Citizen ID', 'trim|required|numeric');
			$this->form_validation->set_rules('allowance_desc', 'Allowance Description', 'trim|required');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');

			if(!$this->form_validation->run()){
				$this->output->set_output(json_encode([
					'result' => false,
					'errors' => array_values($this->form_validation->error_array())
				]));
			}
			else{
				$SC_id = $this->input->post('trac_SC_id');
				$allowance_no = $this->input->post('allowance_desc');
				$sclist = $this->allowance->getTrackSC($SC_id);
				$validate = $this->allowance->checkDuplicate($SC_id,$allowance_no);

				if(!$sclist){
					$this->output->set_output(json_encode(['result' => 'null']));
				}else{
					foreach($sclist as $row){

						$id = $row->SC_no;
						$status = $row->status;
						
						if($status == 'dead'){
							$this->output->set_output(json_encode(['result' => 'deceased']));
						}else if($validate){
							$this->output->set_output(json_encode(['result' => 'duplicate']));
						}else{
							$data = array(
								'trac_SC_no' => $id,
								'trac_allowance_no' => $this->input->post('allowance_desc'),
								'amount' => $this->input->post('amount'),
								'date_given' => $this->input->post('date_given')
							);
							$this->allowance->register_transaction($data);
							$this->output->set_output(json_encode(['result' => true]));
						}
					}			
				}
			}
		}

		public function getNewRegisteredReports()
		{
			$this->output->set_content_type('json');
			$year =  $_POST['year'];
			$barangay_no = $_POST['barangay_no'];
			$status = 'alive';

			$months_arr = array(
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);

			$data = array();
			foreach($months_arr as $month){
				$newRegistered = $this->reports_model->getNewRegisteredSC($month,$year,$barangay_no,$status);
				$data[] = $newRegistered->row();
			}
			$this->output->set_output(json_encode($data));
		}

		public function getAgeReport()
		{
			$this->output->set_content_type('json');
			$status = 'alive';
			$data = array();

			$holder = $this->reports_model->getAgeBracket($status);
			
			foreach($holder->result() as $row){
				$data[] = $row;
			}
			$this->output->set_output(json_encode($data));
		}

		public function getComplaintReport()
		{
			$this->output->set_content_type('json');
			$choices_arr = array(
				'unverified',
				'allowance',
				'service',
				'others'
			);

			$data = array();
			foreach($choices_arr as $choices){
				$holder = $this->reports_model->getComplaintReport($choices);
				$data[] = $holder->row();
			}
			$this->output->set_output(json_encode($data));
		}

		public function getBirthMonthReport()
		{
			$this->output->set_content_type('json');
			$status = 'alive';
			$months_arr = array(
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);

			$data = array();
			foreach($months_arr as $month){
				$brthmonth = $this->reports_model->getBirthMonth($month,$status);
				$data[] = $brthmonth->row();
			}
			$this->output->set_output(json_encode($data));
		}

		public function getMonthlyAllowanceReport()
		{
			$this->output->set_content_type('json');
			$year = $_POST['year'];
			$barangay_no = $_POST['barangay_no'];
			$months_arr = array(
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);

			$data = array();
			foreach($months_arr as $month){
				$allowancemonth = $this->reports_model->getAllowanceMonth($month,$year,$barangay_no);
				$data[] = $allowancemonth->row();
			}
			$this->output->set_output(json_encode($data));
		}

		public function getDeathRateReport()
		{
			$this->output->set_content_type('json');
			$status = 'dead';
			$year = $_POST['year'];
			$barangay_no = $_POST['barangay_no'];
			$months_arr = array(
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);

			$data = array();
			foreach($months_arr as $month){
				$deathmonth = $this->reports_model->getDeathMonth($month,$status,$year,$barangay_no);
				$data[] = $deathmonth->row();
			}
			$this->output->set_output(json_encode($data));
		}

	}

?>