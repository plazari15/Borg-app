@extends('app.app')
@section('title', 'Minha Conta')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
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
                        <span>Minha Conta</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <!-- Aqui pode ir algo que queremos na lateral -->
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Minha Conta
                <small>Esta é a tela de edição de sua conta</small>
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

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                    @endif
                        <div class="portlet-body">
                            <div class="m-grid">
                                    <div class="m-grid-col m-grid-col-md-8 m-grid-col-middle">
                                        <div class="form-body">
                                            {!! Form::open(['url' => 'dashboard/admin/account/'.$account->id, 'files' => true]) !!}
                                                <h3>Dados Pessoais</h3>
                                                <div class="form-group col-md-12">
                                                    {{ Form::label('name', 'Nome Completo') }}
                                                    {{ Form::text('name', $account->user->name, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('email', 'Endereço de Email') }}
                                                    {{ Form::email('email', $account->user->email, ['class' => 'form-control']) }}
                                                </div>

                                                <h4>Dados empresáriais</h4>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('cnpj', 'CNPJ') }}
                                                    {{ Form::text('cnpj', $account->cnpj  ?? '', ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('social', 'Razão Social') }}
                                                    {{ Form::text('social', $account->social, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-6">
                                                    {{ Form::label('website', 'Site') }}
                                                    {{ Form::text('website', $account->websire, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-6">
                                                    {{ Form::label('tel', 'Telefone') }}
                                                    {{ Form::text('phone', $account->phone, ['class' => 'form-control', 'id' => 'mask_telphone']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('occupation', 'Área de Atuação') }}
                                                    {{ Form::select('occupation', ['fornecedor' => 'Fornecedor', 'comprador' => 'Comprador',  'cooperativa' => 'Cooperativa'], $account->user->occupation,  ['class' => 'form-control']) }}
                                                </div>

                                                <h4>Endereço</h4>
                                                <div class="form-group col-md-12">
                                                    {{ Form::label('cep', 'CEP') }}
                                                    {{ Form::text('cep', $account->cep, ['class' => 'form-control', 'id' => 'cep']) }}
                                                </div>

                                                <div class="form-group col-md-6">
                                                    {{ Form::label('address', 'Endereço') }}
                                                    {{ Form::text('address', $account->address, ['class' => 'form-control', 'id' => 'endereco']) }}
                                                </div>

                                                <div class="form-group col-md-4">
                                                    {{ Form::label('number', 'Número') }}
                                                    {{ Form::text('number', $account->number, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-2">
                                                    {{ Form::label('complement', 'Comlemento') }}
                                                    {{ Form::text('complement', $account->complement, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('district', 'Bairro') }}
                                                    {{ Form::text('district', $account->district, ['class' => 'form-control', 'id' => 'bairro']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('city', 'Cidade') }}
                                                    {{ Form::text('city', $account->city, ['class' => 'form-control', 'id' => 'cidade']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('state', 'Estado') }}
                                                    {{ Form::text('state', $account->state, ['class' => 'form-control', 'id' => 'uf']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('country', 'País') }}
                                                    {{ Form::text('country', $account->country, ['class' => 'form-control', 'id' => 'pais']) }}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-4 ">
                                        <h3>Arquivos referentes a sua empresa</h3>

                                        <div class="form-group col-md-12">
                                            <h4>Logomarca</h4>
                                            @if($account->logo)
                                               <img src="{{ url('uploads/'.$account->logo) }}" width="150">
                                            @else
                                                <div class="alert alert-info">Usuário não enviou uma logomarca</div>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <h4>Certificado de Produtos Organicos</h4>
                                            @if($account->certificate)
                                                <a href="{{ url('uploads/'.$account->certificate) }}" target="_blank">Clique para visualizar o certificado</a>
                                            @else
                                                <div class="alert alert-info">Usuário não enviou seu certificado</div>
                                            @endif
                                        </div>

                                    </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Fechou a linha -->

            <!-- botão -->
            <div class="row">
                <div class="col-md-12">
                        <div class="portlet-body">
                            <div class="m-grid">
                                    <div class="m-grid-col m-grid-col-md-8 m-grid-col-middle">
                                        <div class="form-body col-md-12">
                                                <button class="btn green-jungle btn-block">Salvar Alterações</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div><!-- fechou botão -->
            </div><!-- Fechou a linha -->





        </div>
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
