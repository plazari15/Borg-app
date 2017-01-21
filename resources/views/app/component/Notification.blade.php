<!-- BEGIN NOTIFICATION DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
<!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
<!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
@if(count(Auth::user()->unreadNotifications) > 0))
    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
           data-close-others="true">
            <i class="icon-bell"></i>
            <span class="badge badge-default"> {{ count(Auth::user()->unreadNotifications) }} </span>
        </a>
        <ul class="dropdown-menu">
            <li class="external">
                <h3>
                    <span class="bold">{{ count(Auth::user()->unreadNotifications) }} </span> notificações pendentes</h3>
                {{--<a href="page_user_profile_1.html">view all</a>--}}
            </li>
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                    @foreach(Auth::user()->unreadNotifications as $notification)
                        <li>
                            <a href="{{ $notification->data['url'] }}">
                                <span class="time">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                <span class="details">
                                                                <span class="label label-sm label-icon label-success">
                                                                    <i class="fa fa-plus"></i>
                                                                </span> {{ $notification->data['message'] }}</span>
                            </a>
                        </li>
                        @endforeach
                </ul>
            </li>
        </ul>
    </li>
@endif
<!-- END NOTIFICATION DROPDOWN -->