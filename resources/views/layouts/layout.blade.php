<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Найти попутчика в ONLINETAXI.KG</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
</head>
<body>
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-image: url(img/main_fon.jpg); background-size: cover; min-height: 720px;">
    <div style="min-width: 100%; min-height: 720px; background: rgba(43,71,86,.55);">
        <div class="row">
            <div class="col-md-12" style="margin-top:15px;">

                <nav class="navbar navbar-inverse" style="border-radius: 0px; background-color: #2b4756; border-color: #2b4756;">
                    <div class="container-fluid">
                        <div class="navbar-header" style="margin-right: 30px;">
                            <a href="{{ route('index') }}" style="line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">
                                <img src="img/logo.png" alt="www.onlinetaxi.kg" style="min-height: 70px; height: 70px;">
                            </a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="dropdown active">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #335d73; color: #fff; font-size: 18px; line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Межгород
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="category_grid.html" style="font-size: 18px;">Поиск водителя</a></li>
                                    <li><a href="category_grid.html" style="font-size: 18px;">Поиск пассажира</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">По городу
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="category_grid.html" style="font-size: 18px;">Поиск водителя</a></li>
                                    <li><a href="category_grid.html" style="font-size: 18px;">Поиск пассажира</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">Грузовые
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($data['cat2'] as $item)
                                        <li><a href="category_grid.html" style="font-size: 18px;">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;"><img src="img/google_play.png" style="height: 50px;"></a></li>
                            <li><a href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;"><img src="img/app_store.png" style="height: 50px;"></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">О нас
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html" style="font-size: 18px;">О нас</a></li>
                                    <li><a href="send_comment.html" style="font-size: 18px;">Оставь свой отзыв</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('add_item') }}" style="color: #fff; font-size: 18px;line-height: 80px; height: 80px;padding-top: 0px; padding-bottom:0px;">+Добавить объявление</a></li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

        @yield('content1')
    </div>
</div>
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #06d66e;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 60px; margin-bottom: 60px; text-align: center;">
            <p style="font-size: 30px; color: #fff; font-weight: 700;">ONLINE-TAXI - НАЙТИ ПОПУТЧИКА</p>
            <p style="font-size: 25px; color: #fff; font-weight: 400; margin-bottom: 40px; font-family: OpenSans-Semibold;">с высоким качеством сервиса и возможностью вызова:</p>
            <div class="col-md-4" style="text-align: center;">
                <img src="img/icon_phone.png" style="height: 83px;"/><br/>
                <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">По номеру  1744, 0705 17 44 00, 0775 17 44 00, 0555 17 44 00</p>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="img/icon_message.png" style="height: 83px;"><br/>
                <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Через СМС 1744, 0705 17 44 00, 0775 17 44 00, 0555 17 44 00</p>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="img/icon_app.png" style="height: 83px;"><br/>
                <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Через мобильное приложение ONLINE-TAXI</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-image: url(img/main_fon.jpg); background-size: cover; min-height: 720px;">
    <div style="min-width: 100%; min-height: 720px; background: rgba(43,71,86,.55);">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 60px; text-align: center;">
                <p style="font-size: 30px; color: #fff; font-weight: 700; margin-bottom: 40px;">ЦИФРЫ И ФАКТЫ О ONLINE-TAXI</p>
                <div class="col-md-3" style="text-align: center;">
                    <img src="img/icon_users.png" style="height: 83px;"/><br/>
                    <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">1250 пользователей</p>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <img src="img/icon_routes.png" style="height: 83px;"><br/>
                    <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">834 активных маршрутов</p>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <img src="img/icon_calendar.png" style="height: 83px;"><br/>
                    <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Запуск с января 2017</p>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <img src="img/icon_like.png" style="height: 83px;"><br/>
                    <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Сервис абсолютно бесплатный</p>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-top: 80px;">
                <div class="col-md-6" style="min-height: 400px; text-align: center;">
                    <p style="font-size: 30px; color: #fff; font-weight: 600;">Мобильные приложения</p>
                    <p style="color: #fff; font-size: 21px; font-family: OpenSans-Semibold; line-height: 21px; margin-top: 25px; margin-bottom: 25px;">
                        Весь функционал сервиса на смартфонах на базе Android и iOS.<br/><br/>
                        И самое главное - возможность видеть местоположение своего попутчика!<br/><br/>
                        Ищите попутчиков, советуйте друзьям и вместе мы сделаем передвижение по любимому городу приятным времяпровождением.
                    </p>
                    <a href="#"><img src="img/google_play.png" style="margin-right: 5px; width: 152px; hight: 81px;"/></a>
                    <a href="#"><img src="img/app_store.png" style="width: 152px; hight: 81px;"/></a>
                </div>
                <div class="col-md-6" style="min-height: 400px; text-align: center;">
                    <img src="img/smart1.png" style="width: 200px; height: 385px; margin-right: 5px;">
                    <img src="img/smart2.png" style="width: 200px; height: 385px;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #fff;">
        <div class="row">
            <div class="col-md-12" style="margin-top: 40px; margin-bottom: 40px;">
                <div class="col-md-4" style="text-align: right;">
                    <img src="img/logo1.png" style="width: 100%;">
                </div>
                <div class="col-md-8" style="text-align: left;">
                    <p style="font-size: 40px; color: #000; font-weight: 600;">Online Taxi — <span style="font-weight: 400;">мобильное приложение для заказа</span> такси в Бишкеке</p>
                    <a href="#"><img src="img/google_play.png" style="margin-right: 5px; width: 152px;"/></a>
                    <a href="#"><img src="img/app_store.png" style="width: 152px;"/></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-image: url(img/main_fon.jpg); background-size: cover; min-height: 720px;">
        <div style="min-width: 100%; min-height: 720px; background: rgba(43,71,86,.55);">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="margin-top: 60px; text-align: center; margin-bottom: 40px;">
                    <p style="font-size: 30px; color: #fff; font-weight: 700; margin-bottom: 40px;">О СЕРВИСЕ</p>
                    <div class="col-md-6" style="text-align: left;">
                        <p style="font-size: 25px; color: #fff; font-weight: 600;">Сервис Online-Taxi для Вас если:</p>
                        <p style="color: #fff; font-size: 21px; font-family: OpenSans-Semibold; line-height: 21px; margin-top: 25px;">
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вам приходится каждый день добираться на работу или в университет на такси или в тесном и душном общественном транспорте<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вам скучно одному в машине и просто необходим интересный собеседник<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вы были бы рады разделить стоимость бензина с Вашими попутчиками<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вы хотите немного заработать, оказывая транспортные услуги<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вы хотите познакомиться с интересными людьми и найти новых друзей<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Вы заботитесь об экологии, рационализации и желаете помочь своему городу и другим людям.<br/><br/>

                            Регистрируйтесь, обновляйте свой профайл, добавляйте фотографии – как свои, так и своего авто; создавайте маршруты и ищите попутчиков!
                        </p>
                    </div>
                    <div class="col-md-6" style="text-align: left;">
                        <p style="font-size: 25px; color: #fff; font-weight: 600;">С помощью сервиса Online-Taxi вы сможете:</p>
                        <p style="color: #fff; font-size: 21px; font-family: OpenSans-Semibold; line-height: 21px; margin-top: 25px;">
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Найти попутчиков внутри города, между городами и даже в другую страну<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Найти попутчиков для ежедневных поездок либо в одну далекую поездку<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Найти подходящего вам пассажира или водителя<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Договориться с другим водителем чередоваться в поездках по одному и тому же маршруту<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Коллективно арендовать одно такси<br/><br/>
                            <img src="img/ok.png" style="width: 20px; margin-right: 10px;">Экономить и зарабатывать деньги<br/><br/>

                            Команда Online-Taxi постарается сделать все возможное для того, чтобы Вы нашли себе подходящего попутчика,
                            а сам процесс поиска был быстрым, интересным и очень удобным!
                        </p>
                    </div>
                </div>

                <div class="col-md-12" style="background-color: #06d66e; min-height: 50px; height: 50px;"></div>

                <div class="col-md-8 col-md-offset-2" style="margin-top: 40px; text-align: center;">
                    <p style="font-size: 30px; color: #fff; font-weight: 700; margin-bottom: 40px;">НАШИ УСЛУГИ</p>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_search.png" style="height: 100px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Поиск попутчиков</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_car.png" style="height: 100px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Вызов такси</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_moika.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Автомойка</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_sto.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Сто</p>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2" style="margin-top: 40px; text-align: center;">
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/kafe.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Кафе</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_salonkrasoty.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Парикмахерская</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/magazin.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Магазин автозапчастей</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_rentacar.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Аренда авто</p>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2" style="margin-top: 40px; text-align: center; margin-bottom: 60px;">
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_hotel.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Гостиница</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_sentr.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Учебный центр водителей такси</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_avtotransport.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Услуги автотранспорта</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="img/icon_consulting.png" style="height: 120px;"><br/>
                        <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Финансовые консультации</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-color: #06d66e;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 60px; margin-bottom: 60px; text-align: center;">
                <p style="font-size: 30px; color: #fff; font-weight: 700;">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</p>
                <p style="font-size: 25px; color: #fff; font-weight: 400; margin-bottom: 40px; font-family: OpenSans-Semibold;">Мы всегда улучшаем свой сервис и внимательно реагируем на ваши вопросы и предложения!</p>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-primary" style="margin-bottom: 30px;">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="font-size: 21px; color: #fff; font-weight: 600; font-family: OpenSans-Semibold; line-height: 21px; ">КАК ВЫЗВАТЬ ВОДИТЕЛЯ ONLINE-TAXI?</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body" style="font-size: 21px; color: #000; font-weight: 400; font-family: OpenSans-Semibold; line-height: 21px; ">Вызов водителей Online-Taxi доступен через приложение. Вам больше не нужно звонить оператору и
                                объяснять куда и как доехать. Если у Вас телефон на базе Android, просто загрузите приложение Online-Taxi с <a href="#">Play Market</a>.
                                Для пользователей iOS, приложение Online-Taxi в <a href="#">App Store</a></div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="font-size: 21px; color: #fff; font-weight: 600; font-family: OpenSans-Semibold; line-height: 21px; ">КАК СТАТЬ ВОДИТЕЛЕМ ONLINE-TAXI?</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse in">
                                <div class="panel-body" style="font-size: 21px; color: #000; font-weight: 400; font-family: OpenSans-Semibold; line-height: 21px; ">Всё больше и больше водителей присоединяются к нашей команде. Вы также можете стать водителей ONLINE-TAXI.</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="padding-left: 0px; padding-right: 0px; background-image: url(img/main_fon.jpg); background-size: cover;">
            <div style="min-width: 100%; background: rgba(43,71,86,.55);">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="margin-top: 80px; text-align: center;">
                        <p style="font-size: 30px; color: #fff; font-weight: 700; margin-bottom: 40px;">НАШИ ПАРТНЕРЫ</p>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_charba.png" style="height: 40px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Чарба.info</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_mobilnik.png" style="height: 100px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Мобилник.kg</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_kicb.png" style="height: 80px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">KICB</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_maralfm.jpg" style="height: 100px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Радио МаралFM</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2" style="margin-top: 40px; text-align: center; margin-bottom: 60px;">
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_ktrk.jpg" style="height: 80px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Телеканал Сентябрь</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_kupi.jpg" style="height: 45px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Газета Купи Продай</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_mediaprint.png" style="height: 80px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Медиа Print</p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <img src="img/icon_nebo12.png" style="height: 40px;"><br/>
                            <p style="color: #fff; font-size: 25px; font-family: OpenSans-CondBold; line-height: 25px; margin-top: 20px;">Небаком12</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding-left: 15px; padding-right: 15px; background-color: #2b4756;">
    <div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
        <div class="col-md-12" style="min-height: 50px; padding-top: 16px;">
            <span style="color: #fff; font-family: OpenSans-Semibold; font-size: 16px;">©2017 Onlinetaxi.kg Все права защищены.</span>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>