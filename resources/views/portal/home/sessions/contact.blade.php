@extends('layouts.portal.app')

@section('content')
<div id="cafe">
        <!--Container Open -->
<div class="container">
    <section class="sessao-verde fontBranca">
        <h1>CONTATO</h1>
        <p>
            Através desta página você poderá entrar em contato com os responsáveis pela nossa empresa.
        </p>
        <p>
            Você também pode mandar um email direto sem precisar passar pelo formulário abaixo, caso ache mais conveniente.
            Mande email para: MM.BR@GMAIL.COM
        </p>
        <br>
    <section class="sessao-verde-top fontBranca verdeEscuro">
        <h1>
            Marcamos um cafezinho?
        </h1>
    </section>
    <!-- Fim topo do formulário -->
    <section class="sessao-verde-corpo">
        <form class="sessao-verde-form" role="form" method="POST" action="{{ url('#') }}">
            {{ csrf_field() }}

            <h1>Dados do contato</h1>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">Nome</label>
                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome" required="required">
            </div>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">Empresa</label>
                <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" placeholder="Nome da sua empresa" required="required">
            </div>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">Telefone</label>
                <input id="telefone" type="tel" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="(DDD) + Telefone" required="required">
            </div>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">E-mail</label>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="" required="required">
            </div>

            <h1>Dados da mensagem</h1>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">Assunto</label>
                <input id="subject" type="text" class="form-control" name="subject" value="Solicitar de contato" placeholder="" required="required">
            </div>
            <div class="form-group">
                <label for="subject" class="control-label text-uppercase">Mensagem</label>
                <textarea id="message" class="form-control" name="message" value="{{ old('message') }}" placeholder="Escreva sua mensagem" required="required" rows="10" cols="40"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-custom-verde">
                    <i class="fa fa-btn fa-envelope"></i> Enviar
                </button>
            </div>
        </form>
    </section><!-- endSection -->
    </section><!-- End Sessão Verde 1 -->
</div>
<!--Container Close -->
</div>
@endsection
