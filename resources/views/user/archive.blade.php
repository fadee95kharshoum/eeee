@extends('user.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">صفحة الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    صفحة
                    البطاقات المدخلة التي لم مراجعتها من قبل مدير الموقع
                </span>
            </div>
        </div>
        {{-- <div class="d-flex my-xl-auto right-content">
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <a class="btn btn-success" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">رصيدي</a>
                    <a class="btn btn-danger" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">طلب رصيد</a>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
            @php
                Session::forget('message');
            @endphp
        </div>
    @endif
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">عمليات الادخال السابقة</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">عمليات رفع الاكواد السابقة تحناج الى مراجعة من مدير الموقع والتأكد من
                    صحتها</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                            <tr>
                                {{-- <th scope="col">الترتيب</th> --}}
                                <th scope="col">القيمة المرفوعة</th>
                                <th scope="col">السعر</th>
                                <th scope="col">منذ</th>
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                            $total = 0;
                        @endphp
                        <tbody>
                            @foreach ($uploaded_cards as $card)
                                <tr>
                                    {{-- <td>{{ $inc++ }}</td> --}}
                                    <td>{{ $card->type->name }}</td>
                                    <td>{{ $card->price }}</td>
                                    <td>{{ $card->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($card->status == 'Approved')
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>تم التأكيد يمكنك سحب المبلغ
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>العملية قيد الانتظار
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $total += $card->price;
                                @endphp
                            @endforeach
                        {{-- <tfoot>

                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        <b>السعر الكلي المؤقت للبطافات المدخلة في الموقع : <a
                                                href="">{{ $total }}
                                                ليرة سورية</a></b>
                                    </div>
                                </div>
                            </td>
                            <td></td>


                        </tfoot> --}}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
