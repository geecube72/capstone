
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> View map </b></h4></div>
		</section>

		<section class="content">
		<div class="row">
			<div class="col-md-4">	
				<div id="map" class="bg-danger" style="width: 600px; height: 500px;"></div>
			</div>

			<div class="col-md-4 col-md-offset-7" style="margin-top: -45%;">
				<div class="panel panel-info" style="width:300px;">
					<div class="panel-heading">Information</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<b> TOTAL POPULATION </b>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="total" value="<?php echo $mapTotal ?>" disabled>
							</div>
							<div class="col-sm-1">
								<b> Longitude: </b>
							</div><br>
							<div class="col-sm-2">
								<span id="longitude"></span>
							</div>
						</div><br>

						<div class="row">
							<div class="col-md-1">
								<b> Population per Barangay </b>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<b><span id="perBarangay" class="form-control">----</span></b>
							</div>
							<div class="col-sm-1">
								<b> Latitude: </b>
							</div><br>
							<div class="col-sm-2">
								<span id="latitude"></span>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-1">
								<b> Barangay </b>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6" >
								<select id="barangay_select" class="form-control">
									<option selected value="0">-------</option>
									<?php foreach($barangayList as $row){ ?>
					                <option value="<?= $row->barangay_no; ?>"> <?= $row->name; ?></option>
					                <?php } ?>
								</select>
							</div>	
						</div><br>
						<div class="col-sm-offset-4">
						<button class="btn btn-info" id="view_SC_list">View</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
		</section>

		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHDSjWpo4XF8wUn2g7i7d9ajrxJLAz1CQ&callback=initMap">
	    </script>

	    <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>

	    

	    <script type="text/javascript">
	    	$("#view_SC_list").click(function(){

	    		$.ajax({

	    			type : "POST",
	    			url  : "<?= site_url('SecondaryController/listPerBarangay'); ?>",
	    			data : {
	    				id : $("#barangay_select").val()
	    			},
	    			dataType : "json",

	    			success : function(e){
	    				if(e.result == false){
	    					swal("Error!","Nothing is Selected!","error");
	    				}else if (e.result == true){
	    					$.ajax({
	    						type : "POST",
	    						url  : "<?= site_url('MainController/listPerBarangay')?>",
	    						data : {
	    							id : $("#barangay_select").val()
	    						},
	    						dataType : "html",
	    					});
	    					window.location.href = "<?= site_url('MainController/listPerBarangay?id=')?>" + $("#barangay_select").val();
	    					
	    				}
	    			}
	    		})
	    	})
	    </script>

	    <script type="text/javascript">
	    	$("#barangay_select").change(function(e){
	    		e.preventDefault();

	    		$.ajax({
	    			type : "POST",
	    			url  : "<?= site_url('SecondaryController/location'); ?>",
	    			data : {
	    				id : $(this).val()
	    			},
	    			dataType : "json",

	    			success : function(e){
	    				console.log(e);
	    				document.getElementById('longitude').innerHTML = e[0].longitude;
	    				document.getElementById('latitude').innerHTML = e[0].latitude;
	    			}
	    		})
	    	})
	    </script>

        <script type="text/javascript">

        var curLatitude = parseFloat($("#latitude").val());
        var curLongitude = parseFloat($("#longitude").val());


        function initMap() {

		    var map = new google.maps.Map(document.getElementById('map'), {
		      zoom: 12,
		      center: new google.maps.LatLng(10.3157, 123.8854),
		      panControl: true,
		      zoomControl: true,
		      scaleControl: true,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    });

		    <?php
		    	$this->load->database();
		    	$this->load->model('barangay');
		    	$result = $this->barangay->barangay_list();
		    	
		    	foreach($result as $row){
		    		$num = $this->barangay->count_per_barangay($row->barangay_no, 'alive');
		    		echo "addMarker(new google.maps.LatLng(".$row->longitude.",".$row->latitude.") , map, '$row->name', '$row->barangay_no', '$num');";
		    		// echo "addMarker(param1, param2, ".$row->barangay_name.")";
		    	}
		    ?>

		    // functiom addMarker(Latlnh, map, baragay_name)
			function addMarker(latLng, map, name, barangay_no, num){

				var marker = new google.maps.Marker({
					position : latLng,
					map : map,
					animation :google.maps.Animation.DROP
				});

				var contentString =
				'<div style="width: 100px;">' +
				'<div class="heading">' +
					'<b><center>' + name + '</center></b>' +
				'</div><br>' +
				'<div class="row">'+
							'<b><center> Members: </center></b>' +
							'<p><center>' + num + '</center></p>' +
				'</div>' +		
				'</div>';

				var infowindow =  new google.maps.InfoWindow({
					content : contentString
				});

				marker.addListener('click', function(){
					console.log($(this));
					infowindow.open(map, marker);
					/*idMarker = this;*/
					map.setZoom(15);
					map.setCenter(marker.getPosition());
					$("#barangay_select").val(barangay_no);
				});
				marker.addListener('dblclick', function(){
					infowindow.close();
					map.setZoom(12);
					map.setCenter(new google.maps.LatLng(10.3157, 123.8854));
				});

				return marker;
			}
		}

		</script>

		<script type="text/javascript">
	    	$("#barangay_select").change(function(e){

	    		e.preventDefault();

	    		$.ajax({

	    			type : "POST",
	    			url  : "<?= site_url('SecondaryController/barangayCounter'); ?>",
	    			data : {
	    				id : $(this).val()
	    			},
	    			dataType : "json",

	    			success : function(e){
	    				console.log(e);
	    				document.getElementById('perBarangay').innerHTML = e;
	    				
	    				marker.addListener('click', function(){
	    					infowindow.open(map, marker);
							/*idMarker = this;*/
							map.setZoom(15);
							map.setCenter(marker.getPosition());
	    				});
	    			}
	    		})
	    	})
	    </script>