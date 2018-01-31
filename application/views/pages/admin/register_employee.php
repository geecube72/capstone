

    <section class="content-header">
        <div class="panel panel-heading"><h4><b>Register Employee</b></h4></div>
        <div class="requirement"><b style="color:red;"> * Fields are Required </b> </div>
    </section>

    <section class="content">

        <?php $attributes = array('class' => 'form-signin', 'id' => 'registerEmployeeform', 'method' => 'POST'); echo form_open_multipart('SecondaryController/registerEmployee', $attributes); ?>
		<span id="reauth-email" class="reauth-email"></span>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-1">
                    <b> Name:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="emp_firstname" class="form-control" placeholder="Firstname"  autofocus>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="emp_lastname" class="form-control" placeholder="Lastname"  autofocus>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="emp_middle" class="form-control" placeholder="Middle Initial"  autofocus>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-1">
                    <b> Address:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>        
                <div class="col-sm-2">
                    <input type="text" name="emp_street" class="form-control" placeholder="Street"  autofocus>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="emp_sitio" class="form-control" placeholder="Sitio"  autofocus>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="emp_barangay" class="form-control" placeholder="Barangay"  autofocus>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-1">
                    <b> Birthday:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-3">
                    <input type="date" name="emp_birthday" id="birthday" class="form-control" placeholder="Date of Birth" style="margin-bottom:10px;"  autofocus>
                </div>
                <div class="col-sm-1">
                    <b> Age: </b>
                </div>
                <div class="col-sm-2">
                    <input type="hidden" name="emp_age" id="age" value="" class="form-control" placeholder="Age"> 
              <input type="text" name="disabled_age" id="disabled_age" value="" class="form-control" placeholder="Age" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-2">
                    <b> Contact Number:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div> 
                <div class="col-sm-2" style="margin-left:-40px;">
                   <input type="text" name="emp_contact_number" class="form-control" placeholder="Contact Number"  autofocus>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-2">
                    <b> Email Address:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-2" style="margin-left:-40px;">
                    <input type="email" name="emp_email" class="form-control" placeholder="E-mail Address"  autofocus>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">   
                <div class="col-sm-2">
                    <b> User Type:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-2" style="margin-left:-40px;">
                    <select class="form-control" style="margin-bottom: 10px;" name="emp_usertype" placeholder="User Type" autofocus>
                      <option>----</option>
                      <option value="admin">Admin</option>
                      <option value="employee">Employee</option>
                    </select>                            	
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-2">
                    <b> Profile Photo:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-3" style="margin-left:-40px;">
                    <input type="file" class="form-control" name="emp_profilephoto" autofocus>
                </div>
            </div>
        </div><br>

        <div class="row">
            <div class="form-group has-feedback">
                <div class="col-sm-2">
                    <b> Signature Photo:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
                </div>
                <div class="col-sm-3" style="margin-left:-40px;">
                    <input type="file" class="form-control" name="emp_signaturephoto" autofocus>
                </div>
            </div>
        </div><br>

                <button class="btn btn-lg btn-warning btn-signin" type="submit">Submit</button>
        <?php form_close();?>
    </section>

<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>

<script type="text/javascript">
$(document).ready(function(){

    $("#birthday").change(function(){
        var mdate = $("#birthday").val().toString();
        var birth_year = parseInt(mdate.substring(0,4), 10);
        var birth_month = parseInt(mdate.substring(5,7), 10);
        var birth_day = parseInt(mdate.substring(8,10), 10);

        var today = new Date();
        var year_today = today.getFullYear();
        var month_today = today.getMonth();
        var day_today = today.getDate();

        var birth = new Date(birth_year,birth_month-1,birth_day);
        var year_birth = birth.getFullYear();
        var month_birth = birth.getMonth();
        var day_birth = birth.getDate();

        var year_age = year_today - year_birth;
        var month = month_today - month_birth;

        if(month < 0 || (month == 0 && day_today < day_birth)){
          year_age--;
        }
        if(year_today < year_birth){
          year_age = 0;
        }

        /*var differenceInMilisecond = today.valueOf() - birth.valueOf();

        var year_age = Math.floor(differenceInMilisecond / 31536000000);*/

        document.getElementById('age').setAttribute('value', year_age);
        document.getElementById('disabled_age').setAttribute('value',year_age);
    });

    $('#registerEmployeeform').submit(function(e){

      e.preventDefault();

      var url = $(this).attr('action');
      var postData = new FormData(this);

      $.ajax({
        type : "POST",
        url : "<?= site_url('SecondaryController/registerEmployee')?>",
        data : postData,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",

        success : function(response){
            if(response.result == false){
                console.log(response.errors);
                $('.panel').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                }))
                    window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/registerEmployee');?>";
                    }, 3000);
            }else if(response.result == "err"){
                swal({

                    title : "Error!",  
                    text  : "Please Fill out the required Fields!",
                    type  : "error",
                    closeOnConfirm : false

                    }),
                
                window.setTimeout(function(){
                window.location.href="<?= site_url('MainController/registerEmployee');?>";
              }, 1000);
            }else if(response.result == true){
                console.log(response.result);
                swal({

                    title : "Success!",  
                    text  : "Registered Successfully!",
                    type  : "success",
                    closeOnConfirm : false

                    }),
                
                window.setTimeout(function(){
                window.location.href="<?= site_url('MainController/employeeList');?>";
              }, 2000);
            }

        }

      })

    })
})
</script>
