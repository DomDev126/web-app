$(document).ready(function () {  
	var	geocoder,
			map;
	initialize();
	codeAddress();
	


  function initialize() {

      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(-34.397, 150.644);
      var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

       map = new google.maps.Map(document.getElementById("innerMap"), myOptions);

   }
     

   function codeAddress() {
       /* var address = document.getElementById("address").value;*/
       var address= $('.small-text').data('loc');
        geocoder.geocode( { 'address': address }, function(results, status) {
         
          if (status == google.maps.GeocoderStatus.OK) {
         
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
           
            });

          } else {

            alert ('Unable to find location');
          }

        });
  }



});