@extends('backend.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    {{-- <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('backend/assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة البحث</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الاكواد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

<ul class="nav nav-tabs mb-3">
    @foreach ($cards as $card)
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('type-approved', $card->id) }}">{{ $card->name }}</a>
      </li>
    @endforeach

  </ul>

  <ul class="nav nav-tabs mb-3">
    @foreach ($types as $type)
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('uploads-approved', $type->id) }}">{{ $type->name }}</a>
      </li>
    @endforeach

  </ul>
{{-- table --}}

{{-- table --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@php
    $i=1;
@endphp
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
                <div class="input-group">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ابحث في البطاقات عن بطاقة ما"
                    title="Type in a name" class="form-control"/>
                </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="card">
            <a href="{{ route('ExportApproved', $type_selected) }}" class="btn btn-primary">تصدير الجميع</a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="card">
            <a href="{{ route('DeleteApproved', $type_selected) }}" class="btn btn-danger">حذف الجميع</a>
        </div>
    </div>
</div>



    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ $type_selected->card->name }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> نوع البطاقة : {{ $type_selected->name }}</p>
                </div>
                @php
                    $i = 1;
                @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0"> البطاقة</th>
                                    <th class="border-bottom-0">اسم المستخدم</th>
                                    <th class="border-bottom-0">تاريخ الرفع</th>
                                    <th class="border-bottom-0">تم التأكيد</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('transformAndExport') }}" method="POST">
                                    @csrf
                                    @foreach ($codes as $code)
                                        <tr>
                                            <td>{{ $code->value }}</td>
                                            <td>{{ $code->user->name }}</td>
                                            <td>{{ $code->created_at }}</td>
                                            <td>
                                                @switch($code->status)
                                                    @case('Approved')
                                                        <span class="label text-success d-flex">
                                                            <div class="dot-label bg-success ml-1"></div> مؤكدة
                                                        </span>
                                                    @break

                                                    @case('Selected')
                                                        <span class="label text-warning d-flex">
                                                            <div class="dot-label bg-danger ml-1"></div>محددة
                                                        </span>
                                                    @break

                                                    @case('Pendding')
                                                        <span class="label text-secondray d-flex">
                                                            <div class="dot-label bg-success ml-1"></div> معلقة
                                                        </span>
                                                    @break

                                                    @case('Rejected')
                                                        <span class="label text-danger d-flex">
                                                            <div class="dot-label bg-danger ml-1"></div>مرفوضة
                                                        </span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check[]" value="{{ $code->id }}"/>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <div class="input-group mb-3">
                                        <select class="form-control  nice-select  custom-select" name="status" required>
                                            <option selected>اختر حالة للبطاقة ليتم تحويلها</option>
                                            <option value="Approved">موافقة</option>
                                            <option value="Rejected">مرفوضة</option>
                                            <option value="Selected">محددة</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn ripple btn-warning bl-tl-0 bl-bl-0" type="submit">تحويل + تصدير</button>
                                        </span>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

{{-- <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script> --}}
    <!-- Internal Nice-select js-->
    <script src="{{ asset('backend/assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
