@extends('admin.layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form class="form-inline" method="post" action="{{ route('edit_load',$load->id) }}">
                                {{ Form::token() }}
                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Категория *: </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel2" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="machine_id">
                                        @foreach($data['cat1'] as $item)
                                            @if ($load->machine->id == $item->id)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <br/>

                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Категория *: </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel2" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="type_id">
                                        @foreach($data['cat2'] as $item)
                                            @if ($load->type_id == $item->id)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <br/>

                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Откуда *: </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="otkuda" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="otkuda" onchange="showMap()">
                                        @foreach($data['region'] as $item)
                                            @if ($load->region_otkuda == $item->id)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label for="lat" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Latitude*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" readonly id="lat" name="lat"  style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <label for="lon" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Longitude*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" readonly id="lon" name="lon" style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Куда *: </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel2" style="min-width:300px; width: 300px; min-height: 50px; font-size:18px;" name="kuda">
                                        @foreach($data['region'] as $item)

                                            @if ($load->region_otkuda == $item->id)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Дата выезда*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="datetime-local" class="form-control input-lg" id="area" name="data" value="{{ $load->data }}" placeholder="Введите дата выезда" style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>

                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Телефон*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="telephone" name="telephone" value="{{ $load->telefon }}" placeholder="Введите телефон" style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <label for="volume" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Volume*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" id="volume" name="volume" value="{{ $load->volume }}" placeholder="Тонна" style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Заголовок*: </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="name" name="title" value="{{ $load->title }}" placeholder="Введите заголовок" style="min-width: 300px; width: 300px;">
                                </div>
                                <br/><br/>

                                <div class="form-group">
                                    <label for="email" style="min-width: 100px; text-align: right !important; margin-right: 15px;">Описание*: </label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="comments" name="description" placeholder="Введите описание" rows="4" style="font-size: 18px; min-width: 300px; width: 300px;">
                                        {{ $load->description }}
                                    </textarea>
                                </div>
                                <br/><br/>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-warning btn-lg" style="float: right;margin-right: 60px;">
                                        <span class="glyphicon glyphicon-upload"></span> Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div id="map" style="width: 400px; height: 450px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/selectRegion.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByJwl7oshtnOOyOeKfg8ZzkQxOVnVJ0Fs&callback=initMap"></script>
@endsection