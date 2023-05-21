@extends('backend.layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    اضافة نوع
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأنواع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل نوع </span>
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
                <div class="card  box-shadow-0 ">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Add Type For : <strong >{{$type->card->name}}</strong></h4>
                    </div>
                </div>
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('cards.show', $type->card->id) }}">رجوع</a>
                    </div>
                </div><br>

                <form action="{{ route('types.update', $type->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>أدخل اسم النوع الجديد<span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="name" required type="text" value="{{ $type->name }}">
                        </div>

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> أدخل سعر اليوم<span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="daily_price" required type="text" value="{{ $type->daily_price }}">
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>أدخل المثال <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="placeholder" required type="text" value="{{ $type->placeholder }}">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>حالة النوع<span class="tx-danger"></span></label>
                            <select name="status" class="form-control  nice-select  custom-select">
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                {{-- input hidden for card Id --}}
                <input hidden name="card_id" value="{{ $type->card->id }}" />
                {{-- input hidden for card Id --}}
            </div>
            <div class="form-check m-2">
                <button type="submit" name="submit" class="btn btn-primary btn-loading">تحديث النوع</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
