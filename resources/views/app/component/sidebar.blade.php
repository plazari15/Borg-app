<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
               <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start ">
                <a href="{{ url('/dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Ínicio</span>
                </a>
            </li>
            @if(Auth::user()->hasRole('admin'))
                <li class="heading">
                    <h3 class="uppercase">Contas</h3>
                </li>
                <li class="nav-item    active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Administrar Contas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{ url('dashboard/admin/account/all') }}" class="nav-link ">
                                <span class="title">Listar Todas</span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{ url('dashboard/admin/account/waiting') }}" class="nav-link ">
                                <span class="title">Aguardando aprovação</span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{ url('dashboard/admin/account/removed') }}" class="nav-link ">
                                <span class="title">Reprovadas</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="heading">
                    <h3 class="uppercase">Produtos</h3>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/admin/produtos') }}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">Administrar Produtos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/admin/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-handbag"></i>
                        <span class="title">Administrar Itens</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/admin/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-handbag"></i>
                        <span class="title">Pedidos de Consolidação</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->hasRole(['fornecedor']))
                <li class="nav-item">
                    <a href="{{ url('dashboard/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Meus Produtos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Leilão</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/mercado') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Mercado</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->hasRole(['comprador']))
                <li class="nav-item">
                    <a href="{{ url('dashboard/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Mercado</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/itens') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Leilão</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard/mercado') }}" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">Mercado</span>
                    </a>
                </li>
            @endif


        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->