@extends('layouts.portal.app')

<!-- Main Content -->
@section('content')
<div class="container-fluid">
<section class="sessao-amarelo">
    <div class="sessao-amarelo-top fontBranca amareloEscuro"><h1>Recuperação de senha</h1></div>
           <div class="sessao-amarelo-corpo">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="sessao-amarelo-form" role="form" method="POST" action="{{ url('/password/email') }}">
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
                        <button type="submit" class="btn-custom-amarelo">
                            <i class="fa fa-btn fa-envelope"></i> Enviar link de recuperação de senha
                        </button>
                    </div>
                </form>
            </div>

</section>
</div>
@endsection
