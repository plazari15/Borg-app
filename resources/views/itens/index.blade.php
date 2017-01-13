@extends('app.app')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" id="app">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Itens</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="actions ">
                        <a href="{{ url('dashboard/itens/create') }}"><button class="btn blue">Criar novo Item</button></a>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Meus Produtos
                <small>Edite e cadastre novos proutos seus</small>

            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="alert alert-info" v-if="results.length <= 0">
                        Nenhum produto encontrado
                    </div>
                    <div class="table-scrollable" v-if="results.length > 0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th> Foto</th>
                                <th> Nome</th>
                                <th>  Medida de referência</th>
                                <th> Bom para</th>
                                <th> Tipo</th>
                                <th> Peso / Quantidade</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr v-for="itens in results">
                                        <td>[[ itens.photo ]]</td>
                                        <td>[[ itens.product != null ? itens.product.title : itens.title]]</td>
                                        <td>[[ itens.product != null ? itens.product.measure : 'N/D']]</td>
                                        <td>[[ itens.goodto]]</td>
                                        <td>[[ itens.type ]]</td>
                                        <td>[[ itens.quantity != null ? itens.quantity : itens.weight ]]</td>
                                        <td><i @click="DeleteItens(itens.id)" class="fa fa-trash"></i> </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection

@section('vue')
    <script>
        var api_token = "{{ Auth::user()->api_token }}";
        var url_edit = "{{ url('dashboard/admin/products/edit') }}/";
    </script>
    <script src="{{ URL::asset('js/vue/Itens/Itens.js') }}" type="text/javascript"></script>
@endsection