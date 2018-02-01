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
        <br><br><br><br>
        <div class="col-md-8 col-md-offset-2">
            <div  class="panel panel-default">
                <div style="background-color: #8bc34a; color: #FFFFFF;" class="panel-heading">Restablecer Contraseña</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Restablcer contraseña
                                </button>

                            </div>
                        </div>
                        <p style="color:#919191;">Ingrese el correo de inicio sesion, luego revise su correo y siga los pasos...</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
