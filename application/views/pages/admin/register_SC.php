<?php $date_registered = date('Y-m-d') ?> 

  <section class="content-header">
    <div class="panel panel-heading"><h4><b>Register Senior Citizen</b></h4></div>
    <div class="requirement"><b style="color:red;"> * Fields are Required </b> </div>
  </section>

  <section class="content">
    <div class="ui huge form">
    <?php $attributes = array('class' => 'form-signin', 'id' => 'registerSCform', 'method' => 'POST'); echo form_open_multipart('SecondaryController/registerSC', $attributes); ?>

          
          <div class="row">
            <div class="form-group has-feedback">
            <div class="col-sm-1">
              <label> Name: <span class="required" style="color:red; margin-left:5px;">*</span></label>
            </div>
            <div class="col-sm-2">
              <input type="hidden" name="SC_date_registered" value="<?php echo $date_registered ?>">
              <input type="text" name="SC_firstname" class="form-control" placeholder="First Name"  autofocus>
            </div>
            <div class="col-sm-2" >
              <input type="text" name="SC_lastname" class="form-control" placeholder="Last Name"  autofocus>
            </div>
            <div class="col-sm-2">
              <input type="text" name="SC_mi" class="form-control" placeholder="Middle Initial"  autofocus>
            </div>
            <div class="col-sm-2" style="margin-right:-10px;">
              <label> Generated ID Number: </label>
            </div>
            <div class="col-sm-2">
              <input type="text" class="form-control" placeholder="N/A" disabled>
            </div>
          </div>
        </div><br>

        <div class="row">
          <div class="form-group has-feedback">
              <div class="col-sm-1">
              <label> Address:<span class="required" style="color:red; margin-left:5px;">*</span> </label>  
              </div>
            <div class="col-sm-2">
              <input type="text" name="SC_street" class="form-control" placeholder="Street"  autofocus>
            </div>
            <div class="col-sm-2">
              <input type="text" name="SC_sitio" class="form-control" placeholder="Sitio"  autofocus>
            </div>
            <div class="col-sm-2"> 
              <select name="SC_barangay" id="barangay">
                <option disabled selected value="">Barangay</option>
                <?php foreach($barangayList as $row){ ?>
                <option value="<?= $row->barangay_no; ?>"> <?= $row->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-1">
              <b>Religion:<span class="required" style="color:red; margin-left:5px;">*</span></b>
            </div>
            <div class="col-sm-2">
              <select name="SC_religion" class="form-control" autofocus>
                <option disabled selected value="">------</option>
                <option value="catholic">Roman Catholic</option>
                <option value="muslim">Muslim</option>
                <option value="born again">Born Again</option>
                <option value="mormons">Mormons</option>
                <option value="others">Others</option>
              </select>
            </div>
          </div>
        </div><br>

        <div class="row">
          <div class="form-group has-feedback">
            <div class="col-sm-2" style="margin-right:-50px;">
              <b> Contact number:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-2">
              <input type="text" name="SC_contact_number" class="form-control" placeholder="Mobile Number"  autofocus>
            </div>
            <div class="col-sm-2" style="margin-right: -80px;">
              <b> Civil Status:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-md-2"> 
              <select class="form-control" style="margin-bottom: 10px;" name="SC_rel_status" autofocus>
                <option disabled selected value="">------</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="widowed">Widowed</option>
              </select>
            </div>
            <div class="col-sm-1" style="margin-right:-10px;">
              <b> Gender:<span class="required" style="color:red; margin-left:5px;">*</span></b>
            </div>
            <div class="col-sm-2" name="SC_gender">
              <label class="radio-inline"><input type="radio" name="SC_gender" value="male">Male</label>
              <label class="radio-inline"><input type="radio" name="SC_gender" value="female">Female</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group has-feedback">
            <div class="col-sm-2" style="margin-right: -70px;">
              <b>Date of Birth:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-2" >
              <input type="date" name="SC_birthday" id="birthday" class="form-control" placeholder="Date of Birth" style="margin-bottom:10px; padding-left: -50px;"  autofocus>
            </div>
            <div class="col-sm-1" style="margin-right: -25px;">
              <b> Age:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-2">
               <input type="hidden" name="SC_age" id="age" value="" class="form-control" placeholder="Age"> 
              <input type="text" name="disabled_age" id="disabled_age" value="" class="form-control" placeholder="Age" disabled>
            </div>
            <div class="col-sm-2" style="margin-right: -60px;">
              <b>Place of Birth:<span class="required" style="color:red; margin-left:5px;">*</span></b>
            </div>
            <div class="col-sm-2">
              <input type="text" name="SC_birthplace" class="form-control" placeholder="Place of Birth"  autofocus>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group has-feedback">
            <div class="col-sm-3" style="margin-right: -60px;">
              <b> Highest Education Attained:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-2">
              <select class="form-control" style="margin-bottom: 10px;" name="SC_highest_educ_attained" autofocus>
                <option disabled selected value="">------</option>
                <option value="elementary">Elementary</option>
                <option value="highschool">Highschool</option>
                <option value="undergraduate">Undergraduate</option>
                <option value="graduate">Graduate</option>
                <option value="vocational">Vocational</option>
              </select>
            </div>
            <div class="col-sm-1">
              <b> Status:</b>
            </div>
            <div class="col-sm-2">
              <input type="text" class="form-control" value="alive" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group has-feedback">
            <div class="col-sm-2" style="margin-right:-30px;">
              <b> Previous ID image:<span class="required" style="color:red; margin-left:5px;">*</span> </b> 
            </div>
            <div class="col-sm-3">            
              <input type="file" name="SC_id_photo" autofocus>
            </div>
            <div class="col-sm-2" style="margin-right:-40px;">
              <b> Signature Image:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-3">
              <input type="file" name="SC_signature_photo" autofocus>
            </div>
          </div>
        </div><br>
        <div class="row">
          <div class="form-group has-feedback">
            <div class="col-sm-2" style="margin-right:-80px;">
              <b> SC image:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
            </div>
            <div class="col-sm-3">
              <input type="file" name="SC_member_photo" autofocus>
            </div>
          </div>
        </div><br>
      </div>
       <button class="btn btn-lg btn-info btn-block btn-signin" type="submit">Register Senior Citizen</button>
  <?php form_close();?>
  </div>
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

    document.getElementById('age').setAttribute('value', year_age);
    document.getElementById('disabled_age').setAttribute('value',year_age);
  });


    $('#registerSCform').submit(function(e){

      e.preventDefault();

      var url = $(this).attr('action');
      var postData = new FormData(this);


      $.ajax({
        type : "POST",
        url : "<?= site_url('SecondaryController/registerSC')?>",
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
                        window.location.href="<?= site_url('MainController/registerSC');?>";
                    }, 1000);
            }else if(response.result == "err"){
                swal({

                    title : "Error!",  
                    text  : "Please Fill out the required Fields!",
                    type  : "error",
                    closeOnConfirm : false

                    }),
                
                window.setTimeout(function(){
                window.location.href="<?= site_url('MainController/registerSC');?>";
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
                window.location.href="<?= site_url('MainController/populationMap');?>";
              }, 1000);
            }

        }

      })

    })
})
</script>	


