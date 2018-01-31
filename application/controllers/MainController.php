<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->model('barangay');
		$this->load->model('member');
		$this->load->model('employee');
		$this->load->model('announcement');
		$this->load->model('allowance');

		if($member = $this->member->getMemberInfo($this->session->userdata('id')))
		{
			$this->member = $member;
		}

		if($employee = $this->employee->getEmployeeInfo($this->session->userdata('id')))
		{
			$this->employee = $employee;
		}

		if($admininfo = $this->admin->getAdminInfo($this->session->userdata('id')))
		{
			$this->admin = $admininfo;
		}
	}

	public function ifLogInEmployee()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data['employeeinfo'] = $this->employee;

			$this->load->view('layouts/header');
			$this->load->view('navigation/employee_navbar', $data);
			$this->load->view('navigation/employee_sidebar');
		}else{
			$data['title'] = 'sessionError';

			$this->load->view('layouts/header');
			$this->load->view('IMMS',$data);
		}
	}

	public function ifLogInAdmin()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data['admininfo'] = $this->admin;

			$this->load->view('layouts/header');
			$this->load->view('navigation/admin_navbar', $data);
			$this->load->view('navigation/admin_sidebar');
		}else{
			$data['title'] = 'sessionError';

			$this->load->view('layouts/header');
			$this->load->view('IMMS',$data);
		}
	}

	public function index()
	{
		$data['title'] = 'index';

		$bulletin = $this->announcement->ordered_announcements();
		$data['bulletinList'] = $bulletin;

		$pending = $this->announcement->pending_ordered_announcements();
		$data['pendingList'] = $pending;

		$this->load->view('IMMS', $data);

	}

	//member pages start
	public function memberHome()
	{
		$data['title'] = 'memberHome';

		if($this->session->userdata('logged_in') == TRUE)
		{
			$id = $this->session->userdata('id');

			$transaction = $this->allowance->getTransactionPerMember($id);
			$data['transactionList'] = $transaction;

			$complaints = $this->admin->getComplaintsPerMember($id);
			$data['complaintsList'] = $complaints;

			$data['memberinfo'] = $this->member;
			$this->load->view('IMMS', $data);
		}
	}
	//Member pages end

	//Employee pages start

	public function employeeHome()
	{
		$data['title'] = 'employeeHome';

		$bulletin = $this->announcement->ordered_announcements();
		$data['bulletinList'] = $bulletin;

		$pending = $this->announcement->pending_ordered_announcements();
		$data['pendingList'] = $pending;

		$this->ifLogInEmployee();
		$this->load->view('navigation/employee_sidebar');
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function employeeSCList()
	{
		$data['title'] = 'employeeSCList';

		$status = 'alive';
		$list = $this->member->member_list($status);
		$data['SCList'] = $list;

		$this->ifLogInEmployee();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');		
	}
	//Employee pages end

	//Admin pages start
	
	public function adminHome()
	{
		$data['title'] = 'adminHome';

		$bulletin = $this->announcement->ordered_announcements();
		$data['bulletinList'] = $bulletin;

		$pending = $this->announcement->pending_ordered_announcements();
		$data['pendingList'] = $pending;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

		//Employee module starts
	public function registerEmployee()
	{
		$data['title'] = 'registerEmployee';

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function employeeList()
	{
		$data['title'] = 'employeeList';

		$employee = $this->employee->employee_list();
		$data['employeeList'] = $employee;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');	
	}
		//Employee module ends

		//Senior Citizen module starts
	public function registerSC()
	{		
		$data['title'] = 'registerSC';

		$barangay = $this->barangay->barangay_list();
		$data['barangayList'] = $barangay;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('navigation/admin_sidebar');
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('navigation/employee_sidebar');
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function adminSCList()
	{
		$data['title'] = 'adminSCList';

		$status = 'alive';
		$list = $this->member->member_list($status);
		$data['SCList'] = $list;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function deadSCList()
	{
		$data['title'] = 'deadSCList';

		$status = 'dead';
		$list = $this->member->dead_members($status);
		$data['deadList'] = $list;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function viewSCTransaction()
	{
		$this->output->set_content_type('html');
		$id = $_GET['id'];

		$list = $this->allowance->getTransactionPerMember($id);
		$data['transactionList'] = $list;
		
		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('pages/all/SC_transaction', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('pages/all/SC_transaction', $data);
			$this->load->view('layouts/footer');
		}

	}
		//Senior Citizen module ends

		//Announcements module starts
	public function createAnnouncement()
	{
		$data['title'] = 'createAnnouncement';
		$pending = "pending";
		$success = "success";

		$announcement = $this->announcement->announcement_list($pending, $success);
		$data['announcementList'] = $announcement;

		$this->ifLoginAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function expiredAnnouncement()
	{
		$data['title'] = 'expiredAnnouncement';
		$status = 'expired';

		$expired = $this->announcement->expired_announcements($status);
		$data['expiredList'] = $expired;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function createNotification()
	{
		$data['title'] = 'createNotification';
		$status = 'success';

		$posted = $this->announcement->success_announcements($status);
		$data['postedList'] = $posted;

		$barangay = $this->barangay->barangay_list();
		$data['barangayList'] = $barangay;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function announcementList()
	{
		$data['title'] = 'announcementList';
		$status = 'pending';

		$notification = $this->announcement->pending_notification_list($status);
		$data['notificationList'] = $notification;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function sentAnnouncementList()
	{
		$data['title'] = 'sentAnnouncementList';
		$status = 'success';

		$notification = $this->announcement->sent_notification_list($status);
		$data['sentNotificationList'] = $notification;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}
		//Announcements module ends

		//Complaints module starts
	public function complaintsList()
	{
		$data['title'] = 'complaintsList';

		$list = $this->member->complaints_list();
		$data['complaintsList'] = $list;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if ($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}	

	public function verifiedComplaintsList()
	{
		$data['title'] = 'verifiedComplaintsList';

		$list = $this->member->verified_complaints_list();
		$data['complaintsList'] = $list;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if ($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

		//Complaints module ends

		//Population module starts
	public function barangayList()
	{
		$data['title'] = 'barangayList';

		$list = $this->barangay->barangay_list();
		$data['barangayList'] = $list;

		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
	}

	public function populationMap()
	{
		$data['title'] = 'populationMap';

		$holder = $this->barangay->barangay_list();
		$data['barangayList'] = $holder;

		$status = 'alive';
		$List = $this->member->listForBarangay($status);
		$data['mapTotal'] = $List;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function listPerBarangay()
	{
		$this->output->set_content_type('html');
		$id = $_GET['id'];
		$status = 'alive';

		$holder = $this->barangay->list_per_barangay($id,$status);
		$data['list_per_barangay'] = $holder;	

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('pages/all/list_per_barangay', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('pages/all/list_per_barangay', $data);
			$this->load->view('layouts/footer');
		}
	}
		//Population module ends

		//Allowance module starts
	public function allowanceTracker()
	{
		$data['title'] = 'allowanceTracker';
		$type = 'allowance';
		$status = 'success';

		$allowance = $this->announcement->allowance_list($type,$status);
		$data['allowanceList'] = $allowance;

		$registered = $this->allowance->tracked_allowance();
		$data['transactionList'] = $registered;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}
		//Allowance module ends

		//Reports module starts
	public function newRegisteredReports()
	{
		$data['title'] = 'newRegisteredReports';

		$barangay = $this->barangay->barangay_list();
		$data['barangayList'] = $barangay;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}

	}

	public function ageBracketReports()
	{
		$data['title'] = 'ageBracketReports';

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function complaintsReports()
	{
		$data['title'] = 'complaintsReports';

		if($this->session->userdata('user_type') == 'admin'){
		$this->ifLogInAdmin();
		$this->load->view('IMMS', $data);
		$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function birthMonthReports()
	{
		$data['title'] = 'birthMonthReports';

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function allowanceReports()
	{
		$data['title'] = 'allowanceReports';

		$barangay = $this->barangay->barangay_list();
		$data['barangayList'] = $barangay;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLoginAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}

	public function deathPerMonthReports()
	{
		$data['title'] = 'deathRateReports';

		$barangay = $this->barangay->barangay_list();
		$data['barangayList'] = $barangay;

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
			$this->load->view('layouts/footer');
		}
	}
		//Reports module ends

	//Admin pages end
	
	public function mapNavigation()
	{
		$data['title'] = 'mapNavigation';

		$this->ifLoginAdmin();
		$this->load->view('IMMS', $data);
	}

	public function employeeNavigation()
	{
		$data['title'] = 'employeeNav';

		$this->ifLoginAdmin();
		$this->load->view('IMMS', $data);
	}

	public function reportsNavigation()
	{
		$data['title'] = 'reportsNavigation';

		if($this->session->userdata('user_type') == 'admin'){
			$this->ifLogInAdmin();
			$this->load->view('IMMS', $data);
		}else if($this->session->userdata('user_type') == 'employee'){
			$this->ifLogInEmployee();
			$this->load->view('IMMS', $data);
		}
	}

}
?>