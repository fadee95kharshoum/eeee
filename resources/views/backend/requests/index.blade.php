@extends('backend.layouts.master')
@section('css')

@section('title')
    البطاقات
@stop

<!-- Internal Data table css -->

<link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">طرائق التسليم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                قائمة طرائق التسليم للزبون</span>
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
                    <a class="btn btn-primary btn-sm" href="{{ route('methods.create') }}">اضافة طريقة تسليم جديدة</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table  id="example" class="table key-buttons text-md-nowrap" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">الترتيب</th>
                                <th scope="col">الرصيد الحالي</th>
                                <th scope="col">المبلغ المطلوب</th>
                                <th scope="col">المحافظة</th>
                                <th scope="col">مكان التسليم</th>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">طريقة التحويل</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">عمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                        @endphp
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row">{{ $inc++ }}</th>
                                    <td>{{ $request->user->balance }}</td>

                                    <td>{{ $request->money }}</td>
                                    <td>{{ $request->country }}</td>
                                    <td>{{ $request->place_for_delivery }}</td>
                                    <td>{{ $request->user->name }}</td>
                                    <td>{{ $request->method->name }}</td>
                                    <td>
                                        {{-- @switch($request->status)
                                            @case(true)
                                                <span class="badge badge-success">مفعل</span>
                                            @break

                                            @case(false)
                                                <span class="badge badge-danger">غير مفعل</span>
                                            @break
                                        @endswitch --}}
                                        @if ($request->status == true)
                                        <span class="badge badge-success">مفعل</span>
                                        @else
                                            <span class="badge badge-danger">غير مفعل</span>
                                        @endif
                                    <td>
                                        @if ($request->status == true)
                                            <a href="{{ route('change-request-status', $request->id) }}"
                                                class="btn btn-sm btn-warning" title="الغاء التأكيد "><i
                                                    class="las la-bell-slash"></i></a>
                                        @else
                                        <a href="{{ route('change-request-status', $request->id) }}"                                                class="btn btn-sm btn-success" title="تأكيد"><i
                                                    class="las la-bell"></i></a>
                                        @endif
                                        <div class="btn btn-group">
                                            <form method="POST"
                                                action="{{ route('requests.destroy', $request->id) }}">
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
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{asset('backend/assets/js/table-data.js')}}"></script>

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
