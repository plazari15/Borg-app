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
            <h1 class="page-title"> Blank Page Layout
                <small>blank page layout</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="note note-info">
                <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body">
                        <div class="m-grid">
                            <div class="m-grid-col m-grid-col-md-8 m-grid-col-middle m-grid-col-center">Row 1, Column 1</div>
                            <div class="m-grid-col m-grid-col-md-4 m-grid-col-middle m-grid-col-center">Row 1, Column 2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection