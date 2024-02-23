<div class="page-sidebar">
    <div class="logo">
        <a id="sidebar-toggle-button-close"><i class="wd-20 ht-20" data-feather="x"></i> </a>
    </div>
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="menu-label"></li>
                <li class="user {{ Request::routeIs('cms.user.index') ? 'active' : '' }}{{ Request::routeIs('cms.user.profile') ? 'active' : '' }}{{ Request::routeIs('cms.user.store') ? 'active' : '' }}">
                    <a href="{{ route('cms.user.index') }}">
                        <i class="fa  fa-users mr-2"></i>
                        <span>User management</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('cms.room.index') ? 'active' : '' }}{{ Request::routeIs('cms.room.edit') ? 'active' : '' }}{{ Request::routeIs('cms.room.create') ? 'active' : '' }}">
                    <a href="{{ route('cms.room.index') }}">
                        <i class="fa fa-envelope-open-o mr-2"></i>
                        <span>Room management</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('cms.setting.index') ? 'active' : '' }}">
                    <a href="{{ route('cms.setting.index') }}">
                        <div class="mr-2 fa fa-asterisk"></div>
                        <span class="mt-5">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
</div>
