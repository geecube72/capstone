<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
       
    <title>Home</title>

    <!-- Bootstrap core CSS -->
    
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/sweetalert.css');?>">
    

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bower_components/bootstrap/dist/css/main.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/custom_style.css'); ?>">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- Fonts from fa-fa icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<div aria-hidden="false" role="dialog" tabindex="-1" id="employeeLogInModal" class="modal leread-modal fade in">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> WELCOME TO OSCA </b> </i></h4>
            </div>
            <div class="modal-body">
                <?php echo $this->session->flashdata('login_msg');?>
                <?php $attributes = array('class' => 'form-signin', 'id' => 'loginform', 'method' => 'POST'); echo form_open('SecondaryController/checkLogIn', $attributes); ?>
                    <span id="reauth-email" class="reauth-email"></span>
                          
                    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                    <?php echo form_error('email'); ?>
                                   
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <?php echo form_error('password'); ?>

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="close">Close</button>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" onclick="scrollto('home')" href="#home"><b>Senior Citizen Portal</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li onclick="scrollto('announcements')"><a href="#announcements">Announcements</a></li>
                    <li onclick="scrollto('contact')"><a href="#contact">Contact Us</a></li>
                    <li><button onclick="OSCALogInModal();" class="btn btn-info" style="margin-top:10px; margin-left: 10px;">OSCA Employees Log In</button></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <a id="home" class="smooth" href="#home"></a>
        <div id="headerwrap">
            <div class="header centered" style="margin-bottom: 3%; margin-top: -10%;">
                <h1><b>Office for Senior Citizens Affairs</b></h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Check for status.</h1>
                        <?php $attributes = array('class' => 'form-inline', 'id' => 'memberloginform', 'method' => 'POST'); echo form_open('SecondaryController/checkMemberLogIn', $attributes); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="SC_ID" placeholder="Enter Member ID Number here..">
                            </div>
                            <button type="submit" class="form-control btn btn-primary btn-lg">Login!</button>
                        <?php echo form_close()?>         
                    </div><!-- /col-lg-6 -->
                    <div class="col-lg-6">
                        <img class="img-responsive" src="<?= base_url('assets/bootstrap/img/ipad-hand.png');?>" alt="">
                    </div><!-- /col-lg-6 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </div><!-- /headerwrap -->

    <!-- LATEST NEWS -->
    <a id="announcements" class="smooth" href="#announcements"></a>
        <div class="container" style="margin-bottom: 5%;">
            <div id="page2">
                    <h2 class="section-title">Announcements</h2> 
                    <!-- <div class="margin"> -->
                              
        <section class="content pull-left" style="width: 50%; padding: 10px;">
            <div class="panel panel-info">
                <div class="panel panel-heading"><h4><b><center>Upcoming Announcements</center></b></h4></div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date Created</th>
                                        <th>Send Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($pendingList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->title."</td>";
                                        echo "<td>".$row->date_created."</td>"; 
                                        echo "<td>".$row->send_date."</td>";
                                    } ?>
                                </tbody>  
                        </table>
                    </div><!--/table-resp-->
                </div>
            </div>
        </section>

        <section class="content pull-right" style="width: 50%; padding: 10px;">
            <div class="panel panel-info">
                <div class="panel panel-heading"><h4><b><center>Latest Announcements</center></b></h4></div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date Posted</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($bulletinList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->title."</td>";
                                        echo "<td>".$row->send_date."</td>";
                                        echo "<td>".$row->date_created."</td>"; 
                                    } ?>
                                </tbody>  
                        </table>
                    </div><!--/table-resp-->
                </div>
            </div>
        </section>
                
            </div>
        </div> 
             
    <!-- FOOTER -->
    <footer>
        <a id="contact" class="smooth" href="#contact"></a>
        <div class="footer" id="footer" style="padding-top: 10%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3> About Us </h3>
                        <a  href="#">This website is intended as a capstone project entitled "Interactive Mapping and Monitoring for Senior Citizens". Thus, it is for educational purposes only not unless it will be given to the Office for Senior Citizens Affairs.</a>
                    </div>
                    <div class="col-md-4">
                        <h3> Services </h3>
                        <ul>
                            <li> <a href="#"> Mapping </a> </li>
                            <li> <a href="#"> Monitoring </a> </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3> Contact</h3>
                        <ul>
                            <li>
                                <p> Magallanes St, Cebu City, Cebu</p>
                                <p>(032) 233 4375</p>
                                <p style="padding-bottom: 10px;">Email add: osca@email.com</p>
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="form-control full text-center" placeholder="Email ">
                                    <button class="btn btn-primary " type="button"> Submit <i class="fa fa-long-arrow-right"> </i> </button>
                                </div>
                            </li>
                        </ul>
                        <ul class="social">
                            <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-instagram">   </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                        </ul>
                    </div>
                </div>
                <!--/.row--> 
            </div>
            <!--/.container--> 
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
        <div class="container">
        <p class="pull-left"> Copyright © 2017. All right reserved. </p>
        </div>
        </div>
    </footer>
     <!--/footer-bottom--> 
      
</body>
</html>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>



<script type="text/javascript">
    function OSCALogInModal(){
        $("#employeeLogInModal").modal('show');
    }

    $('#loginform').submit(function(e){
        e.preventDefault();

        var that = $(this);
        var btn = that.find([type = 'submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'),that.serialize()).done(function(response){
            if(response.result == false){
                swal({
                    title : "Error",
                    text  : response.errors,
                    type  : "error",
                    closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                            window.location.reload();
                    }, 1000);
            }else if(response.result == "error"){
                swal({
                    title : "Error",
                    text  : "Invalid Credentials",
                    type  : "error",
                    closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.reload();
                    }, 1000);
            }else if(response.result == true && response.user == 'employee'){
                swal({
                    title : "Success!",
                    text  : "Logged In Successfully",
                    type  : "success",
                    closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.href = "<?= site_url('MainController/employeeHome')?>";
                    }, 1000);
            }else if(response.result == true && response.user == 'admin'){
                swal({
                    title : "Success!",
                    text  : "Logged In Successfully",
                    type  : "success",
                    closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.href = "<?= site_url('MainController/adminHome')?>";
                    }, 1000);
            }
        })
    })
</script>

<script>
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
    // On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                scrollTop: target.offset().top
                }, 1000, function() {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                    $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });


    /*$('.smooth').on('click', function() {
        $.smoothScroll({
            scrollElement: $('body'),
            scrollTarget: '#' + this.id
        });
        
        return false;
    });*/
</script>

<script type="text/javascript">
    $('#memberloginform').submit(function(e){
        e.preventDefault();

        var that = $(this);
        var btn = that.find([type = 'submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'),that.serialize()).done(function(response){
            if(response.result == false){
                swal({
                        title : "Error",
                        text  : response.errors,
                        type  : "error",
                        closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.reload();
                    },1000);
            }else if(response.result == "error"){
                swal({
                        title : "Error",
                        text  : "Senior Citizen ID does not exist!",
                        type  : "error",
                        closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.reload();
                    },1000);
            }else if(response.result == true){
                swal({
                        title : "Success!",
                        text  : "Logged In Successfully",
                        type  : "success",
                        closeOnConfirm : false
                    }),

                    window.setTimeout(function(){
                        window.location.href = "<?= site_url('MainController/memberHome')?>";
                    },1000);
            }
        })
    })
</script>
