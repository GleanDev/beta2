jQuery(document).ready(function($) {
	
	function getReverseGeocodingData(lat, lng, fn) {
    var latlng = new google.maps.LatLng(lat, lng);
    // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            fn(results[0].formatted_address, results[0]);
        }
    });
}
	

	jQuery('#'+AutoCompOptions['input_field']).on("input", function() {
		$('#gjm_lat').val('');
		$('#gjm_lng').val('');
	});
	
	  var mapOptions = {
    center: new google.maps.LatLng(-33.8688, 151.2195),
    zoom: 13
  	};

	$( "<div id='map-canvas' style='height:400px;'></div>" ).insertBefore( ".fieldset-job_location .field" );
	var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

	var input = document.getElementById( AutoCompOptions['input_field'] );

	if ( AutoCompOptions['options']['country'] == '' ) {
		var options = {
	        types: ['geocode'],
	    };
    //otherwise restrict to single country
    } else {
    	var options = {
        		types: ['geocode'],
        		componentRestrictions: { country: AutoCompOptions['options']['country'] }
        };
    }

    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.bindTo('bounds', map);
    
    var marker = new google.maps.Marker({
	    map: map,
	    anchorPoint: new google.maps.Point(0, -29),
	    draggable:true,

 	 });
 	 
 	
 	google.maps.event.addListener(marker, 'dragend', function(evt){
 	getReverseGeocodingData(evt.latLng.lat().toFixed(3), evt.latLng.lng().toFixed(3), 
 	function(location, results){
 		$('#job_location').val(location);
 		
 		for (var i = 0; i < results.address_components.length; i++) {
		    for (var j = 0; j < results.address_components[i].types.length; j++) {
		        if(results.address_components[i].types[j] == 'locality') {
		            var city_name = results.address_components[i].long_name;
		            alert(city_name);
		        }
		    }
		}
 		
 		});

	});
	
	google.maps.event.addListener(marker, 'dragstart', function(evt){
	    $('#job_location').val('Currently dragging marker...');
	});

    
    google.maps.event.addListener(autocomplete, 'place_changed', function(e) {

    	var place = autocomplete.getPlace();

		if (!place.geometry) {
			return;
		}
		
		$('#gjm_lat').val(place.geometry.location.lat());
		$('#gjm_lng').val(place.geometry.location.lng());
		
		//$('#'+AutoCompOptions['input_field']).val( place.formatted_address );
		
		var target = $('#'+AutoCompOptions['org_field']).closest('div.'+ AutoCompOptions['target']);
        target.trigger('update_results', [1, false]);
			
		      if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }	
    
        marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);



    });    
    

  
});