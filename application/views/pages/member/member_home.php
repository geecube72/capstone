<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Singapore");
$date_created = date('Y-m-d'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>OSCA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/DT2.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/DT.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/sweetalert.css');?>">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bower_components/bootstrap/dist/css/main.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/custom_style.css'); ?>">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- Fonts from fa-fa icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= site_url('MainController/memberHome');?>"><b>Senior Citizens Portal</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#" onclick="logOut()"><b>Log Out</b></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<hr>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10"><h1>Welcome! <?= $memberinfo->first_name."&nbsp".$memberinfo->last_name?></h1></div>
        </div>

        <div class="row">
            <div class="col-sm-3"><!--left col-->         
                <ul class="list-group">
                    <li class="list-group-item text-muted"><b>Profile</b></li>
                    <li class="list-group-item"><span><img style="width: 200px; height: 200px;" src="<?php echo base_url();?>assets/images/member/member_photo/<?=$memberinfo->SC_image?>" class="user-image" alt="User"></span></li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong>Member Number:</strong></span> <?=$memberinfo->SC_no?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Member ID:</strong></span> <?=$memberinfo->SC_ID?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Name:</strong></span> <?= $memberinfo->first_name."&nbsp".$memberinfo->middle_name."."."&nbsp".$memberinfo->last_name?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Mobile No.:</strong></span><?= $memberinfo->contact_number?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Date Registered:</strong></span> <?=$memberinfo->date_registered?></li>
                    <li class="list-group-item"><button class="btn btn-warning" onclick="send_complain();">Send Complain</button></li>     
                </ul>
            </div><!--/col-3-->

            <!-- left box -->
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#active"><h2>Transaction History</h2></a></li>
                    <li><a data-toggle="tab" href="#complaints"><h2>Complaints History</h2></a></li>
                </ul><br>                    
                <div class="tab-content">
                    <div id="active" class="tab-pane fade in active" >
                        <div class="table-responsive">
                            <table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Date Received</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($transactionList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->name."</td>";
                                        echo "<td>".$row->description."</td>"; 
                                        echo "<td>".$row->amount."</td>"; 
                                        echo "<td>".$row->date_given."</td>";
                                    } ?>
                                </tbody>  
                            </table>
                        </div><!--/table-resp-->
                    </div>
                    <div id="complaints" class="fade">
                        <div class="table-responsive">
                            <table class="table table-hover cell-border" cellspacing="0" width="100%" id="example1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   <?php foreach($complaintsList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->date."</td>"; 
                                        echo "<td>".$row->message."</td>"; 
                                        echo "<td>".$row->complaint_type."</td>";
                                    } ?>
                                </tbody>  
                            </table>
                        </div><!--/table-resp-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</hr>

        <div aria-hidden="false" role="dialog" tabindex="-1" id="complainsModal" class="modal leread-modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
                        <h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Submit Complain </b> </i></h4>
                    </div>
                    <div class="modal-body">
                        <div class="requirement"><b style="color:red;"> * Fields are Required </b> </div><br>
                        <?php $attributes = array('class'=>'form-signin', 'id' => 'submitComplain', 'method' => 'POST'); echo form_open('SecondaryController/submitComplain', $attributes); ?>
                        <div class="error"></div>
                        
                        <div class="row">
                            <div class="form-group has-feedback">
                                <div class="col-sm-3">
                                    <b> Date Created: </b>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="date_created" value="<?php echo $date_created ?>" disabled>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form-group has-feedback">
                                <div class="col-sm-3">
                                    <b> Message:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                                </div>
                                <div class="col-sm-4">
                                    <textarea type="text" class="form-control" name="complain_message" autofocus></textarea>
                                </div>
                            </div>
                        </div><br>

                        <button class="btn btn-lg btn-info btn-block btn-signin" type="submit">Submit</button>

                        <?php form_close(); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/DT2.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/DT.js');?>"> </script>
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<script>

  $(document).ready(function(){ 

    $('#example').DataTable({ 
        "aLengthMenu": [[10, 30, 50, -1], [10, 30, 50, "All"]],
        "iDisplayLength": 10,
        "pageLength" :7,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        //"bAutoWidth": false,
         language: { search: "" }
    });

    $('div.dataTables_filter input').addClass('form-control');
    $('.dataTables_filter input').attr("placeholder", "Search Data Here..");

 });

  $(document).ready(function(){ 

    $('#example1').DataTable({ 
        "aLengthMenu": [[10, 30, 50, -1], [10, 30, 50, "All"]],
        "iDisplayLength": 10,
        "pageLength" :7,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        //"bAutoWidth": false,
         language: { search: "" }
    });

    $('div.dataTables_filter input').addClass('form-control');
    $('.dataTables_filter input').attr("placeholder", "Search Data Here..");

 });

</script>

<script type="text/javascript">
    function send_complain(){
        $("#complainsModal").modal('show');
    }
</script>

<script type="text/javascript">
    $("#submitComplain").submit(function(e){
        e.preventDefault();

            var that = $(this),
            btn = that.find(['type = submit']);

            btn.addClass('disabled');
            $.post(that.attr('action'),that.serialize()).done(function(response){
                if(response.result == false){
                swal({
                        title : "Error",
                        text  : response.errors,
                        type  : "error",
                        closeOnConfirm : false
                        },

                        function(){
                            window.location.reload();
                        });

            }else if(response.result == true){
               swal({
                        title : "Success!",
                        text  : "Sent Successfully!",
                        type  : "success",
                        closeOnConfirm : false
                        },

                        function(){
                            window.location.reload();
                    }); 
            }
        });
    });
</script>

<script type="text/javascript">
    function logOut(){
        swal({
                title : "Are you sure?",
                text  : "You will be logged out!",
                type  : "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Log out!",
                closeOnConfirm: false
        },

        function(isConfirm){
 
        if(isConfirm){ 

            $.ajax({
                type : "POST",
                url  : "<?= site_url('SecondaryController/logOut')?>",
                dataType : "json",

                success : function(e){
                    swal({

                            title : "Success!",  
                            text  : "Logged Out Successfully!",
                            type  : "success",
                            closeOnConfirm : false

                        }),

                        window.setTimeout(function(){
                            window.location.href = "<?= site_url('MainController')?>";
                        }, 1000);
                }
            });               

            } else {
                swal("Cancelled", "Sign Out Cancelled","warning"); 
            }
        });
    }
</script>