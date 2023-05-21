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

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card">
                <div class="input-group">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ابحث في البطاقات عن نوع بطاقة ما"
                    title="Type in a name" class="form-control"/>
                </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
                <div class="input-group">
                    <input type="text" id="secondInput" onkeyup="secondFunction()" placeholder="ابحث في البطاقات عن عن رابط Paypal"
                    title="Type in a link" class="form-control"/>
                </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
                <div class="input-group">
                    <input type="text" id="thirdInput" onkeyup="thirdFunction()" placeholder="ابحث في البطاقات عن رقم تحويل محدد"
                    title="Type in a transection number" class="form-control"/>
                </div>
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
                                <th class="border-bottom-0">نوع البطاقة</th>
                                <th class="border-bottom-0">اسم المستخدم</th>
                                <th class="border-bottom-0"> القيمة</th>
                                <th class="border-bottom-0"> السعر</th>
                                <th class="border-bottom-0"> الرابط</th>
                                <th class="border-bottom-0"> البريد الالكتروني</th>
                                <th class="border-bottom-0">الصورة</th>
                                <th class="border-bottom-0">رقم التحويل</th>
                                <th class="border-bottom-0">تاريخ الرفع</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">تحديد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('custom-convert') }}" method="POST">
                                @csrf
                                @foreach ($customcards as $card)
                                    <tr>
                                        <td>{{ $card->type->card->name }}</td>
                                        <td>{{ $card->user->name }}</td>
                                        <td>{{ $card->value }}</td>
                                        <td>{{ $card->price }}</td>

                                        <td>{{ $card->link }}</td>
                                        <td>{{ $card->email }}</td>
                                        <td>{{ $card->path }}</td>
                                        <td>{{ $card->transaction_number }}</td>
                                        <td>{{ $card->created_at }}</td>
                                        <td>
                                            @switch($card->status)
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
                                            <input type="checkbox" name="check[]" value="{{ $card->id }}" />
                                        </td>
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
    function secondFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("secondInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
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
    function thirdFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("thirdInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[7];
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
