<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
    <div style="width:450px; height: 268px; margin: auto auto; margin-top: 200px; text-align: center; padding-left: 20px;">

        <div class="panel panel-default" style="background: white;">
            <div class="panel-heading">
                <h2 style="color: #42c2f4 ; font-size:20px; font-weight:bold;">Вход</h2>
            </div>
            <div class="panel-body">
                <form class="new_operator" id="new_operator" action="/sign_in" accept-charset="UTF-8" method="post">
                    {{ Form::token() }}
                    <div class="form-group">
                        <input required="required" placeholder="Введите телефон номер" maxlength="12" class="form-control input-lg" style="background: url(/images/users) no-repeat scroll 7px 7px; padding-left:38px;" type="text" value="" name="phone" id="operator_email" />
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" required="required" placeholder="Введите пароль" style="background: url(/images/password) no-repeat scroll 7px 7px; padding-left:38px;" type="password" name="password" id="operator_password" />
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary form-control btn-md">Войти</button>
                    </div>
                    <div class="col-lg-6">
                        <a type="button" href="/registration" class="btn btn-default form-control btn-md"><span>Регистрация</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</html>


