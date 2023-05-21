@extends('backend.layouts.master')
@section('css')

@section('title')
    البطاقات
@stop

<!-- Internal Data table css -->

<link href="{{  asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{  asset('backend/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{  asset('backend/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{  asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{  asset('backend/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{  asset('backend/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">البطاقات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                قائمة الانواع</span>
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
    <div class="col-xl-3">
        <div class="card  box-shadow-0 ">
            <div class="card-header">
                <h4 class="card-title mb-1">Add Type For : <strong >{{ $card->name }}</strong></h4>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('types.store') }}" method="POST">
                    @csrf

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>أدخل اسم النوع الجديد<span class="tx-danger"></span></label>
                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                    name="name" required type="text" placeholder="الاسم">
                </div>
                <div class="form-group">
                    <label> أدخل سعر اليوم<span class="tx-danger"></span></label>
                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                    name="daily_price" required type="text" placeholder="السعر">
                </div>
                <div class="form-group">
                    <label>أدخل المثال <span class="tx-danger"></span></label>
                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                    name="placeholder" required type="text" placeholder="المثال">
                </div>
                <div class="form-group">
                    <label>حالة النوع<span class="tx-danger"></span></label>
                    <select name="status" class="form-control  nice-select  custom-select">
                        <option value="1">مفعل</option>
                        <option value="0">غير مفعل</option>
                    </select>
                </div>

                {{-- input hidden for card Id --}}
                <input hidden name="card_id" value="{{ $card->id }}" />
                {{-- input hidden for card Id --}}

                <div class="justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">اضافة النوع</button>
                </div>
            </div>
        </div>
    </form>
    </div>
        </div>
    </div>

    <div class="col-xl-9">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-5 col-md-4">
                    <a class="btn btn-danger btn-sm" href="{{ route('cards.index') }}">رجوع</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">الترتيب</th>
                                <th scope="col">قيمة البطاقة</th>
                                <th scope="col">السعر اليومي</th>
                                <th scope="col">مثال عن نوع البطاقة</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">عمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                        @endphp
                        <tbody>
                            @foreach ($card->types as $type)
                                <tr>
                                    <th scope="row">{{ $inc++ }}</th>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->daily_price }}</td>
                                    <td>{{ $type->placeholder }}</td>
                                    <td>
                                        @switch($type->status)
                                            @case(true)
                                                <span class="badge badge-success">مفعل</span>
                                            @break

                                            @case(false)
                                                <span class="badge badge-danger">غير مفعل</span>
                                            @break
                                        @endswitch
                                    </td>

                                    <td>
                                        @if ($type->status == true)
                                            <a href="{{ route('change-type-status', $type->id) }}"
                                                class="btn btn-sm btn-warning" title="الغاء تفعيل النوع"><i
                                                    class="las la-bell-slash"></i></a>
                                        @else
                                            <a href="{{ route('change-type-status', $type->id) }}"
                                                class="btn btn-sm btn-success" title="تفعيل النوع"><i
                                                    class="las la-bell"></i></a>
                                        @endif

                                        <div class="btn btn-group">
                                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i> تعديل </a>
                                            
                                            <form method="POST" action="{{ route('types.destroy', $type->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="las la-trash"></i> حذف </button>
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
<script src="{{  asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{  asset('backend/assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{  asset('backend/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{  asset('backend/assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{  asset('backend/assets/js/modal.js') }}"></script>

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
