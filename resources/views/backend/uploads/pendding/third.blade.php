@extends('backend.layouts.master')
@section('css')

@section('title')
    المستخدمين - بطاقاتي
@stop

<!-- Internal Data table css -->

{{-- <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" /> --}}

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                البطاقات المعلقة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

<ul class="nav nav-tabs mb-3">
    @foreach ($cards as $card)
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('type-pendding', $card->id) }}">{{ $card->name }}</a>
      </li>
    @endforeach

  </ul>

  <ul class="nav nav-tabs mb-3">
    @foreach ($types as $type)
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('uploads-pendding', $type->id) }}">{{ $type->name }}</a>
      </li>
    @endforeach

  </ul>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            {{-- <div class="card-body"> --}}
                <div class="input-group">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ابحث في البطاقات عن بطاقة ما"
                    title="Type in a name" class="form-control"/>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>

<div class="container-fluid">
</div>
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="border-bottom-0"> البطاقة</th>
                                <th class="border-bottom-0">اسم المستخدم</th>
                                <th class="border-bottom-0">تاريخ الرفع</th>

                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">تحديد</th>
                                <th class="border-bottom-0">قيمة مخصصة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('transformAndExport') }}" method="POST">
                                @csrf
                                @foreach ($codes as $code)
                                    <tr>
                                        <td>{{ $code->value }}</td>
                                        {{-- {{ decrypt($code->value); }} --}}
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
                                            <input type="checkbox" name="check[]" value="{{ $code->id }}" />
                                        </td>
                                        @if ($code->custom)
                                            <td><b>{{ $code->custom }} </b></td>
                                        @endif
                                    </tr>
                                @endforeach

                                <div class="input-group mb-3">
                                    <select class="form-control SlectBox" name="status" required>
                                        <option selected>اختر حالة للبطاقة ليتم تحويلها</option>
                                        <option class="dropdown-item" value="Approved">موافقة</option>
                                        <option class="dropdown-item" value="Rejected">مرفوضة</option>
                                        <option class="dropdown-item" value="Selected">محددة</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn ripple btn-warning bl-tl-0 bl-bl-0" type="submit">تحويل +
                                            تصدير</button>
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

    <!-- Modal effects -->
</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
{{-- <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script> --}}

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
