var map;
var marker;

function initMap() {
    var mapDiv = document.getElementById('map');
    map = new google.maps.Map(mapDiv, {
        zoom: 10,
        center: new google.maps.LatLng(42.8385612,74.5569484)
    });
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
function showMap() {
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({'address': $('#otkuda option:selected').text()}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            for (var i = 0; i < results.length; i++){
                if (marker){
                    marker.setPosition(results[i].geometry.location);
                    marker.title = results[i].address_components[0].long_name
                }
                else {
                    marker = new google.maps.Marker({
                        map: map,
                        position: results[i].geometry.location,
                        title: results[i].address_components[0].long_name
                    });
                }
                var lat = results[i].geometry.location.lat();
                var lon = results[i].geometry.location.lng();
                $('#lat').val(lat);
                $('#lon').val(lon);
            }
        } else {
            window.alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// {{--@else--}}
// {{--var geocoder = new google.maps.Geocoder;--}}
// {{--geocoder.geocode({'address': '{{ $item->region1->name }}'}, function(results, status) {--}}
//     {{--if (status === google.maps.GeocoderStatus.OK) {--}}
//         {{--map.setCenter(results[0].geometry.location);--}}
//         {{--for (var i = 0; i < results.length; i++){--}}
//             {{--new google.maps.Marker({--}}
//                 {{--center: {lat: 41.2016389,lng: 74.8176553},--}}
//                 {{--map: map,--}}
//                 {{--position: results[i].geometry.location,--}}
//                 {{--title: results[i].address_components[0].long_name--}}
//                 {{--});--}}
// {{--}--}}
// {{--} else {--}}
// {{--window.alert('Geocode was not successful for the following reason: ' + status);--}}
// {{--}--}}
// {{--});--}}
