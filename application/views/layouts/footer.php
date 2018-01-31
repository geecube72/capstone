</div>
</div>

<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/chartJS/Chart.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/DT2.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/DT.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js');?>"></script>

<div aria-hidden="false" role="dialog" tabindex="-1" id="employeeListModal" class="modal leread-modal fade in">
    <div class="modal-dialog">
        <div id="login-content" class="modal-content">
            <!-- modal - header -->
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title"><i class="fa fa-calendar-check-o"><?php echo '&nbsp;' ?><input type="text" id="emp_header" style="border:0px;" disabled></i></h4>
            </div>
                <!-- Start Modal Body -->
            <div class="modal-body">
                <input type="hidden" id="emp_user_id">
                <input type="hidden" id="emp_firstname">
                <input type="hidden" id="emp_lastname">
                <input type="hidden" id="emp_mi">
                <input type="hidden" id="emp_street">
                <input type="hidden" id="emp_sitio">
                <input type="hidden" id="emp_barangay">
                <div class="row">
                    <div class="col-sm-3 col-xs-4">
                        <img src="" id="emp_profile_photo" class="img-responsive img-thumbnail" alt="responsive-img">
                    </div>
                    <div class="col-sm-3 col-xs-4">
                        <img src="" id="emp_signature_photo" class="img-responsive img-thumbnail" alt="responsive-img">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Name: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_name" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Address: </b>
                    </div>
                    <div class="col-sm-6">
                        <textarea type="textarea" class="form-control" id="emp_address" disabled></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Birthday: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_birthday" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Age: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_age" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Contact Number: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_contact_number" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> E-mail Address: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_email_address" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Username: </b>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="emp_username" disabled>
                        <input type="hidden" id="emp_password">
                    </div>
                </div><br>
                <button class="btn btn-warning" type="button" onclick="update_employee();">Update</button>
            </div>
                <!-- Modal Footer -->
            <div class="modal-footer">
                <button data-dismiss="modal" class="close" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<div aria-hidden="false" role="dialog" tabindex="-1" id="updateEmployeeModal" class="modal leread-modal fadein">
    <div class="modal-dialog">
        <div id="login-content" class="modal-content">
            <div class="modal-header">
                <button aria-label="close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title"><i class="fa fa-calendar-check-o"> <?php echo '&nbsp;'?><input type="text" id="update_header" style="border:0px;" disabled></i></h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('id' => 'update_specific_employee', 'method' => 'POST'); echo form_open('SecondaryController/updateEmployeeInfo', $attributes); ?>
                <div class="error"></div>
                <div class="requirement"><b style="color:red;"> * Fields are Required </b> </div><br>
                <input type="hidden" name="user_id" id="update_user_id">
                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Name:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="firstname" id="update_firstname" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="lastname" id="update_lastname" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="middle" id="update_middle" class="form-control">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Address:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div>        
                        <div class="col-sm-3">
                            <input type="text" name="street" id="update_street" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="sitio" id="update_sitio" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="barangay" id="update_barangay" class="form-control">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Age:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="age" id="update_age" class="form-control">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Contact Number:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div> 
                        <div class="col-sm-6">
                           <input type="text" name="contact_number" id="update_number" class="form-control">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Email Address:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email" id="update_email" class="form-control">           
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group has-feedback">
                        <div class="col-sm-3">
                            <b> Password:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="password" id="update_password" class="form-control">           
                        </div>
                    </div>
                </div><br>
                <button class="btn btn-warning" type="submit">Save</button>
            <?php echo form_close(); ?>
            <div class="modal-footer">
                <button data-dismiss="modal" class="close" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

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
        "order": [[1,"asc"]],
        //"bAutoWidth": false,
         language: { search: "" }
    });

 	$('div.dataTables_filter input').addClass('form-control');
 	$('.dataTables_filter input').attr("placeholder", "Search Data Here..");

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
                swal("Cancelled", "Log Out Cancelled!","warning"); 
            }
        });
    }
</script>

<script type="text/javascript">
    
    function view_SC_modal(barangay_no,SC_id){

        $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/viewSpecificSC')?>",
            data : {
                barangay_id : barangay_no,
                sc_id : SC_id
            },
            dataType : "json",
            
            success : function(e){
                $("#SCModal").modal('show');
                $("#header").val(e[0].first_name + '\xa0\xa0' + e[0].middle_name + '\xa0\xa0' + e[0].last_name);                
                $("#SC_no").val(e[0].SC_no);
                $("#barangay_no").val(e[0].barangay_no);
                $("#Firstname").val(e[0].first_name + '\xa0\xa0' + e[0].middle_name + '\xa0\xa0' + e[0].last_name);             
                $("#SC_id").val(e[0].SC_ID);
                $("#Address").val(e[0].address_street + '\xa0' + 'st.' + '\xa0' + 'sitio' + '\xa0' + e[0].address_sitio + '\xa0' + 'Barangay' + '\xa0' + e[0].name + ',' + '\xa0' + 'Cebu' + '\xa0' + 'City');
                $("#Religion").val(e[0].religion);
                $("#MobileNumber").val(e[0].contact_number);
                $("#CivilStatus").val(e[0].rel_status);
                $("#Gender").val(e[0].gender);
                $("#Birthday").val(e[0].date_of_birth);
                $("#Age").val(e[0].age);
                $("#BirthPlace").val(e[0].place_of_birth);
                $("#highest_educ_attained").val(e[0].highest_educ_attained);
                $("#Status").val(e[0].status);
                $("#profile_photo").attr('src',"<?= base_url();?>assets/images/member/member_photo/" + e[0].SC_image);
                $("#signature_photo").attr('src',"<?= base_url();?>assets/images/member/signature_photo/" + e[0].SC_signature_image);
                $("#SC_ID_photo").attr('src',"<?= base_url();?>assets/images/member/member_id_photo/" + e[0].SC_ID_image);

            }

        })
        
    }

    function generate_id(){

        $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/generateID')?>",
            data : {
                id : $("#SC_no").val(),
                date : $("#Birthday").val(),
                add : $("#barangay_no").val()
            },
            dataType : "json",

                success : function(e){
                console.log(e);
                if (e.result == false){
                    sweetAlert("Error", "Already Generated!", "error");
                }
                else if (e.result == true){
                    // for CHIKKA SMS API start
                    $.ajax({
                        type : "POST",
                        url  : "<?= site_url('SecondaryController/sendGeneratedID_CHIKKA')?>",
                        data : {
                            message : e.data,
                            name : e.name,
                            number : e.number,
                            id : e.id
                        },
                        dataType : "json",

                        success : function(e){
                            console.log(e);
                            if(e.result == false){
                                swal({
                                    title : "Error!",
                                    text  : "Something is wrong",
                                    type  : "error",
                                    closeOnConfirm : false
                                    },
                                    function(){
                                        window.location.reload();
                                });
                            }
                            else if(e.result == "res"){
                                swal({
                                        title : "Status",
                                        text  : e.error,
                                        type  : "warning",
                                        closeOnConfirm : false
                                        },

                                        function(){
                                            window.location.reload();
                                });
                            }
                        }
                    }) // for CHIKKA SMS API end

                    // for itexmo SMS API start
                    /*$.ajax({
                        type : "POST",
                        url  : "<?= site_url('SecondaryController/sendGeneratedID_itexmo')?>",
                        data : {
                            message : e.data,
                            name : e.name,
                            number : e.number,
                            id : e.id
                        },
                        dataType : "json",

                        success : function(e){
                            console.log(e);
                            if(e.result == false){
                                swal({
                                    title : "Error!",
                                    text  : "Message not Sent",
                                    type  : "error",
                                    closeOnConfirm : false
                                    },
                                        function(){
                                            window.location.reload();
                                });
                            }
                            else if(e.result == true){
                                swal({
                                    title : "Success!",
                                    text  : "Message Sent Successfully",
                                    type  : "success",
                                    closeOnConfirm : false
                                    },
                                        function(){
                                            window.location.reload();
                                });
                            }
                            else if(e.result == "err"){
                                swal({
                                    title : "Error!",
                                    text  : "Error No."+'\xa0'+response.error+'\xa0'+"is encountered!",
                                    type  : "error",
                                    closeOnConfirm : false,
                                    },
                                        function(){
                                            window.location.reload();
                                });
                            }
                        }
                    })*/ // for itexmo SMS API end
                }
            }
        })
    }   

    function remove_SC(){

        swal({
                title : "Are you sure?",
                text  : "You will not be able to retrieve the file!",
                type  : "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false
        },

        function(isConfirm){
 
        if(isConfirm){ 

            $.ajax({
                type : "POST",
                url  : "<?= site_url('SecondaryController/removeSC')?>",
                data : {
                    id : $("#SC_no").val()
                },
                dataType : "json",

                success : function(e){
                        swal({

                            title : "Success!",  
                            text  : "Deleted Successfully!",
                            type  : "success",
                            closeOnConfirm : false

                        },

                        function(){
                            window.location.reload();
                        });
                }
            });               

            } else {
                swal("Cancelled", "Not Removed!","warning"); 
            }
        });
    }

    function spec_message_modal(){
       
        $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/viewMessageModal')?>",
            data : {
                id : $("#SC_no").val()
            },
            dataType : "json",

            success : function(e){
                console.log(e);
                $("#SCModal").modal('hide');
                $("#sendSMSModal").modal('show');
                $("#SC_name").val(e[0].first_name + '\xa0' + e[0].middle_name + '\xa0' + e[0].last_name);
                $("#send_contact").val(e[0].contact_number);
                $("#contact_number").val(e[0].contact_number);
            }
        })
        
    }

    $("#sendSMSform_CHIKKA").submit(function(e){

        e.preventDefault();

        var that = $(this);
        var btn = that.find(['type = submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'),that.serialize()).done(function(response){
            if(response.result == false){
                $('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                       /*window.location.reload();*/
                    }, 1000);
            }
            else if(response.result == "err"){
                swal({
                    title : "Error!",
                    text  : "Something is wrong",
                    type  : "error",
                    closeOnConfirm : false
                    },

                    function(){
                        window.location.reload();
                })
            }
            else if(response.result == "res"){
                swal({
                        title : "Status",
                        text  : response.error,
                        type  : "warning",
                        closeOnConfirm : false
                        },

                        function(){
                            window.location.reload();
                });
            }
        })
    })

    $("#sendSMSform_itexmo").submit(function(e){

        e.preventDefault();

        var that = $(this);
        var btn = that.find(['type = submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'),that.serialize()).done(function(response){
            if(response.result == false){
                $('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>'+ response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                        window.location.reload();
                    }, 1000);
            }
            else if(response.result == "none"){
                swal({
                    title : "Error!",
                    text  : "Message not Sent!",
                    type  : "error",
                    closeOnConfirm : false,
                    },
                        function(){
                            window.location.reload();   
                });
            }
            else if(response.result == true){
                swal({
                    title : "Success",
                    text  : "Message Successfully Sent!",
                    type  : "success",
                    closeOnConfirm : false,
                    },
                        function(){
                            window.location.reload();
                });
            }
            else if(response.result == "err"){
                swal({
                    title : "Error!",
                    text  : "Error No."+'\xa0'+response.error+'\xa0'+"is encountered!",
                    type  : "error",
                    closeOnConfirm : false,
                    },
                        function(){
                            window.location.reload();
                });
            }
        })
    })

    function transHistory_modal(){
        $.ajax({
            type : "POST",
            url  : "<?= site_url('MainController/viewSCTransaction')?>",
            data : {
                id : $("#SC_no").val()
            },
            dataType : "json",
        });
        window.location.href = "<?= site_url('MainController/viewSCTransaction?id=')?>" + $("#SC_no").val();
    }

</script>

<script type="text/javascript">

    function view_creAnnoun_modal(){
        $("#createAnnouncement").modal('show');
    }

    function announcement_send(id){
       
       $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/viewSpecificAnnouncement');?>",
            data : {
                id : id
            },
            dataType : "json",

            success : function(e){
                console.log(e);
                $("#viewAnnouncement").modal('show');
                $("#announcement_id").val(e[0].notification_no);
                $("#Title").val(e[0].title);
                $("#date_created").val(e[0].date_created);
                $("#type").val(e[0].type);
                $("#barangay1").val(e[0].bar_no);
                $("#barangay2").val(e[0].bar_no);
                $("#message1").val(e[0].message);
                $("#message2").val(e[0].message);
            }
       })
    }

    $("#confirmAnnouncement_CHIKKA").submit(function(e){

            e.preventDefault();

            var that = $(this),
            btn = that.find(['type = submit']);

            btn.addClass('disabled');
            $.post(that.attr('action'),that.serialize()).done(function(response){

                if(response.result == false){
                    swal({
                        title : "Error",
                        text  : "Something is wrong",
                        type  : "error",
                        closeOnConfirm : false
                        },
                        function(){
                            window.location.reload();
                       });
                }
                else if(response.result == "err"){
                    $.ajax({
                        type : "POST",
                        url : "<?= site_url('SecondaryController/updateAnnouncement')?>",
                        data : {
                            id : $("#announcement_id").val()
                        },
                    success : function(e){
                        swal({
                            title : "Status!",
                            text  : response.error,
                            type  : "warning",
                            closeOnConfirm : false
                            },
                            function(){
                                window.location.reload();
                         });
                    }
                });                      
                
            }

        });
    })

    $("#confirmAnnouncement_itexmo").submit(function(e){

            e.preventDefault();

            var that = $(this),
            btn = that.find(['type = submit']);

            btn.addClass('disabled');
            $.post(that.attr('action'),that.serialize()).done(function(response){
                if(response.result == false){
                    swal({
                        title : "Error!",
                        text  : "Message not Sent!",
                        type  : "error",
                        closeOnConfirm : false,
                        },
                        function(){
                            window.location.reload();
                    });
                }
                else if(response.result == true){
                    swal({
                    title : "Success",
                    text  : "Message Successfully Sent!",
                    type  : "success",
                    closeOnConfirm : false,
                    },
                        function(){
                            window.location.reload();
                    });
                }
                else if(response.result == "err"){
                    swal({
                        title : "Error!",
                        text  : "Error No."+'\xa0'+response.error+'\xa0'+"is encountered!",
                        type  : "error",
                        closeOnConfirm : false,
                        },
                            function(){
                                window.location.reload();
                    });
                }
            })
    })
     
</script>

<script type="text/javascript">
    
    function spec_complaint_modal(id){
        $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/viewSpecificComplain')?>",
            data :{
                id : id
            },
            dataType : "json",

            success : function(e){
                console.log(e);
                $("#specComplainModal").modal('show');
                $("#complain_no").val(e[0].complaint_no);
                $("#SC_id").val(e[0].SC_ID);
                $("#SC_name").val(e[0].first_name + '\xa0' + e[0].middle_name+ '.' + '\xa0' + e[0].last_name);
                $("#complain_date").val(e[0].date);
                $("#complain_message").val(e[0].message);
            }
        });
    }

    function verifyComplaint(){
        $("#specComplainModal").modal('hide');
        $("#verifyComplainModal").modal('show');
        $("#verify_complain_no").val($("#complain_no").val());
        $("#verify_complain_no1").val($("#complain_no").val());
        $("#verify_SC_id").val($("#SC_id").val());
    }

   $("#verifyComplaint").submit(function(e){

        e.preventDefault();

        var that = $(this),
        btn = that.find(['type=submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'), that.serialize()).done(function(response){
            if(response.result == false){
                console.log(response.errors);
                $('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                       window.location.reload();
                    }, 1000);

            }else if(response.result == true){
                swal({

                    title : "Success!",  
                    text  : "Verified Successfully!",
                    type  : "success",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href= "<?= site_url('MainController/verifiedComplaintsList');?>";
                    }, 1000);
            }

        })
    })

</script>

<script type="text/javascript">
     
    $("#registerBarangayForm").submit(function(e){

        e.preventDefault();

        var that = $(this),
        btn = that.find(['type=submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'), that.serialize()).done(function(response){
            if(response.result == false){
                console.log(response.errors);
                $('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                       window.location.href="<?= site_url('MainController/barangayList');?>";
                    }, 1000);

            }else if(response.result == true){
                swal({

                    title : "Success!",  
                    text  : "Registered Successfully!",
                    type  : "success",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/populationMap');?>";
                    }, 1000);
            }else if(response.result == 'error'){
                swal("Error","Barangay Already Registered","error");
            }

        })
    })

    function view_barangay_modal(){
        $('#viewBarangayModal').modal('show');
    }

    function delete_barangay(id){

        $.ajax({

            type  : "POST",
            url   : "<?= site_url('SecondaryController/checkBarangay') ?>",
            data  : {
                id : id
            },
            dataType : "json",

            success : function(e){

                if(e.result == true){
                    swal("Error!", "Barangay is in Use!", "error");
                }
                
                else if(e.result == false)
                {

                    swal({

                            title : "Are you sure?",
                            text  : "You will not be able to retrieve the file!",
                            type  : "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Delete it!",
                            closeOnConfirm: false

                    },

                    function(isConfirm){

                        if(isConfirm){ 

                            $.ajax({

                                type : "POST",
                                url  : "<?= site_url('SecondaryController/deleteBarangay')?>",
                                data : {
                                    id : id
                                },
                                dataType : "json",

                                success : function(e){
                                    swal({

                                        title : "Success!",  
                                        text  : "Deleted Successfully!",
                                        type  : "success",
                                        closeOnConfirm : false

                                    },

                                    function(){
                                        window.location.reload()
                                    });
                                }
                            })
                           
                        } else {
                            swal("Cancelled", "Not Removed!","warning"); 
                        }
                    });
                }
            }
        })

    }
</script>

<script type="text/javascript">
    function view_allowance_modal(){
        $("#trackAllowance").modal('show');
    }

    $("#trac_SC_id").change(function(e){
        e.preventDefault();

        $.ajax({
            type : "POST",
            url  : "<?= site_url('SecondaryController/getSCname') ?>",
            data : {
                id : $(this).val()
            },
            dataType : "json",

            success : function(e){
                console.log(e);
                $("#SC_name").val(e[0].first_name + '\xa0' + e[0].last_name);
            }
        })
    })

    $("#registerAllowance").submit(function(e){
        e.preventDefault();

        var that = $(this),
        btn = that.find(['type=submit']);

        btn.addClass('disabled');
        $.post(that.attr('action'), that.serialize()).done(function(response){
            if(response.result == false){
                console.log(response.errors);
                $('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/allowanceTracker');?>";
                    }, 1000);
            }else if(response.result == true){
                swal({

                    title : "Success!",  
                    text  : "Registered Successfully!",
                    type  : "success",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/allowanceTracker');?>";
                    }, 1000);
            }else if(response.result == 'null'){
                swal({

                    title : "Error!",  
                    text  : "No registered Senior Citizen!",
                    type  : "error",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/allowanceTracker');?>";
                    }, 1000);
            }else if(response.result == 'deceased'){
                swal({

                    title : "Error!",  
                    text  : "Member is already Deceased!",
                    type  : "error",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/allowanceTracker');?>";
                    }, 1000); 
            }else if(response.result == 'duplicate'){
                swal({

                    title : "Error!",  
                    text  : "Member Registered already!",
                    type  : "error",
                    closeOnConfirm : false

                    }),
                        window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/allowanceTracker');?>";
                    }, 1000); 
            }
        })
    })
</script>

<script type="text/javascript">

    function view_employee_modal(user_id){

        $.ajax({

            type : "POST",
            url  : "<?= site_url('SecondaryController/viewSpecificEmployee')?>",
            data : {
                id : user_id
            },
            dataType : "json",

            success : function(e){
                console.log(e);
                $("#employeeListModal").modal('show');
                $("#emp_firstname").val(e[0].first_name);
                $("#emp_lastname").val(e[0].last_name);
                $("#emp_mi").val(e[0].mi);
                $("#emp_street").val(e[0].address_street);
                $("#emp_sitio").val(e[0].address_sitio);
                $("#emp_barangay").val(e[0].address_barangay);
                $("#emp_user_id").val(e[0].user_id);
                $("#emp_header").val(e[0].first_name + '\xa0\xa0' + e[0].mi + '\xa0\xa0' + e[0].last_name);
                $("#emp_name").val(e[0].first_name + '\xa0\xa0' + e[0].mi + '\xa0\xa0' + e[0].last_name);
                $("#emp_address").val(e[0].address_street + '\xa0' + 'st.' + '\xa0' + 'sitio' + '\xa0' + e[0].address_sitio + '\xa0' + 'Barangay' + '\xa0' + e[0].address_barangay + ',' + '\xa0' + 'Cebu' + '\xa0' + 'City');
                $("#emp_birthday").val(e[0].birthday);
                $("#emp_age").val(e[0].age);
                $("#emp_contact_number").val(e[0].contact_number);
                $("#emp_email_address").val(e[0].email_address);
                $("#emp_username").val(e[0].username);
                $("#emp_password").val(e[0].password);
                $("#emp_profile_photo").attr('src',"<?= base_url();?>assets/images/employee/profile_photo/" + e[0].profile_photo);
                $("#emp_signature_photo").attr('src',"<?= base_url();?>assets/images/employee/signature_photo/" + e[0].signature_photo);
            }
        })
    }

    function update_employee(){

        $("#employeeListModal").modal('hide');
        $("#updateEmployeeModal").modal('show');

        $("#update_header").val($("#emp_name").val());
        $("#update_user_id").val($("#emp_user_id").val());
        $("#update_firstname").val($("#emp_firstname").val());
        $("#update_lastname").val($("#emp_lastname").val());
        $("#update_middle").val($("#emp_mi").val());
        $("#update_street").val($("#emp_street").val());
        $("#update_sitio").val($("#emp_sitio").val());
        $("#update_barangay").val($("#emp_barangay").val());
        $("#update_age").val($("#emp_age").val());
        $("#update_number").val($("#emp_contact_number").val());
        $("#update_email").val($("#emp_email_address").val());
        $("#update_password").val($("#emp_password").val());
    }

</script>

<script type="text/javascript">


        $("#update_specific_employee").submit(function(e){

            e.preventDefault();

            var that = $(this);
            btn = that.find(['type=submit']);

            btn.addClass('disabled');
            $.post(that.attr('action'),that.serialize()).done(function(response){
                if(response.result == false){
                    console.log(response.result);
                    $(".error").replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                })),
                    window.setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                
                }else if(response.result == true){
                    swal({

                    title : "Success!",  
                    text  : "Employee Updated Successfully!",
                    type  : "success",
                    closeOnConfirm : false

                    }),
                       window.setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }
            })
        });

        function remove_employee(id){

            $.ajax({
                type : "POST",
                url  : "<?= site_url('SecondaryController/viewSpecificEmployee'); ?>",
                data : {
                    id : id
                },
                dataType : "json",

                success : function(e){

                    if(e[0].emp_status == "inactive"){
                        swal("Error!", "Employee is already Inactive", "error");
                    }
                    else{
                        swal({
                            title : "Are you sure?",
                            text  : "You will not be able to retrieve the file!",
                            type  : "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Delete it!",
                            closeOnConfirm: false
                        },

                        function(isConfirm){
                 
                            if(isConfirm){ 

                                $.ajax({
                                    type : "POST",
                                    url  : "<?= site_url('SecondaryController/removeEmployee')?>",
                                    data : {
                                        id : id
                                    },
                                    dataType : "json",

                                    success : function(e){
                                            swal({

                                                title : "Success!",  
                                                text  : "Deleted Successfully!",
                                                type  : "success",
                                                closeOnConfirm : false

                                            },

                                            function(){
                                                window.location.reload();
                                            });
                                    }
                                });               

                            } else {
                                swal("Cancelled", "Not Removed!","warning"); 
                            }
                        });
                    }   
                }
            });
        }

</script>

</body>

</html>






