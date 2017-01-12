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
                        <a href="{{ url('/dashboard/account') }}">Minha Conta</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Senha</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <!-- Aqui pode ir algo que queremos na lateral -->
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Alterar Senha
                <small>Esta é a tela de edição de sua conta, altere sua senha</small>
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
                        <div class="alert alert-success green-jungle"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                    @endif
                    <div class="portlet-body">
                        <div class="m-grid">
                            <div class="m-grid-col m-grid-col-md-8 m-grid-col-middle">
                                <div class="form-body">
                                    {!! Form::open(['url' => 'dashboard/account/password', 'files' => true]) !!}
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name', 'Senha') }}
                                        {{ Form::password('pass', ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('email', 'Repita a Senha') }}
                                        {{ Form::password('rpass', ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-body col-md-12">
                                        <button class="btn green-jungle btn-block">Salvar Alterações</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Fechou a linha -->
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection

@section('page-scripts')
    <script src="{{ URL::asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/buscaCep.js') }}" type="text/javascript"></script>
@endsection