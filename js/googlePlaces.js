/**
 * I Have Plans -- Add-event google maps
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */

$(document).ready(function () {   
    

     function initialize() {
        
        var mapOptions = {
          center: new google.maps.LatLng(45.351904,-75.756083),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
  		    componentRestrictions: {country: 'can'}
        };
		
        var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions),
          input =  document.getElementById( 'searchTextField' ),
          autocomplete = new google.maps.places.Autocomplete(input),
          infowindow = new google.maps.InfoWindow(),
          marker = new google.maps.Marker({
            map: map,
           // title: "Test"
        });
 
        autocomplete.bindTo( 'bounds', map );

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
         
          if ( place.geometry.viewport ) {
            
            map.fitBounds( place.geometry.viewport );
          } else {
           
            map.setCenter( place.geometry.location );
            map.setZoom( 16 );  
          }

          var image = new google.maps.MarkerImage(
              place.icon,
              new google.maps.Size( 41, 41 ),
              new google.maps.Point( 0, 0 ),
              new google.maps.Point( 17, 34 ),
              new google.maps.Size( 35, 35 ));
          marker.setIcon( image );
          marker.setPosition( place.geometry.location );

          var address = '';
          if (place.address_components) {
            address = [(place.address_components[0] &&
                        place.address_components[0].short_name || ''),
                       (place.address_components[1] &&
                        place.address_components[1].short_name || ''),
                       (place.address_components[2] &&
                        place.address_components[2].short_name || '')
                      ].join(' ');
          }

		  var location = document.getElementById( 'location' );
        
          location.value = address;
		
        });

        function setupClickListener( id, types ) {
          var radioButton = document.getElementById( id );
          google.maps.event.addDomListener(radioButton, 'click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-establishment', ['establishment']);
      }
     
      google.maps.event.addDomListener( window, 'load', initialize );

});