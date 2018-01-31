<header class="main-header">
	<a href="<?php echo site_url('MainController/adminHome');?>" class="logo">
	    <span class="logo-mini"><b>OSCA</b></span>
	    <span class="logo-lg"><b>OSCA</b></span>
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
	   	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		   <span class="sr-only">Toggle navigation</span>
		</a>

	    <div class="navbar-custom-menu">
		   	<ul class="nav navbar-nav">
		    		
		    	<li>
		    		<a href="<?php echo site_url('MainController/adminHome'); ?>">Home</a>
		    	</li>

		    	<li>
		    		<a href="<?php echo site_url('MainController/mapNavigation');?>">Population</a>
		    	</li>

		    	<li>
		    		<a href="<?php echo site_url('MainController/reportsNavigation');?>">Reports</a>
		    	</li>

		    	<li>
		    		<a href="<?php echo site_url('MainController/employeeNavigation');?>">Employee</a>
		    	</li>
		    	
		    	<li class="dropdown user user-menu">
		    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				        <img src="<?php echo base_url();?>assets/images/employee/profile_photo/<?=$admininfo->profile_photo?>" class="user-image" alt="User"></i> &emsp;<span class="hidden-xs"><?= $admininfo->first_name ?></span>
				    </a>
				    <ul class="dropdown-menu">
				       	<li class="user-header">
				       		<img src="<?php echo base_url();?>assets/images/employee/profile_photo/<?=$admininfo->profile_photo?>" class="img-circle" alt="User">
				       		<h4><?= $admininfo->first_name."&nbsp;".$admininfo->last_name?></b></h4>
				       	</li>
				      	<li class="user-footer">
				      		<div class="pull-left">
				        		<button onclick="view_employee_modal('<?php echo $this->session->userdata('id');?>');" class="btn btn-default btn-flat">Profile</button>
				        	</div>
				        	<div class="pull-right">
				       			<button onclick="logOut()" class="btn btn-default btn-flat">Sign out</button>
				       		</div>
				       	</li>	
				    </ul>
		    	</li>
		    		
		    </ul>
		</div>
	</nav>
</header>

<div class="content-wrapper">

    