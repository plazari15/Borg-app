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
            <div class="note note-info">
                <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
            </div>
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
                                                    {{ Form::text('cnpj', $account->cnpj, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('social', 'Razão Social') }}
                                                    {{ Form::text('social', $account->social, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('website', 'Site') }}
                                                    {{ Form::text('website', $account->website, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('occupation', 'Área de Atuação') }}
                                                    {{ Form::select('occupation', ['1' => 'Fornecedor', '2' => 'Produtor',  '3' => 'Vendedor'], null,  ['class' => 'form-control']) }}
                                                </div>

                                                <h4>Endereço</h4>
                                                <div class="form-group col-md-12">
                                                    {{ Form::label('cep', 'CEP') }}
                                                    {{ Form::text('cep', $account->cep, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-6">
                                                    {{ Form::label('address', 'Endereço') }}
                                                    {{ Form::text('address', $account->address, ['class' => 'form-control']) }}
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
                                                    {{ Form::text('district', $account->district, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('city', 'Cidade') }}
                                                    {{ Form::text('city', $account->city, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('state', 'Estado') }}
                                                    {{ Form::text('state', $account->state, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-3">
                                                    {{ Form::label('country', 'País') }}
                                                    {{ Form::text('country', $account->country, ['class' => 'form-control']) }}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-4 ">
                                        <h3>Arquivos referentes a sua empresa</h3>

                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                @if(!empty($account->logo))
                                                    <img src="{{ url('uploads/'.$account->logo) }}" alt="{{ $user->name }}" style="height: 180px; width: 100%; display: block;" data-src="../assets/global/plugins/holder.js/100%x180">
                                                @else
                                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5NCIgaGVpZ2h0PSIxODAiPjxyZWN0IHdpZHRoPSI5NCIgaGVpZ2h0PSIxODAiIGZpbGw9IiNlZWUiLz48dGV4dCB0ZXh0LWFuY2hvcj0ibWlkZGxlIiB4PSI0NyIgeT0iOTAiIHN0eWxlPSJmaWxsOiNhYWE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXNpemU6MTJweDtmb250LWZhbWlseTpBcmlhbCxIZWx2ZXRpY2Esc2Fucy1zZXJpZjtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45NHgxODA8L3RleHQ+PC9zdmc+" alt="100%x180" style="height: 180px; width: 100%; display: block;" data-src="../assets/global/plugins/holder.js/100%x180">
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                {{ Form::label('logomarca', 'Logo (.jpg, .png, .gif)') }}
                                                {{ Form::file('logomarca',  ['class' => 'form-control']) }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="col-md-8">
                                                {{ Form::label('certificado', 'Certificado (.pdf, .jpg)') }}
                                                {{ Form::file('certificado',  ['class' => 'form-control']) }}
                                            </div>
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