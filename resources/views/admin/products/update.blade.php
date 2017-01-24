@extends('app.app')
@section('title', 'Editar Produto')
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
                        <a href="{{ url('/dashboard/admin/produtos/'.$product->id) }}">Produtos</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Editar Produto</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <!-- Aqui pode ir algo que queremos na lateral -->
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Editar Produto
                <small>Edite produtos</small>
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
                                    <div class="m-grid-col m-grid-col-md-12 m-grid-col-middle">
                                        <div class="form-body">
                                            {!! Form::open(['url' => 'dashboard/admin/products/edit/'.$product->id, 'files' => true]) !!}
                                                <div class="form-group col-md-12">
                                                    {{ Form::label('title', 'Nome') }}
                                                    {{ Form::text('title', $product->title, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('measure', 'Tipo de Peso') }}
                                                    {{ Form::select('measure', ['kilos' => 'Kilo', 'gramas' => 'Gramas',  'toneladas' => 'Toneladas'], $product->measureAd,  ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('title', 'Descrição') }}
                                                    {{ Form::textarea('description', $product->description, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group col-md-12">
                                                    {{ Form::label('foto', 'Foto') }}
                                                    {{ Form::file('foto',  ['class' => 'form-control']) }}
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
@section('page-scripts')
    <script src="{{ URL::asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/buscaCep.js') }}" type="text/javascript"></script>
@endsection
