<!-- Page Header Start -->
<!--================================-->
<div class="page-header">
    <div class="search-form">
        <form action="#" method="GET">
            <div class="input-group">
                <input class="form-control search-input typeahead" name="search" placeholder="Type something..."
                    type="text" />
                <span class="input-group-btn"><span id="close-search"><i data-feather="x"
                            class="wd-16"></i></span></span>
            </div>
        </form>
    </div>
    <nav class="navbar navbar-default align-items-center">
        <!--================================-->
        <!-- Brand and Logo Start -->
        <!--================================-->
        <div class="navbar-header">
            <ul class="list-inline mb-0">
                <!-- Mobile Toggle and Logo -->
                <li class="list-inline-item">
                    <a class="hidden-md hidden-lg waves-effect tooltip-primary" href="javascript:void(0)"
                        id="sidebar-toggle-button" >
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="8"
                                    height="16" />
                                <path
                                    d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </a>
                </li>
                <!-- PC Toggle and Logo -->
                <li class="list-inline-item">
                    <a class="hidden-xs hidden-sm waves-effect tooltip-primary" href="javascript:void(0)"
                        id="collapsed-sidebar-toggle-button" >
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="8"
                                    height="16" />
                                <path
                                    d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ Brand and Logo End -->
        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->
        <div class="header-right">
            <ul class="list-inline justify-content-end mb-0 d-flex align-items-center">

                <!-- Profile Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown ml-2">
                    <a href="" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                                <img src="{{ asset('images/th (3).jpg') }}" class="img-fluid wd-30 ht-30 rounded-circle"
                                                            alt="">

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">

                                        <img src="{{ asset('images/th (3).jpg') }}"  class="img-fluid wd-40 ht-40 rounded-circle"
                                                                    alt="">
                                </div>
                                <div class="profile-text">
                                    <h6></h6>
                                </div>
                            </div>
                            <a href="{{ route('cms.auth-cms.logout') }}" class="dropdown-item d-flex align-items-center"><span
                                    data-feather="log-out" class="wd-16 ht-16 mr-2"></span>Log out</a>
                        </div>
                    </div>
                </li>
                <!-- Profile Dropdown End -->
            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>

</div>
<!--/ Page Header End -->
<!--================================-->
