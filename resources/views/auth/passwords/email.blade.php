@extends('layouts.portal.app')

<!-- Main Content -->
<body class="bg-remember">
@section('content')
<div class="container">

    <div class="form-remember">
        <div class="panel panel-remember">
            <div class="panel-heading text-uppercase">Relembrar senha</div>
            <div class="panel-body-r">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-r" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label text-uppercase">e-Mail</label>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="e-mail que será enviado a senha...">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn-remember">
                                <i class="fa fa-btn fa-envelope"></i> Enviar link de recuperação de senha
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
</body>