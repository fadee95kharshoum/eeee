@extends('backend.layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
  update user
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                مستخدم</span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
                    </div>
                </div><br>

                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="">

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label><b> User Name :</b><span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label><b> Email : </b><span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                        </div>
                    </div>

                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label><b> Password : </b><span class="tx-danger">*</span></label>
                        {!! Form::password('password', array('class' => 'form-control','required')) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label><b> Confirm-Password : </b><span class="tx-danger">*</span></label>
                        {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                    </div>
                </div>
                <div class="row row-sm mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                        <label class="form-label"><b>User Status :</b> </label>
                        <select name="status" id="select-beast"
                            class="form-control  nice-select  custom-select">
                            <option value="1">Active</option>
                            <option selected value="0">Un Active</option>
                        </select>
                    </div>
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                        <label class="form-label"><b>User Type</b></label>
                        <select name="type" id="select-beast"
                            class="form-control  nice-select  custom-select">
                            <option value="{{ 'User' }}">User</option>

                            @can('انشاء مدير')
                                <option value="{{ 'Admin' }}">Adminstrator</option>
                            @endcan
                        </select>
                    </div>
                </div>
                
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label><b>Mobile :</b><span class="tx-danger">*</span></label>
                        <input class="form-control form-control-sm mg-b-20"
                            data-parsley-class-handler="#lnWrapper" name="phone" required type="text" value="{{ $user->phone }}">
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label><b>Balance :</b> <span class="tx-danger">*</span></label>
                        <input class="form-control form-control-sm mg-b-20"
                            data-parsley-class-handler="#lnWrapper" name="balance" required type="number"
                            value="{{ $user->balance }}">
                    </div>
                </div>

                @can('انشاء صلاحيات لمدير')
                <div class="row mg-b-20">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong> <b>Admin Permission</b> ( If You Would Admin Like You,
                                Just Click On Admin Below)</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                            !!}
                        </div>
                    </div>
                </div>
                @endcan
                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>




</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection
