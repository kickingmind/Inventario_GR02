<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.css') !!}
</head>
<body style="background-color: #DBDBDB;">
	<div class="container">
    <div class="row">
        <hr><br>
        <div class="col-md-8 col-md-offset-2">
            <br>
            <div  class="panel panel-default">
                <div style="background-color: #8bc34a; color: #FFFFFF;" class="panel-heading">Acceso</div>

                <div class="panel-body">
                   <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                       {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Ingresar
                                </button>

                               <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidó su contraseña?
                                </a> -->
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>