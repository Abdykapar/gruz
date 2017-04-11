<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Найти попутчика в ПЕРЕВОЗКА.KG</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <script>
		  function initMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {zoom: 7});
			  map.setCenter({lat: 41.2016389,lng: 74.8176553});
			  var geocoder = new google.maps.Geocoder;
			  var a = [];
			  var contentString = [];
			  @foreach($address as $item)
			            o = new Object();
			  			o.lat = {{ $item->latitude }};
			  			o.lng = {{ $item->longitude }};
					  a.push(o);
			  contentString.push('<div id="content"><h6 id="firstHeading" class="firstHeading">{{ $item->title }}</h6><p><b>Откуда: </b>{{ $item->region1->name }}</p><b>Куда: </b>{{ $item->region2->name }}</p><b>Объем: </b>{{ $item->volume }}</p><b>Телефон: </b><a href="tel:{{ $item->telefon }}">{{ $item->telefon }}</a></p></div>');
			  @endforeach
				var infowindow = new google.maps.InfoWindow();
			  var markers = a.map(function(location, i) {
						  var marker = new google.maps.Marker({
							  position: location
						  });
						  google.maps.event.addListener(marker,'click', (function(marker) {
						  	return function () {
								if (infowindow){
									infowindow.close();
								}
								infowindow.setContent(contentString[i]);
								infowindow.open(map,marker);
							}
						  })(marker));
				  return marker;
					  });
			  var markerCluster = new MarkerClusterer(map, markers,
					  {
					  	imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
		  }
	</script>
	<style>
	  a.passive_link:hover{
	     background-color: #335d73;
	  }
	  .header1{
	     color: #fff;
		text-shadow: 0 2px 4px rgba(0,0,0,.5);
		font-size: 38px;
		font-weight: 700;
		text-align: center;
		line-height: 46px;
		margin: 0;
	  }
	  .header2{
	    font-size: 28px;
		color: #000;
		font-weight: 700;
		line-height: 34px;
		margin: 15px 0 15px;
		position: relative;
	  }
	  .header3{
	    margin: 4px 0 15px;
		color: #191919;
		font-size: 22px;
		font-weight: 700;
	  }
	  .nopadding {
		padding: 0 !important;
		margin: 0 !important;
	  }
	</style>
  </head>
  <body>
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #335d73;">
	@include('layouts.header')
	 @include('layouts.form_map')
	<br>
	</div>
	<div class="container-fluid nopadding" style="padding-left: 15px; padding-right: 15px;">
	<div class="row nopadding" style="margin-left: 0px !important; margin-right: 0px !important;">
	 <div id="map" class="col-md-12 nopadding" style="padding: 0px !important; min-height: 550px; height: 550px;">
	 </div>
	 </div>
	 </div>
	<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #2b4756;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
	 <div class="col-md-12" style="min-height: 50px; padding-top: 16px;">
	    <span style="color: #fff;">©2017 Перевозка.kg Все права защищены.</span>
	 </div>
	</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByJwl7oshtnOOyOeKfg8ZzkQxOVnVJ0Fs&callback=initMap"></script>
	<script src="/js/OpenLayers.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script>
		function set() {
			$('#search_map').val('map');
			$('form#form_search').submit();
		}
		function unset() {
			$('#search_map').val('');
			$('form#form_search').submit();
		}
	</script>
  </body>
</html>