/*$(document).ready(function(){

	$('#barangay').change(function(){
		var num = $(this).val();
		
		document.getElementById('barangay_no').setAttribute('value', num);
	});

 
});
*/




			var d = new Date();

			var hour = d.getHours();
			var min  = d.getMinutes();
			var sec  = d.getSeconds();
			var ampm;

			if(hour > 12){

				hour = hour - 12;
				ampm = 'PM' ;
			}else 

				ampm = 'AM';



			$("#time").html("Time :" + "&nbsp;"  + hour + ":" + min + "&nbsp;" + ampm);
			

