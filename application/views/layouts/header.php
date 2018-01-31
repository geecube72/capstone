<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
date_default_timezone_set("Asia/Singapore");?>
<!DOCTYPE html>
<html>
<head>
	
	<script type="text/javascript">

            function startTime(){

            var d = new Date();

            var hour = d.getHours();
            var min  = d.getMinutes();
            var sec  = d.getSeconds();
            min = checkTime(min);
            sec = checkTime(sec);
            var ampm;

            if(hour > 12){

                hour = hour - 12;
                ampm = 'PM' ;
                
            }else if (hour == 00){ 

                hour = 12;
                ampm = 'AM';
            }else{
                ampm = 'AM';
            }

            document.getElementById('time').innerHTML = "Time : " + hour + ":" + min + ":" + sec + "&nbsp" + ampm;  
            var t = setTimeout(startTime, 500);

            /*$("#time").html("Time :" + "&nbsp;"  + hour + ":" + min + "&nbsp;" + ampm);
*/
            }

            function checkTime(i){
                if(i < 10) {
                i = "0" + i;
                } //add zero in front of numbers < 10
                    return i;
            }       
            
	</script>

	<meta http-equiv="content-type" content="text/html;" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	

	<link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/skin-blue.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/custom_style.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/DT2.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/DT.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/sweetalert.css');?>">

	<title>IMMS</title>

</head>


<body class="hold-transition skin-blue sidebar-mini" onload="startTime();">

<div class="wrapper">