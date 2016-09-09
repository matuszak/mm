@extends('layouts.portal.app')

@section('content')
        <div class="container-fluid">
                <div class="slider_wrapper">
                    <div id="camera_wrap" class="">
                        <div data-src="{{ url('assets/all/imgs/empresas/Redes-sociais-para-empresas.png') }}">

                            <div class="carousel-caption"><b>The text of your html element</b></div>
                        </div>
                        <div data-src="{{ url('assets/all/imgs/empresas/mba.jpg') }}"> </div>
                        <div data-src="{{ url('assets/all/imgs/empresas/empresa.png') }}"> </div>
                    </div>
                </div>
        </div>
    <!--Container Open -->
    <div class="container">
        <div class="bg-parallax-slide">
            <section class="padding-50 text-center slide">
                <h1 class="titulo-slide">NAVEGAÇÃO</h1>
                <p class="descricao_slide">Seu conteúdo dinâmico na internet em mais lugares venha fazer parte da nossa rede e tenha tudo da mais melhor forma na internet</p>
            </section>
        </div>
    </div>
    <!--Container Close -->
@endsection