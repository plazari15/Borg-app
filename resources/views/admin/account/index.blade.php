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
                    <!-- Aqui pode ir algo que queremos na lateral -->
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Listagem de Contas
                <small>Listando todas as contas cadastradas</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Nome</th>
                                <th> Email</th>
                                <th> CNPJ</th>
                                <th> Tipo</th>
                                <th> Criado em</th>
                                <th> Status</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr v-for="user in results">
                                        <td>[[ user.id ]]</td>
                                        <td>[[ user.user.name ]] </td>
                                        <td>[[ user.user.email ]] </td>
                                        <td>[[ user.cnpj ]] </td>
                                        <td>[[ user.occupation ]] </td>
                                        <td>[[ user.created_at ]] </td>
                                        <td>
                                            <span class="label label-sm" v-bind:class="[[ user.accountstatus.class ]]">[[ user.accountstatus.label ]]  </span>
                                        </td>
                                        <td><a v-bind:href="GenerateLink(user.id)">Editar</a></td>
                                        <td><i v-if="user.status == 0 || user.status == 2"  class="fa fa-play" aria-hidden="true"></i>
                                            <i v-if="user.status == 1" class="fa fa-pause"></i></td>
                                        <td><i v-if="user.status != 2" class="fa fa-stop"></i></td>
                                        <td><i class="fa fa-trash"></i></td>

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
        var url_edit = "{{ url('dashboard/admin/account/') }}/";
    </script>
    <script src="{{ URL::asset('js/vue/Admin/Accounts.js') }}" type="text/javascript"></script>
@endsection