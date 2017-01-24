@extends('app.app')
@section('title', 'Minha Conta')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper" id="app">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url('/dashboard') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Mercado</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <a href="{{ url('dashboard/mercado/cart') }}"><button class="btn blue"><i class="fa fa-shopping-cart"></i>  Ver Carrinho </button></a>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> {{ $item->product->title ?? $item->title }}
                <small>{{ str_limit( ($item->product->description ?? $item->description), 120 ) }}</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <!-- Formulário -->
            <div class="row">
                <div class="col-md-12">
                    @if(count($errors) > 0)
                        <div class="note note-danger">
                            <ul>
                                @foreach($errors->all() as $erro)
                                    <li>{{ $erro }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success green-jungle"><span
                                    class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                    @endif
                    <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-4">
                                        <img src="{{ $item->product->photo ?? $item->photo }}" style="width: 100%">
                                </div>

                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <h1>{{ $item->product->title ?? $item->title }}</h1><small><b>Código: {{ $item->codigo }}</b></small>
                                    </div>
                                    <div class="col-md-12">
                                        <p><b>Fornecido por:</b> {{ $item->user->account->social }}</p>
                                        @if($item->user->account->certificate)
                                            <b><a target="_blank" href="/uploads/{{ $item->user->account->certificate }}">Certificado de Produtor orgânico</a></b>
                                        @endif
                                    </div>

                                    <div class="col-md-4" style="background-color: #ccc; margin-top: 3%;">
                                        <p>Valor por item:</p>
                                        <h2>R$ {{ $item->price }}</h2>
                                    </div>

                                    <div class="col-md-2" style="margin-top: 3%; margin-left: 3%;">
                                        <p>Estoque:</p>
                                        <h3><b>{{ $item->quantity ?? $item->weight }}</b> {{ $item->measure }} </h3>
                                    </div>

                                    <div class="col-md-2" style="margin-top: 3%; margin-left: 3%;">
                                        <p>Disponibilidade em:</p>
                                        <h3 class="{{ $item->status == 'disponivel' ? 'font-green-jungle' : '' }}"><b>{{ $item->status == 'disponivel' ?  $item->status : $item->available_date }}</b></h3>
                                    </div>

                                    <div class="col-md-3" style="margin-top: 3%; margin-left: 1%;">
                                        <form action="{{ url('dashboard/mercado/add') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                                            <input type="number" class="form-control" name="qtd" placeholder="quantidade" min="0" max="{{ $item->quantity }}">
                                            <button type="submit" class="btn blue btn-lg btn-block" style="margin-top: 3%;">COTAR</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <h3>{{ $item->product->description ?? $item->description }}</h3>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Fechou a linha -->


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection


@section('page-scripts')
    <script src="{{ URL::asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/buscaCep.js') }}" type="text/javascript"></script>
@endsection

@section('noty')
    <script src="{{ URL::asset('js/broadcast/Noty.js') }}" type="text/javascript"></script>
@endsection