<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Найти попутчика в ПЕРЕВОЗКА.KG</title>
	<!-- Bootstrap -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script>
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {zoom: 10,center: new google.maps.LatLng({{ $item->latitude }}, {{ $item->longitude }})});
			{{--@if ($item->latitude && $item->longitude)--}}
//					console.log('error');
					var lat = {{ $item->latitude  }} ;
					var marker = new google.maps.Marker({
						position: {lat: lat, lng: {{ $item->longitude }}  },
						map:map
					});
					map.center({lat: lat, lng: {{ $item->longitude }}  });

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
		.count{
			color: #666;
			font-size: 15px;
		}
		.name{
			color: #c00;
			font-size: 16px;
			line-height: 21px;
		}
		.name1{
			color: #000;
			font-size: 16px;
			line-height: 21px;
			float: right;
			margin-left: 60px;
		}
		#map{
			height: 290px;
			width: 100%;
		}
	</style>
</head>
<body>
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #335d73;">
	@include('layouts.header')
</div>

<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #F5F5F5; padding-bottom: 15px; padding-top: 15px;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
		<div class="col-md-11 col-md-offset-1" style="padding: 0px !important;">
			<span class="header3">{{ $item->title }}</span>
		</div>
		<div class="col-md-11 col-md-offset-1" style="padding: 0px !important;">
			<div class="col-md-3" style="padding: 0px !important;">
	    <span id="date" name="date" class="count">
		       <span class="glyphicon glyphicon-time"></span> <span style="font-weight: bold;"> Опубликовано: </span>{{ $item->created_at }}</span>
			</div>
			<div class="col-md-3" style="padding: 0px !important;">
		<span id="view_count" name="view_count" class="count" style="margin-left: 15px;">
		       <span class="glyphicon glyphicon-eye-open"></span> <span style="font-weight: bold;"> Просмотры: </span>{{ $item->view_site }}</span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #fff; padding-bottom: 10px;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;  margin-top: 10px !important;">
		<div class="col-md-11 col-md-offset-1" style="padding: 0px !important;">
			<div class="col-sm-6" style="min-height: 290px; height: 290px; background-color: #F5F5F5; padding-top: 15px;">
	      <span id="area" name="area" style="margin-bottom: 30px; color: #000; font-size: 15px;">
		       <span class="glyphicon glyphicon-map-marker"></span> <span style="font-weight: bold;"> Откуда: </span>{{ $item->region1->name }}</span><br/><br/>
				<span id="address" name="address" style="margin-left: 0px; color: #000; font-size: 15px; margin-top: 10px;">
		       <span class="glyphicon glyphicon-map-marker"></span> <span style="font-weight: bold;"> Куда: </span>{{ $item->region2->name }}</span><br/><br/>
				<span id="telephone" name="telephone" style="margin-left: 0px; color: #42c2f4; font-size: 15px; margin-top: 10px;">
		       <span class="glyphicon glyphicon-phone-alt"></span> <span style="font-weight: bold;"> Телефон: </span><a href="tel:{{ $item->telefon }}">{{ $item->telefon }}</a></span><br/><br/>
				<span id="telephone" name="telephone" style="margin-left: 0px; color: #000; font-size: 15px; margin-top: 10px;">
		       <span class="glyphicon glyphicon-phone-alt"></span> <span style="font-weight: bold;"> Дата выезда: </span>{{ $item->data }}</span><br/><br/>
				<span id="comment" name="comment" style="margin-left: 0px; color: #000; font-size: 15px; margin-top: 10px;">
					<span class="glyphicon glyphicon-scale"></span> <span style="font-weight: bold;"> Объем: </span>{{ $item->volume }} тонна</span><br/><br/>
				<span id="comment" name="comment" style="margin-left: 0px; color: #000; font-size: 15px; margin-top: 10px;">
					<span class="glyphicon glyphicon-road"></span> <span style="font-weight: bold;"> Тип: </span>{{ $item->type_table->name }}</span><br/><br/>
				<span id="comment" name="comment" style="margin-left: 0px; color: #000; font-size: 15px; margin-top: 10px;">
		       <span class="glyphicon glyphicon-comment"></span> <span style="font-weight: bold;"> Описание: </span>{{ $item->description }}</span>

			</div>
			<div class="col-sm-5" style="background-color: #fff; min-height: 290px; height: 290px; padding-left: 10px !important;">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #2b4756;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
		<div class="col-md-12" style="min-height: 50px; height: 50px; padding-top: 16px;">
			<span style="color: #fff;">©2017 Перевозка.kg Все права защищены.</span>
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByJwl7oshtnOOyOeKfg8ZzkQxOVnVJ0Fs&callback=initMap"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>