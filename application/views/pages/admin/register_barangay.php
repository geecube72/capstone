<style>
	#description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 15px;
        font-weight: 500;
        padding: 6px 12px;
      }
</style>
  
		<section class="content-header">
			<div class="panel panel-heading"><h4><b>Register Barangay</b></h4></div>
		</section>

		<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>Name</th>
					<th>Longitude</th>
					<th>Latitude</th>
					<th></th>
					
				</thead>

				<tbody>
					<?php foreach($barangayList as $data){

						echo "<tr>";
						echo "<td>".$data->name ."</td>";
						echo "<td>".$data->longitude."</td>";
						echo "<td>".$data->latitude."</td>"; ?>
						<td><button class="btn btn-danger" onclick="delete_barangay('<?php echo $data->barangay_no ?>')">Delete</button></td>

					<?php }	
					?>
				</tbody>

			</table>
      
      <div class="pac-card" id="pac-card">
          <div>
              <div id="title">
                Barangay Search
              </div>
              <div id="type-selector" class="pac-controls">
              <input id="pac-input" class="form-control" type="text" placeholder="Enter a Barangay">
              </div>
          </div>         
      </div>
      <div id="map" style="width:600px; height: 500px;"></div>
          <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
          </div>
      </div>
    

      <div class="panel panel-info pull-right" style="margin-top: -35%;  margin-right: 5%;">
        <div class="panel-heading">Register Barangay</div>
      <?php $attributes = array('id' => 'registerBarangayForm', 'method' => 'POST'); echo form_open('SecondaryController/registerBarangay', $attributes); ?>
        <div class="panel-body">
            <div class="row error">
            </div> 
            <div class="row">
              <div class="form-group has-feedback">
                <div class="col-sm-2">
                  <b> Name: </b>
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                  <input type="text" class="form-control" id="name" name="barangayname">
                </div>
              </div>
            </div><br>
            <div class="row">
              <div class="form-group has-feedback">      
                <div class="col-sm-2">
                  <b> Longitude: </b>
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                  <input type="text" class="form-control" id="longitude" name="longitude">
                </div>
              </div>
            </div><br>
            <div class="row">
              <div class="form-group has-feedback">      
                <div class="col-sm-2">
                  <b> Latitude: </b>
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                  <input type="text" class="form-control" id="latitude" name="latitude">
                </div>
              </div>
            </div><br>
            <div class="form-group">
              <button class="btn btn-warning" type="submit">Submit</button>
            </div>
        </div>
      <?php form_close(); ?>
      </div>

		</section>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHDSjWpo4XF8wUn2g7i7d9ajrxJLAz1CQ&libraries=places&callback=initialize" async defer></script>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initialize() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 10.3157, lng: 123.8854},
          draggable: false,
          zoom: 12

        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');

        var southWest = new google.maps.LatLng( 10.372186, 123.727338 );
        var northEast = new google.maps.LatLng( 10.411345, 124.023801 );
        var cebuBounds = new google.maps.LatLngBounds(southWest , northEast);

        var options = {
        	bounds : cebuBounds,
        };

        var autocomplete = new google.maps.places.Autocomplete(input, options);

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
        autocomplete.setOptions({strictBounds:true});

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var item_Lat = place.geometry.location.lng();
          var item_Lng = place.geometry.location.lat();
          var item_Location = place.formatted_address;

          /*alert("Lat = "+ item_Lat + "_____Lang = "+ item_Lng +"______Location=" +item_Location);*/

          $("#latitude").val(item_Lat);
          $("#longitude").val(item_Lng);
          $("#name").val(item_Location);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        /*function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });*/
      }
    </script>

    
    





