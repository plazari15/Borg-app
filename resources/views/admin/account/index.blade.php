@extends('app.app')
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
                @if(count($accounts) > 0)
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
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $account)
                                    <tr>
                                        <td> {{ $account->id }}</td>
                                        <td> {{ $account->user->name }}</td>
                                        <td> {{ $account->user->email }}</td>
                                        <td> {{ $account->cnpj }}</td>
                                        <td> {{ $account->occupation }}</td>
                                        <td> {{ $account->user->created_at }}</td>
                                        <td>
                                            <span class="label label-sm {{ $account->status()['class'] }}"> {{ $account->status()['label'] }} </span>
                                        </td>
                                        <td><a href="{{ url('dashboard/admin/account/'.$account->id) }}">Editar</a></td>
                                        <td>STATUS</td>
                                    </tr>
                                @endforeach
                            @else
                               <div class="alert alert-danger">
                                   <p>Nenhuma conta foi encontrada!</p>
                               </div>
                            @endif
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