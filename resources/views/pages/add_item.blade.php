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
      #map {
          height: 500px;
          width: 500px;
      }
	</style>

  </head>
  <body>
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #335d73;">
	@include('layouts.header')
	<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #F5F5F5; padding-bottom: 15px; padding-top: 15px;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
        @if (Session::has('status'))
            <div class="col-md-4 col-md-offset-8">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Успешно! </strong> {{ Session::get('status') }}
                </div>
            </div>
        @endif
	 <div class="col-md-11 col-md-offset-1" style="padding: 0px !important;">
	    <span class="header3">Найти попутчика легко!</span>
	 </div>
	 </div>
	 </div>
	 <div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #fff; padding-bottom: 10px;">
	<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;  margin-top: 10px !important;">

	<div class="col-md-11 col-md-offset-1" style="background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px;">
	  <form class="form-inline col-md-6" method="post" action="{{ route('store_item',$id) }}">
          {{ Form::token() }}
		   <div class="form-group">
				<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Тип *: </label>
		   </div>
          <div class="form-group">
              <label for="type"></label>
              <select class="form-control " id="type" style=" min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="type">
                @foreach($data['type'] as $item)

                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                @endforeach
              </select>
          </div>
          <br/>
          <br/>
          <div class="form-group">
              <label for="email" style="  min-width: 100px; text-align: right !important; margin-right: 15px;">Объем *: </label>
          </div>
          <div class="form-group{{ $errors->has('volume') ? ' has-error' : '' }}">
             <input type="number" maxlength="12" name="volume" class="form-control input-lg" style="min-width: 300px; width: 300px;" placeholder="Тонна">
              @if ($errors->has('volume'))
                  <span class="help-block">
                      <strong>{{ $errors->first('volume') }}</strong>
                  </span>
              @endif
          </div>
          <br>
          <br>
          <div class="form-group">
				<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Откуда *: </label>
		   </div>

        <div class="form-group">
        <select class="form-control" id="otkuda" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="otkuda" onchange="showMap()">
            @foreach($data['region'] as $item)

                <option value="{{ $item->id }}">{{ $item->name }}</option>

            @endforeach
        </select>
        </div>
              <input type="hidden" hidden id="lon" name="lon" class="form-control input-lg" style="min-width: 300px; width: 300px;">

              <input type="hidden" hidden id="lat" name="lat" class="form-control input-lg" style="min-width: 300px; width: 300px;">

  <br/>
  <br/>

  <div class="form-group">
				<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Куда *: </label>
		   </div>
  <div class="form-group">
    <select class="form-control" id="sel2" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="kuda">
        @foreach($data['region'] as $item)

            <option value="{{ $item->id }}">{{ $item->name }}</option>

        @endforeach
      </select>
  </div>
  <br/>
  <br/>
  
  <div class="form-group ">
		<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Дата выезда*: </label>
   </div>
	<div class="form-group {{ $errors->has('data') ? 'has-error' : '' }}">
    <input type="datetime-local" class="form-control input-lg" id="area" name="data" placeholder="Введите дата выезда" style="min-width: 300px; width: 300px;">
        @if ($errors->has('data'))
            <span class="help-block">
                <strong>{{ $errors->first('data') }}</strong>
            </span>
        @endif
  </div>
  <br/><br/>
  
  <div class="form-group">
		<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Телефон*: </label>
   </div>
	<div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
    <input type="number" min="0" maxlength="1"  class="form-control input-lg" id="telephone" name="telephone" placeholder="Введите телефон" style="min-width: 300px; width: 300px;">
        @if ($errors->has('telephone'))
            <span class="help-block">
                <strong>{{ $errors->first('telephone') }}</strong>
            </span>
        @endif
  </div>
  <br/><br/>
  
  <div class="form-group">
		<label for="name" style=" min-width: 100px; text-align: right !important; margin-right: 15px; ">Заголовок*: </label>
   </div>
	<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <input type="text" class="form-control input-lg" id="name" name="title" placeholder="Введите заголовок" style="min-width: 300px; width: 300px;">
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
  </div>
  <br/><br/>
  
  <div class="form-group">
		<label for="email" style=" min-width: 100px; text-align: right !important; margin-right: 15px;">Описание*: </label>
   </div>
	<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <textarea class="form-control" id="comments" name="description" placeholder="Введите описание" rows="4" style="font-size: 18px; min-width: 300px; width: 300px;">

    </textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
  </div>
  <br/><br/>

          <div class="col-md-6">
              <button type="submit" class="btn btn-warning btn-lg" style="float: left;margin-left: 0px;">
                  <span class="glyphicon glyphicon-upload"></span> Опубликовать объявление!</button>
          </div>

    </form>
        <div class="col-md-4">
            <div id="map"></div>
        </div>
	</div>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="/js/selectRegion.js" ></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByJwl7oshtnOOyOeKfg8ZzkQxOVnVJ0Fs&callback=initMap"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>