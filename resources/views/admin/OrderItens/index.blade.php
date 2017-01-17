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
                        {{--<a href="{{ url('dashboard/admin/produtos/create') }}"><button class="btn blue">Criar novo produto</button></a>--}}
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Listagem de Compras
                <small>Veja todos os pedidos gerados pelos clientes</small>

            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="alert alert-info" v-if="results.length <= 0">
                        Nenhum pedido localizado
                    </div>
                    <div class="table-scrollable" v-if="results.length > 0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th> Cliente</th>
                                <th> Data do pedido</th>
                                <th> Qtd. Itens</th>
                                <th> Status</th>
                                <th> Atualizar Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr v-for="order in results">
                                        <td>#[[ order.id ]]</td>
                                        <td>[[ order.user.name ]]</td>
                                        <td>[[ order.created_at ]]</td>
                                        <td>[[ order.order_itens.length ]]</td>
                                        <td><span class="label" v-bind:class="[[ order.status.label ]]">[[ order.status.body ]]</span></td>
                                        <td><select class="" v-model="status" @change="UpdateStatus(order.id)">
                                                <option value="aguardando">Aguardando</option>
                                                <option value="processando">Processando</option>
                                                <option value="realizando pedidos">Realizando Pedidos</option>
                                                <option value="aguardando recebimento">Aguardando Recebimento</option>
                                                <option value="recebido">Recebido</option>
                                                <option value="preparando envio">Preparando Envio</option>
                                                <option value="enviado">Enviado</option>
                                            </select> <i class="fa fa-spinner fa-spin" id="status" style="display: none;" aria-hidden="true"></i></td>
                                        <td><a v-bind:href="GenerateLink(order.id)">Editar</a></td>
                                        <td><i class="fa fa-trash" @click="DeleteProduct(order.id)"></i></td>
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
    <script src="{{ URL::asset('js/vue/Admin/Consolidation/Consolidation.js') }}" type="text/javascript"></script>
@endsection