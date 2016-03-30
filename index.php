<!DOCTYPE html>
<html>
var lat;
var long;
<head>


<button onclick="getLocation()">Show Lat and Long Values</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
	valuelat = position.coords.latitude;
	valuelong = position.coords.longitude;

}


</script>
<meta charset="UTF-8">
<title>Geolocation Assignment Shahzain</title>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
 
<style type="text/css">
#map {
height: 400px;
width: 600px;
margin-top: 0.6em;
}
</style>
 
<script type="text/javascript">
var map;
var infowindow;
var valuelat;
var valuelong;

 
function initializee() {
var pyrmont = new google.maps.LatLng(valuelat,valuelong);
 
map = new google.maps.Map(document.getElementById('map'), {
mapTypeId: google.maps.MapTypeId.ROADMAP,
center: pyrmont,
zoom: 15
});
 
var request = {
location: pyrmont,
radius: 5000,
types: ['hospital']
};
infowindow = new google.maps.InfoWindow();
var service = new google.maps.places.PlacesService(map);
service.search(request, callback);
}
 
function callback(results, status) {
if (status == google.maps.places.PlacesServiceStatus.OK) {
for (var i = 0; i < results.length; i++) {
createMarker(results[i]);
}
}
}
 
function createMarker(place) {
var placeLoc = place.geometry.location;
var marker = new google.maps.Marker({
map: map,
position: place.geometry.location
});
 
google.maps.event.addListener(marker, 'click', function() {
infowindow.setContent(place.name);
infowindow.open(map, this);
});
}
 
google.maps.event.addDomListener(window, 'load', initialize);
</script>

</head>
<body>
<div id="map"></div>
<div id="text">
<pre>

<button onclick="initializee()">Show Hospitals in Map</button>
</pre>
</body>
</html>