@extends("client._layout")

@section("title")
حجز لوحة 
@endsection

@section("content")

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
 
  	<style type="text/css">
    	#map {
 		border:1px solid red;
        height: 400px;
        width: 100%;
    	}

  	</style>

</head>
<body>
  <div id="map"></div>
  <script type="text/javascript">
      function initMap() {
          
        var uluru =  new google.maps.LatLng(31.5017876, 34.4784829);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: uluru
        });
      
      var locations = <?php print_r(json_encode($locations)) ?>;

          console.log(locations);
          
            var infowindow = new google.maps.InfoWindow({
          content: ''
        });
          
        for ( var i = 0; i<locations.length ;i++)
    {
         var uluru =  new google.maps.LatLng(
       locations[i].lat
           , 
        locations[i].lng);
 console.log('location_id'+locations[i].id)
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+locations[i].region+'</h1>'+
            '<div id="bodyContent">'+
                        '<h3 id="firstHeading" class="firstHeading">'+locations[i].street+'</h3>'+

          locations[i].details_address+
            
            '<p> <a href="/client/confirm/'+locations[i].id+'">'+
            'اضغط هنا ان كنت ترغب بحجز هذه اللوحة </a> '+'</br>'+
            {{date("Y")}} +
            '</div>'+
            '</div>';
        
      var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'Uluru (Ayers Rock)'
        });
          
        marker.addListener('click', (function(marker,contentString,infowindow) {
            return function(){
              //  console.log(contentString);
            infowindow.setContent(contentString);
          infowindow.open(map, marker); 
            };
           
        })(marker,contentString,infowindow));

    }
          
         
        
      }
window.onload = initMap;
 //   $.each( locations, function( index, value ){
//	    map.addMarker({
//	      lat: value.lat,
//	      lng: value.lng,
//	      title: value.city,
//	      click: function(e) {
                     
   // $("#Confirm").modal("show");
  //            if (confirm('هل انت متأكد بانك ترغب بحجز اللوحة هنا؟')){
//   window.location = "http://localhost:8000/client/confirm";
//}else{
//}

 
//	      }
//	    });
//   });

 //     locations.push({name:"value.city",latlng:new google.maps.latlng(value.lat,value.lng)});

  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbseInPGIEiBSQ6Yci5ZYtcodHp_KP3Wc&callback=initMap">
    </script>
</body>
</html>



@endsection