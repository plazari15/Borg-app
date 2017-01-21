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
                        <a href="#">Blank Page</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Page Layouts</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="actions ">
{{--                        <a href="{{ url('dashboard/admin/produtos/create') }}"><button class="btn blue">Criar novo produto</button></a>--}}
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Listagem de produtos
                <small>Esta listagem exibe os itens cadastrados no sistema. que estão disponíveis no mercado </small>

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
                                <th> Usuário</th>
                                <th> Nome</th>
                                <th> Medida</th>
                                <th> Produtos cadastrados</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr v-for="product in results">
                                        <td><img v-bind:src="[[ product.photo ]]" width="80"> </td>
                                        <td>[[ product.user.name ]] </td>
                                        <td>[[ product.title ]] </td>
                                        <td>[[ product.measure ]] </td>
                                        <td>0 </td>
                                        <td><a v-bind:href="GenerateLink(product.id)">Editar</a></td>
                                        <td><i class="fa fa-trash" @click="DeleteProduct(product.id)"></i></td>
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
        var url_edit = "{{ url('dashboard/admin/itens/') }}/";
    </script>
    <script src="{{ URL::asset('js/vue/Admin/Itens.js') }}" type="text/javascript"></script>
@endsection