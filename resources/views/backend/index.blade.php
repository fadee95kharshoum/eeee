@extends('backend.layouts.master')
@section('css')
    @livewireStyles
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('backend/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('backend/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بعودتك !</h2>
                <p class="mg-b-0">يمكنك هنا اختيار روابط سريعة وإدارة جميع الموقع</p>
            </div>
        </div>
    </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <livewire:counter />

                    <!-- row opened -->
                    <div class="row row-sm row-deck">
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="card card-dashboard-eight pb-2">
                                <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
                                <div class="list-group">
                                    <div class="list-group-item border-top-0">
                                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                                        <p>United States</p><span>$1,671.10</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                                        <p>Netherlands</p><span>$1,064.75</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                                        <p>United Kingdom</p><span>$1,055.98</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                                        <p>Canada</p><span>$1,045.49</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                                        <p>India</p><span>$1,930.12</span>
                                    </div>
                                    <div class="list-group-item border-bottom-0 mb-0">
                                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                                        <p>Australia</p><span>$1,042.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8 col-xl-8">

                            <div class="card card-table-two">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                                <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-25p">Date</th>
                                                <th class="wd-lg-25p tx-right">Sales Count</th>
                                                <th class="wd-lg-25p tx-right">Earnings</th>
                                                <th class="wd-lg-25p tx-right">Tax Witheld</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>05 Dec 2019</td>
                                                <td class="tx-right tx-medium tx-inverse">34</td>
                                                <td class="tx-right tx-medium tx-inverse">$658.20</td>
                                                <td class="tx-right tx-medium tx-danger">-$45.10</td>
                                            </tr>
                                            <tr>
                                                <td>06 Dec 2019</td>
                                                <td class="tx-right tx-medium tx-inverse">26</td>
                                                <td class="tx-right tx-medium tx-inverse">$453.25</td>
                                                <td class="tx-right tx-medium tx-danger">-$15.02</td>
                                            </tr>
                                            <tr>
                                                <td>07 Dec 2019</td>
                                                <td class="tx-right tx-medium tx-inverse">34</td>
                                                <td class="tx-right tx-medium tx-inverse">$653.12</td>
                                                <td class="tx-right tx-medium tx-danger">-$13.45</td>
                                            </tr>
                                            <tr>
                                                <td>08 Dec 2019</td>
                                                <td class="tx-right tx-medium tx-inverse">45</td>
                                                <td class="tx-right tx-medium tx-inverse">$546.47</td>
                                                <td class="tx-right tx-medium tx-danger">-$24.22</td>
                                            </tr>
                                            <tr>
                                                <td>09 Dec 2019</td>
                                                <td class="tx-right tx-medium tx-inverse">31</td>
                                                <td class="tx-right tx-medium tx-inverse">$425.72</td>
                                                <td class="tx-right tx-medium tx-danger">-$25.01</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row row-lg row-deck">
                            <div class="col-md-12 col-lg-8 col-xl-8">

                            <div class="card">
                                <div class="card-header pb-1">
                                    <h3 class="card-title mb-2">Sales Activity</h3>
                                    <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
                                </div>
                                <div class="product-timeline card-body pt-2 mt-1">
                                    <ul class="timeline-1 mb-0">
                                        <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
                                            <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                                        </li>
                                        <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
                                            <p class="mb-0 text-muted tx-12">1k New Sales</p>
                                        </li>
                                        <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
                                            <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                                        </li>
                                        <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
                                            <p class="mb-0 text-muted tx-12">3k New profit</p>
                                        </li>
                                        <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                                            <p class="mb-0 text-muted tx-12">15% increased</p>
                                        </li>
                                        <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                                            <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-12 col-lg-6">

                            <div class="card ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center pb-2">
                                                <p class="mb-0">Total Sales</p>
                                            </div>
                                            <h4 class="font-weight-bold mb-2">$7,590</h4>
                                            <div class="progress progress-style progress-sm">
                                                <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 mt-md-0">
                                            <div class="d-flex align-items-center pb-2">
                                                <p class="mb-0">Active Users</p>
                                            </div>
                                            <h4 class="font-weight-bold mb-2">$5,460</h4>
                                            <div class="progress progress-style progress-sm">
                                                <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- Container closed -->


@endsection
@section('js')
    @livewireScripts
    <script src="{{ URL::asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Counters -->
    <script src="{{ URL::asset('backend/assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/plugins/counters/counterup.min.js') }}"></script>
    <!--Internal Time Counter -->
    <script src="{{ URL::asset('backend/assets/plugins/counters/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/plugins/counters/counter.js') }}"></script>


    {{-- new --}}
    <!--Internal  Chart.bundle js -->
<script src="{{URL::asset('backend/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('backend/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('backend/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('backend/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('backend/assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('backend/assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('backend/assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('backend/assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('backend/assets/js/index.js')}}"></script>
<script src="{{URL::asset('backend/assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
