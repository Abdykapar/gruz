<form action="{{ route('search') }}" method="get" id="form_search">
    <div class="col-md-10 col-md-offset-1" style="margin-top: 26px; margin-bottom: 10px;">

        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group">
                <select class="form-control" id="sel1" style="min-width:100%; min-height: 50px; font-size:18px;" name="category1" onchange="get_data()">
                    <option value="0">Все</option>
                    @foreach($data['cat1'] as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group" id="category">
                <select class="form-control" id="sel1" style="min-width:100%; min-height: 50px; font-size:18px;" name="type">
                    @foreach($data['type'] as $item)
                        <option  value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group">
                <input type="number" class="form-control" name="volume" min="0" placeholder="Объем" style="min-height: 50px">
            </div>
        </div>
        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group">
                <input type="date" class="form-control" id="theme" name="data" placeholder="Когда: 20.01.2017" style="min-width:100%; min-height: 50px;">
            </div>
        </div>
        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group">
                <select class="form-control" id="sel2" style="min-width:100%; min-height: 50px; font-size:18px;" name="otkuda">
                    <option disabled="disabled"  selected>Откуда</option>
                    @foreach($data['reg'] as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding-left:2px; padding-right: 2px;">
            <div class="form-group">
                <select class="form-control" id="sel2" style="min-width:100%; min-height: 50px; font-size:18px;" name="kuda">
                    <option disabled="disabled" selected>Куда</option>
                    @foreach($data['reg'] as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="map" id="search_map">
    </div>

    <div class="col-md-10 col-md-offset-1">
        <button type="button" onclick="unset()" class="btn btn-success btn-lg" style="float: right;"><span class="glyphicon glyphicon-search"></span> Найти</button>
        <a onclick="set()"><button type="button" class="btn btn-primary btn-lg" style="float: right; margin-right: 3px;"><span class="glyphicon glyphicon-map-marker"></span> Показать на карте</button></a>
    </div>
</form>
<script id="template" type="x-tmpl-mustache">
    <select class="form-control" id="sel1" style="min-width:100%; min-height: 50px; font-size:18px;" name="type" v-model="sortMethod({{ $data['type'] }})">
                 @{{ #. }}<option  value="@{{ id }}"> @{{ name }} </option>@{{ /. }}
              </select>
</script>
<script src="/js/mustache.min.js"></script>
<script>

    function get_data() {
        var id = $('#sel1').val();
        if (id != 0){
            $.get( "/api/category/"+id, function( data ) {
                $('#category').html(Mustache.render($('#template').html(),data));
            });
        }
        else {
            $.get( "/api/category/", function( data ) {
                console.log(id);
                $('#category').html(Mustache.render($('#template').html(),data));
            });
        }
    }
</script>