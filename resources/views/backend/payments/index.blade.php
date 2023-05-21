@extends('backend.layouts.master')
@section('css')

@section('title')
    البطاقات
@stop

<!-- Internal Data table css -->

<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ asset('backend/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">طرائق الدفع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                قائمة طرق الدفع للمدير</span>
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

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    <a class="btn btn-primary btn-sm" href="{{ route('payments.create') }}">اضافة طريقة جديدة</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">الترتيب</th>
                                <th scope="col">اسم الطريقة</th>
                                <th scope="col">الرقم السري</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">عمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                        @endphp
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $inc++ }}</th>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->number }}</td>
                                    <td>
                                        @switch($payment->status)
                                            @case(true)
                                                <span class="badge badge-success">مفعل</span>
                                            @break

                                            @case(false)
                                                <span class="badge badge-danger">غير مفعل</span>
                                            @break
                                        @endswitch
                                    <td>
                                        @if ($payment->status == true)
                                            <a href="{{ route('change-payment-status', $payment->id) }}"
                                                class="btn btn-sm btn-warning" title="الغاء تفعيل الطريقة"><i
                                                    class="las la-bell-slash"></i></a>
                                        @else
                                            <a href="{{ route('change-payment-status', $payment->id) }}"
                                                class="btn btn-sm btn-success" title="تفعيل الطريقة"><i
                                                    class="las la-bell"></i></a>
                                        @endif
                                        <a href="{{ route('payments.edit', $payment->id) }}"
                                            class="btn btn-sm btn-info" title="تعديل"><i class="las la-pen"></i></a>
                                        <div class="btn btn-group">
                                            <form method="POST"
                                                action="{{ route('payments.destroy', $payment->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="las la-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ asset('backend/assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ asset('backend/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ asset('backend/assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })
</script>


@endsection
