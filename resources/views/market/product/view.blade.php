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
            <h1 class="page-title"> {{ $product->title }}
                <small>{{ str_limit( ($product->description), 120 ) }}</small>
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
                                        <img src="{{ $product->photo }}" style="width: 100%">
                                </div>

                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <h1>{{ $product->title }}</h1>
                                    </div>

                                    <div class="col-md-12">
                                        @foreach($product->itens as $itens)
                                            <a href="{{ url('dashboard/mercado/'.$itens->user->account->id) }}">
                                                <img src="/uploads/{{ $itens->user->account->logo }}" width="50">
                                            </a>

                                        @endforeach
                                    </div>


                                    <div class="col-md-4" style="background-color: #ccc; margin-top: 3%;">
                                        <p>Valor por item:</p>
                                        <h2>R$ {{ min($prices) }} ~ R$ {{ max($prices) }} </h2>
                                    </div>

                                    <div class="col-md-3" style="margin-top: 3%; margin-left: 1%;">
                                        <form action="{{ url('dashboard/mercado/add') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="item_id" value="{{ $product->id }}">
                                            <input type="number" class="form-control" name="qtd" placeholder="quantidade" min="0" max="">
                                            <button type="submit" class="btn blue btn-lg btn-block" style="margin-top: 3%;">COTAR</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <h3>{{ $product->description }}</h3>
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