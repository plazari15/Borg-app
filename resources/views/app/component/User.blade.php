<!-- BEGIN USER LOGIN DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="{{ url('uploads/'.$account->logo ?? '') }}" />
        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="page_user_profile_1.html">
                <i class="icon-user"></i> Minha Conta </a>
        </li>
        <li class="divider"> </li>
        <li>
            <a id="sair">
                <i class="icon-key"></i> Sair </a>
        </li>
    </ul>
</li>
<!-- END USER LOGIN DROPDOWN -->

<form action="{{ url('logout') }}" method="post" id="logout">
    {{ csrf_field() }}
</form>

