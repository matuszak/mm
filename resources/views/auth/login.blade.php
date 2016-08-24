@extends('layouts.portal.app')

@section('content')
    <div class="container">
            <section class="sessao-login width-60">
                <div class="sessao-login-top azulClaro fontBranca">
                    <h1>
                        Login
                    </h1>
                </div>
                <div class="sessao-login-corpo">

                    <form class="sessao-login-form" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="text-uppercase">E-mail</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-login"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail para login">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="text-uppercase">Senha</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-login"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Sua senha">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                @endif
                            </div>
                                </div>
                        </div>


                        <div class="form-group">
                                <a class="a-form-login btn" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
                                <button type="submit" class="btn btn-custom-login">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
@endsection
