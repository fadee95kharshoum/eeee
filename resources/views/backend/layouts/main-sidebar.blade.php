<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{  asset('backend/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{  asset('backend/assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{  asset('backend/assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{  asset('backend/assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{  asset('backend/assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->type }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/dashboard')) }}"><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">الصفحة الرئيسية</span></a>
            </li>
            <li class="side-item side-item-category">عام</li>


                <li class="side-item side-item-category">المستخدمين</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <svg
                    xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon"
                    viewBox="0 0 24 24">
                    <g>
                        <rect fill="none" />
                    </g>
                    <g>
                        <g />
                        <g>
                            <path
                                d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                            <path
                                d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                opacity=".3" />
                        </g>
                        <g>
                            <path
                                d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                            <path
                                d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                            <path
                                d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                        </g>
                    </g>
                </svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('users.index') }}">قائمة المستخدمين</a></li>
                    @can('قائمة الصلاحيات')
                        <li><a class="slide-item" href="{{ route('roles.index') }}">صلاحيات المستخدمين</a></li>
                    @endcan
                </ul>

                <li class="side-item side-item-category">بطاقاتي</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                <path
                d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
                </svg><span class="side-menu__label">بطاقاتي</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('cards.index') }}">البطاقات </a></li>
                    <li><a class="slide-item" href="{{ route('cards-for-sale.index') }}">البطاقات المطروحة للبيع </a></li>
                    <li class="side-item side-item-category">البطاقات المرفوعة</li>

                    {{-- <li><a class="slide-item" href="{{ route('uploads.index') }}">البطاقات المرفوعة  </a></li> --}}
                    <li><a class="slide-item" href="{{ route('card-pendding') }}"> البطاقات المعلقة</a></li>
                    <li><a class="slide-item" href="{{ route('card-selected') }}"> البطاقات المحددة</a></li>
                    <li><a class="slide-item" href="{{ route('card-rejected') }}"> البطاقات المرفوضة</a></li>
                    <li><a class="slide-item" href="{{ route('card-approved') }}"> البطاقات الموافق عليها</a></li>

                    {{-- custom --}}
                    <li class="side-item side-item-category">البطاقات المرفوعة المخصصة</li>
                    <li><a class="slide-item" href="{{ route('custom-card-pendding') }}">البطاقات المعلقة المخصصة</a></li>
                    <li><a class="slide-item" href="{{ route('custom-card-selected') }}">البطاقات المحددة المخصصة</a></li>
                    <li><a class="slide-item" href="{{ route('custom-card-rejected') }}">البطاقات المرفوضة المخصصة</a></li>
                    <li><a class="slide-item" href="{{ route('custom-card-approved') }}">البطاقات الموافق عليها المخصصة</a></li>

                </ul>

                <li class="side-item side-item-category">الطلبات</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                </svg><span class="side-menu__label"> الطلبات</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('requests.index') }}">طلبات سحب</a></li>
                    <li><a class="slide-item" href="{{ route('sales.index') }}">طلبات الشراء</a></li>
                </ul>


                <li class="side-item side-item-category">طرق الدفع</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                </svg><span class="side-menu__label">طرق الدفع</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('payments.index') }}">طرق الدفع للمدير</a></li>
                    <li><a class="slide-item" href="{{ route('methods.index') }}">طرق الدفع للزبون</a></li>
                </ul>
                {{-- //here i edit --}}

                <li class="side-item side-item-category">تخصيص الواجهة</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                </svg><span class="side-menu__label">القسم الاول</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('update-items-slider') }}">تخصيص القلاب</a></li>
                    <li><a class="slide-item" href="{{ route('update-items-home') }}">تخصيص الصفحة الرئيسية</a></li>
                </ul>
                {{-- //here id edit --}}
                <li class="side-item side-item-category">الرسائل</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                </svg><span class="side-menu__label"> الرسائل</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('messages.index') }}">رسائل من العامة</a></li>
                    <li><a class="slide-item" href="{{ route('show-complaints-form') }}">رسائل من المستخدمين</a></li>
                </ul>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
