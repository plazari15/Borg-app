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
                    <!-- Aqui pode ir algo que queremos na lateral -->
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Meu Carrinho
                <small>Atualmente você tem {{ Cart::count() }} iten(s) no seu carrinho!</small>
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
                            <div class="col-md-8">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Item</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::content() as $cart)
                                            <tr>
                                                <th></th>
                                                <th>{{ $cart->name }}</th>
                                                <th>R$ {{ number_format($cart->price, 2, ',', ' ') }}</th>
                                                <th>{{ $cart->qty }}</th>
                                                <th>R$ {{ number_format($cart->subtotal, 2, ',', ' ') }}</th>
                                                <th><a href="{{ url('dashboard/mercado/delete/'.$cart->rowId) }}"><i class="fa fa-trash"></i></a></th>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-12" style="background-color: #ccc">
                                    <h2>Subtotal:</h2>
                                    <h3>R$ <b>{{ Cart::subtotal('2', ',', '.') }}</b></h3>
                                </div>

                                <div class="col-md-12" style="margin-top: 2%">
                                    <form action="">
                                        <button class="btn btn-lg blue btn-block">Finalizar Pedido</button>
                                    </form>
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


        @section('vue')
            <script src="{{ URL::asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"
                    type="text/javascript"></script>
            <script src="{{ URL::asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}"
                    type="text/javascript"></script>
            <script src="{{ URL::asset('assets/pages/scripts/form-input-mask.min.js') }}"
                    type="text/javascript"></script>
            <script src="{{ URL::asset('js/vue/cart.js') }}" type="text/javascript"></script>
        @endsection
