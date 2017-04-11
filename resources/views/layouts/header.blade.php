<div class="row">
    <div class="col-md-12" style="margin-top:15px;">

        <nav class="navbar navbar-inverse" style="border-radius: 0px; background-color: #2b4756; border-color: #2b4756;">
            <div class="container-fluid">
                <div class="navbar-header" style="margin-right: 30px;">
                    <a href="{{ route('index') }}" style="line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">
                        <img src="/img/logo.png" alt="www.перевозка.kg" style="min-height: 70px; height: 70px;">
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    @if(isset($active) && $active == $data['cat1'][0]->id)
                        <li class="active">
                            <a class="" href="{{ route('freight',$data['cat1'][0]->id) }}" style="font-size: 18px; line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Груз
                            </a>
                        </li>
                    @else
                        <li class="">
                            <a class="" href="{{ route('freight',$data['cat1'][0]->id) }}" style="color: #fff; font-size: 18px; line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Груз
                            </a>
                        </li>
                    @endif
                    @if (isset($active) && $active == $data['cat1'][1]->id)
                    <li class="active">
                        <a class="" href="{{ route('freight',$data['cat1'][1]->id) }}" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Транспорт
                           </a>
                    </li>
                        @else
                            <li class="">
                                <a class="" href="{{ route('freight',$data['cat1'][1]->id) }}" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Транспорт
                                </a>
                            </li>
                        @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;"><img src="/img/google_play.png" style="height: 50px;"></a></li>
                    <li><a href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;"><img src="/img/app_store.png" style="height: 50px;"></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style=" color: #fff; font-size: 16px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">О нас
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html" style=" font-size: 16px;">О нас</a></li>
                            <li><a href="send_comment.html" style="font-size: 16px;">Оставь свой отзыв</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('add_item',3) }}" style="color: #fff; font-size: 16px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">+Добавить груз</a></li>
                    <li><a href="{{ route('add_item',4) }}" style="color: #fff; font-size: 16px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">+Добавить транспорт</a></li>
                    @if(auth()->guard('my_user')->check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff; font-size: 16px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">{{ auth()->guard('my_user')->user()->name }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html" style=" font-size: 16px;">Кабинет</a></li>
                                <li><a href="{{ url('/sign_out') }}" style="font-size: 16px;">Выход</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

    </div>
</div>