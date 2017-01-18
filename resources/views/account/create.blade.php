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
                <!-- Mensagem para a primeira vez que acessa o sistema  -->
                    @if(Session::has('firstMessage'))
                        <div class="note note-info">
                            Antes de utilizar o sistema, você precisa preencher os dados de sua empresa abaixo!
                        </div>
                    @endif
                <!-- fim dessa mensagem -->
                    @if(Session::has('success'))
                        <div class="alert alert-success"><span
                                    class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                        </div>
                    @endif
                    <div class="portlet-body">
                        <div class="m-grid">
                            <div class="m-grid-col m-grid-col-md-8 m-grid-col-middle">
                                <div class="form-body">
                                    {!! Form::open(['url' => 'dashboard/account', 'files' => true]) !!}
                                    <h3>Dados Pessoais</h3>
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name', 'Nome Completo') }}
                                        {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('email', 'Endereço de Email') }}
                                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                                    </div>

                                    <h4>Dados empresáriais</h4>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('cnpj', 'CNPJ') }}
                                        {{ Form::text('cnpj', $user->cnpj  ?? '', ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('social', 'Razão Social') }}
                                        {{ Form::text('social', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('website', 'Site') }}
                                        {{ Form::text('website', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('tel', 'Telefone') }}
                                        {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'mask_telphone']) }}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('occupation', 'Área de Atuação') }}
                                        {{ Form::select('occupation', ['fornecedor' => 'Fornecedor', 'comprador' => 'Comprador',  'cooperativa' => 'Cooperativa'], $user->account->occupation ?? null,  ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {{ Form::label('area', 'Área de Atuação') }}
                                        {{ Form::select('area[]', [
                                            'produtor rural' => 'Produtor Rural',
                                            'industria' => 'Indústria',
                                            'atacado' => 'Atacado',
                                            'varejo' => 'Varejo',
                                            'restaurante' => 'Restaurante',
                                            'hotel' => 'Hotel',
                                            'outros' => 'Outros'
                                        ], $user->account->area ?? null,  ['class' => 'form-control', 'multiple']) }}
                                    </div>

                                    <h4>Endereço</h4>
                                    <div class="form-group col-md-12">
                                        {{ Form::label('cep', 'CEP') }}
                                        {{ Form::text('cep', null, ['class' => 'form-control', 'id' => 'cep']) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('address', 'Endereço') }}
                                        {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'endereco']) }}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {{ Form::label('number', 'Número') }}
                                        {{ Form::text('number', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-2">
                                        {{ Form::label('complement', 'Comlemento') }}
                                        {{ Form::text('complement', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-3">
                                        {{ Form::label('district', 'Bairro') }}
                                        {{ Form::text('district', null, ['class' => 'form-control', 'id' => 'bairro']) }}
                                    </div>

                                    <div class="form-group col-md-3">
                                        {{ Form::label('city', 'Cidade') }}
                                        {{ Form::text('city', null, ['class' => 'form-control', 'id' => 'cidade']) }}
                                    </div>

                                    <div class="form-group col-md-3">
                                        {{ Form::label('state', 'Estado') }}
                                        {{ Form::text('state', null, ['class' => 'form-control', 'id' => 'uf']) }}
                                    </div>

                                    <div class="form-group col-md-3">
                                        {{ Form::label('country', 'País') }}
                                        {{ Form::text('country', null, ['class' => 'form-control', 'id' => 'pais']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col m-grid-col-md-4 ">
                                <h3>Arquivos referentes a sua empresa</h3>

                                <div class="form-group col-md-12">
                                    {{ Form::label('logomarca', 'Logo (.jpg, .png, .gif)') }}
                                    {{ Form::file('logomarca',  ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-12">
                                    {{ Form::label('certificado', 'Certificado (.pdf, .jpg)') }}
                                    {{ Form::file('certificado',  ['class' => 'form-control']) }}
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
                                    <button type="submit" class="btn green-jungle btn-block">Salvar Alterações</button>
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
    <script src="{{ URL::asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/buscaCep.js') }}" type="text/javascript"></script>
@endsection
