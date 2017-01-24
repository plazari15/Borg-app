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
            <h1 class="page-title"> Mercado
                <small>Aqui é o Mercado Geral do Borg</small>
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
                        <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                @foreach($itens as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        @if($item->product)
                                            <a href="{{ url('dashboard/mercado/produto/'.$item->product->id) }}">
                                        @else
                                            <a href="{{ url('dashboard/mercado/item/'.$item->id) }}">
                                        @endif
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    @if($item->product)
                                                        <img src="{{ $item->product->photo }}" />
                                                    @else
                                                        <img src="{{ $item->photo }}" />
                                                    @endif
                                                    <div class="mt-overlay">
                                                    </div>
                                                </div>
                                                <div class="mt-card-content">
                                                    <h3 class="mt-card-name">{{ $item->product->title ?? $item->title }}</h3>
                                                    <p class="mt-card-desc font-grey-mint">{{ str_limit( ($item->product->description ?? $item->description) , 80) }}</p>


                                                </div>
                                            </div>
                                        </a>
                                </div>
                                    @endforeach
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