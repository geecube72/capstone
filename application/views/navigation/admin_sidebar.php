<aside class="main-sidebar">
    <section class="sidebar">
    	<ul class="sidebar-menu" data-widget="tree">
    		<li class="header">CHOICES</li>
    		<li><a href="<?php echo site_url('MainController/adminHome');?>"><i class="fa fa-dashboard"></i> <span>Home Page</span></a></li>
    		<li class="treeview">
		        <a href="#"><i class="fa fa-group"></i>&nbsp;<span>Senior Citizens</span>
		            <span class="pull-right-container">
		            	<i class="fa fa-angle-left pull-right"></i>
		            </span>
		        </a>
		        <ul class="treeview-menu">
		            <li><a href="<?php echo site_url('MainController/registerSC');?>">Register Senior Citizen</a></li>
		            <li><a href="<?php echo site_url('MainController/adminSCList');?>">SC Records (Alive)</a></li>
		            <li><a href="<?php echo site_url('MainController/deadSCList');?>">SC Records (Deceased)</a></li>
		        </ul>
		    </li>
    		<li class="treeview">
		        <a href="#"><i class="fa fa-address-card-o"></i>&nbsp; <span>Announcements</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		        	<li><a href="<?php echo site_url('MainController/createAnnouncement');?>">Create Announcements</a></li>
		        	<li><a href="<?php echo site_url('MainController/expiredAnnouncement');?>">Expired Announcements</a></li>
		            <li><a href="<?php echo site_url('MainController/createNotification');?>">Create Notifications</a></li>
		            <li><a href="<?php echo site_url('MainController/announcementList');?>">Pending Notifications</a></li>
		            <li><a href="<?php echo site_url('MainController/sentAnnouncementList');?>">Sent Notifications</a></li> 
		        </ul>
		    </li>
    		<li class="treeview">
		        <a href="#"><i class="fa fa-address-card-o"></i>&nbsp; <span>Complaints</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		            <li><a href="<?php echo site_url('MainController/complaintsList');?>">Unverified Complaints</a></li>
		            <li><a href="<?php echo site_url('MainController/verifiedComplaintsList');?>">Verified Complaints</a></li>
		        </ul>
		    </li>
		    <li class="treeview">
		        <a href="#"><i class="fa fa-group"></i>&nbsp; <span>Population</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		            <li><a href="<?php echo site_url('MainController/populationMap');?>">View Population</a></li>
		            <li><a href="<?php echo site_url('MainController/barangayList');?>">Register Barangay</a></li>
		        </ul>
		    </li>
		    <li class="treeview">
		        <a href="#"><i class="fa fa-line-chart"></i>&nbsp; <span>Allowance</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		            <li><a href="<?php echo site_url('MainController/allowanceTracker');?>">Allowance Tracker</a></li>
		        </ul>
		    </li>
		    <li class="treeview">
		        <a href="#"><i class="fa fa-line-chart"></i>&nbsp; <span>Reports</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		        	<li><a href="<?php echo site_url('MainController/newRegisteredReports');?>">New Senior Citizens</a></li>
		            <li><a href="<?php echo site_url('MainController/birthMonthReports');?>">Birthday Celebrants</a></li>
		            <li><a href="<?php echo site_url('MainController/ageBracketReports');?>">Age Bracket</a></li>
		            <li><a href="<?php echo site_url('MainController/complaintsReports');?>">Complaints</a></li>
		            <li><a href="<?php echo site_url('MainController/allowanceReports');?>">Allowance Monitoring</a></li>
		            <li><a href="<?php echo site_url('MainController/deathPerMonthReports');?>">Death Rate</a></li>
		        </ul>
		    </li>
		    <li class="treeview">
		        <a href="#"><i class="fa fa-group"></i>&nbsp; <span>Employee</span>
		            <span class="pull-right-container">
		                <i class="fa fa-angle-left pull-right"></i>
		              </span>
		        </a>
		        <ul class="treeview-menu">
		            <li><a href="<?php echo site_url('MainController/registerEmployee');?>">Register Employee</a></li>
		            <li><a href="<?php echo site_url('MainController/employeeList');?>">Employee Records</a></li>
		        </ul>
		    </li>
    	</ul>
    </section>
</aside>