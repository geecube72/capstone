<?php

if($title == 'sessionError')
{
	$this->load->view('errors/session_error');
}

if($title == 'index')
{
    $this->load->view('pages/logIn');   
}

if($title == 'memberHome')
{
	$this->load->view('pages/member/member_home');
}

if($title == 'employeeHome')
{
	$this->load->view('pages/employee/employee_home');
}

if($title == 'employeeSCList')
{
	$this->load->view('pages/employee/SCList');
}
//admin pages start

if($title == 'registerSC')
{
	$this->load->view('pages/admin/register_SC');
}

if($title == 'adminHome')
{
	$this->load->view('pages/admin/admin_home');
}

if($title == 'registerEmployee')
{
    $this->load->view('pages/admin/register_employee');   
}

if($title == 'employeeList')
{
	$this->load->view('pages/admin/employee_list');
}

if($title == 'adminSCList')
{
	$this->load->view('pages/admin/SCList');
}

if($title == 'deadSCList')
{
	$this->load->view('pages/all/deadSCList');
}

if($title == 'createAnnouncement')
{
	$this->load->view('pages/admin/createAnnouncement');
}

if($title == 'expiredAnnouncement')
{
	$this->load->view('pages/admin/expired_announcements');
}

if($title == 'createNotification')
{
	$this->load->view('pages/admin/create_announcement');
}

if($title == 'announcementList')
{
	$this->load->view('pages/all/announcement_list');
}

if($title == 'sentAnnouncementList')
{
	$this->load->view('pages/all/sent_notifications_list');
}

if($title == 'complaintsList')
{
	$this->load->view('pages/admin/SC_complaints');
}

if($title == 'verifiedComplaintsList')
{
	$this->load->view('pages/all/verified_complaints');
}

if($title == 'barangayList')
{
	$this->load->view('pages/admin/register_barangay');
}

if($title == 'populationMap')
{
	$this->load->view('pages/all/population_map');
}

if($title == 'allowanceTracker')
{
	$this->load->view('pages/all/allowance_tracker');
}

if($title == 'newRegisteredReports')
{
	$this->load->view('pages/all/reports/new_SC');
}

if($title == 'ageBracketReports')
{
	$this->load->view('pages/all/reports/age_bracket');
}

if($title == 'complaintsReports')
{
	$this->load->view('pages/all/reports/complaints_reports');
}

if($title == 'birthMonthReports')
{
	$this->load->view('pages/all/reports/birth_month');
}

if($title == 'allowanceReports')
{
	$this->load->view('pages/all/reports/allowance_tracker');
}

if($title == 'deathRateReports')
{
	$this->load->view('pages/all/reports/death_rate');
}

//admin pages end
if($title == 'mapNavigation')
{
	$this->load->view('pages/navigation/map_navigation');
}

if($title == 'employeeNav')
{
	$this->load->view('pages/navigation/employee_navigation');
}

if($title == 'reportsNavigation')
{
	$this->load->view('pages/navigation/reports_navigation');
}

?>