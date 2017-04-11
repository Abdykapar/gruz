<!DOCTYPE html>
<html>
<head>
    <title>Listening to DOM events</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 500px;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            zoom: 8,
            center: new google.maps.LatLng(-34.397, 150.644)
        });
        var marker;
        // We add a DOM event here to show an alert if the DIV containing the
        // map is clicked.
        google.maps.event.addListener(map, 'click', function (e) {
            var lat, lon;
            lat = e.latLng.lat();
            lon = e.latLng.lng();
            placeMarker(e.latLng);
            $('#lat').val(lat);
            $('#lon').val(lon);
        });

        function placeMarker(location) {
            if (marker){
                marker.setPosition(location);
            }
            else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        }
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByJwl7oshtnOOyOeKfg8ZzkQxOVnVJ0Fs&signed_in=true&callback=initMap" async defer></script>
</body>
</html>