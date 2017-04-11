<!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Найти попутчика в ONLINETAXI.KG</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #335d73;" id="app">
	@include('layouts.header')

	<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #F5F5F5; padding-bottom: 15px; padding-top: 15px;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
	 <div class="col-sm-12">
	    <span class="header3">Найти попутчика </span>
	 </div>
	 <div class="col-sm-12">
	    <div class="col-sm-6" style="padding: 0px !important;"><span class="count">{{ count($load) }} предложений</span></div>
		<div class="col-sm-6">
			@if ($view == 'map')
				<form method="post" action="{{ route('search_id',$id) }}">
					{{ Form::token() }}
					<button type="submit" class="btn btn-warning" style="float: right; margin-right: 5px;" >
						<span class="glyphicon glyphicon-map-marker"></span> На карте
					</button>
				</form>
			@else
            <form method="get" action="{{ route('search') }}">
				<input type="hidden" name="map" value="map">
				<input type="hidden" name="type" value="{{ isset($_REQUEST['type']) ? $_REQUEST['type'] : null }}">
				<input type="hidden" name="volume" value="{{ isset($_REQUEST['volume']) ? $_REQUEST['volume'] : null }}">
				<input type="hidden" name="otkuda" value="{{ isset($_REQUEST['otkuda']) ? $_REQUEST['otkuda'] : null }}">
				<input type="hidden" name="kuda" value="{{ isset($_REQUEST['kuda']) ? $_REQUEST['kuda'] : null }}">
				<input type="hidden" name="data" value="{{ isset($_REQUEST['data']) ? $_REQUEST['data'] : null }}" >
				  <button type="submit" class="btn btn-warning" style="float: right; margin-right: 5px;" >
					   <span class="glyphicon glyphicon-map-marker"></span> На карте
				  </button>
            </form>
			@endif
		  <button type="button" class="btn btn-success" style="float: right; margin-right: 5px;">
		       <span class="glyphicon glyphicon-th"></span> Таблица</button>
		</div>
	 </div>
	 </div>
	 </div>
	 <div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #fff;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;  margin-top: 10px !important;">
	 <div class="col-sm-12">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="active">
        <th><span class="glyphicon glyphicon-th-list"></span> №:</th>
        <th><span class="glyphicon glyphicon-file"></span> Темы</th>
        <th><span class="glyphicon glyphicon-tags"></span> Тип</th>
		<th><span class="glyphicon glyphicon-phone-alt"></span> Телефон</th>
		<th><span class="glyphicon glyphicon-map-marker"></span> Откуда</th>
		<th><span class="glyphicon glyphicon-map-marker"></span> Куда</th>
		<th><span class="glyphicon glyphicon-time"></span> Когда</th>
		<th><span class="glyphicon glyphicon-time"></span> Опубликовано</th>
		<th><span class="glyphicon glyphicon-dashboard"></span> Действия</th>
      </tr>
    </thead>
    <tbody>
	@foreach($load as $item)
	      <tr style="">

			<td style="vertical-align: middle;">{{ $item->id }}</td>

			<td style="vertical-align: middle;"><a href="{{ route('show',$item->id) }}" style="color: #42c2f4; background-color: transparent; text-decoration: none;">{{ $item->title }}</a></td>
			<td style="vertical-align: middle;">{{ $item->type_table->name }}</td>
			<td style="vertical-align: middle;">{{ $item->telefon }}</td>
			<td style="color: #449d44; vertical-align: middle;">{{ $item->region1->name }}</td>
			<td style="color: #42c2f4; vertical-align: middle;">{{ $item->region2->name	 }}</td>
			<td style="vertical-align: middle;">{{ $item->data }}</td>
			<td style="vertical-align: middle;">{{ $item->created_at }}</td>
			<td style="vertical-align: middle;">
				<a href="{{ route('show',$item->id) }}">
					<button type="button" class="btn btn-success btn-md" name="detail" id="detail">
						<span class="glyphicon glyphicon-expand"></span> Подробнее
					</button>
				</a>
			</td>
		  </tr>
	@endforeach
	</tbody>
  </table>
		 {{--{{ $load->appends($_REQUEST)->links() }}--}}
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/vue.js"></script>

  </body>
</html>