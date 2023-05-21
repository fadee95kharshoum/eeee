@extends('user.master')
@section('css')


@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">صفحة الاسفسارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صفحة
                إدخال الاستفسارات والشكاوي
            </span>
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
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('storeMessage') }}">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">الاسم ( الاسم الكامل  ) :</label>
                            <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="  أدخل الاسم رجاءا">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">بريد الكتروني ( بريد الحساب  ) :</label>
                            <input type="email" value="{{ auth()->user()->email }}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="  بريدك الالكتروني">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">الهاتف ( رقم الجوال ) :</label>
                            <input type="tel" value="{{ auth()->user()->phone }}" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="رقم الهاتف للتواصل">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">السبب ( عن ماذا الشكوى ) :</label>
                            <input type="text" name="case" class="form-control" id="exampleFormControlInput1" placeholder="أدخل فقط السبب">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ماذا حدث ؟</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="subject" rows="3" placeholder="يمكنك ارسال اي معلومات تخص الموقع أو مشاركة ماتريد"></textarea>
                </div>
                <button type="submit" class="btn btn-success">ارسال الى مدير الموقع</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--div-->





@endsection
@section('js')

<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
