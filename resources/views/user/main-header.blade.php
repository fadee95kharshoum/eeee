<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}"><img src="{{ asset('backend/assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{ asset('backend/assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{ asset('backend/assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{ asset('backend/assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        @if (LaravelLocalization::getCurrentLocale() == 'en')
                            <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('backend/assets/img/flags/us_flag.jpg')}}" alt="img"></span>
                                <div class="my-auto">
                                    <strong class="mr-2 ml-2 my-auto">English</strong>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                                <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item d-flex ">
                                    <span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('backend/assets/img/flags/syria.png')}}" alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">Arabic</span>
                                    </div>
                                </a>
                            </div>
                        @else
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('backend/assets/img/flags/syria.png')}}" alt="img"></span>
                            <div class="my-auto">
                                <strong class="mr-2 ml-2 my-auto">Arabic</strong>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item d-flex ">
                                <span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('backend/assets/img/flags/us_flag.jpg')}}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">English</span>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
                </div>


                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><div class="main-avatar avatar-md offline">
                        {{ auth()->user()->name[0] }}
                    </div></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class=""><div class="main-avatar avatar-md">
                                    {{ auth()->user()->name[0] }}
                                </div>

                                </div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ auth()->user()->name }}</h6><span>Premium Member</span>
                                </div>
                            </div>
                        </div>

                        <a class="dropdown-item" href="{{ route('logout') }}" style="height: 60px"
                        onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"></i>Sign Out
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">

                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>

                    </div>
                </div>
                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
