@extends('backend.layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ asset('backend/assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    اضافة بطاقة
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> البطاقات المطروجة للبيع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                قائمة البطاقات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>خطا</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('cards-for-sale.index') }}">رجوع</a>
                    </div>
                </div><br>

                <form action="{{ route('cards-for-sale.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>أدخل اسم البطاقة<span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="name" required type="text">
                        </div>

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>أدخل وصف البطاقة<span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="description" required type="text">
                        </div>
                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>أدخل صورة البطاقة<span class="tx-danger"></span></label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>حالة البطاقة<span class="tx-danger"></span></label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                <option selected value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-check m-2">
                        <button type="submit" class="btn btn-primary btn-loading">اضافة بطاقة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{ asset('backend/assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

<!--Internal  Parsley.min js -->
<script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>
@endsection
