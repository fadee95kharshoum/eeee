@extends('user.master')
@section('css')
    
    @livewireStyles

@endsection
@section('page-header')
    <!-- breadcrumb -->

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الصفحة الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    صفحة
                    إدخال البطاقات
                </span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <a class="btn btn-success" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">رصيدي</a>
                    <a class="btn btn-danger" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">طلب رصيد</a>
                </div>
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
                <livewire:user-interface />
            </div>
        </div>
    </div>

    <!-- Modal effects -->
    <div class="modal" id="modaldemo2">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">طلب رصيد : </h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('storeRequestFromUser') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h6>يمكنك فقط طلب رصيد أقل من رصيدك الموجود في الموقع : </h6>

                        <p class="text">رصيدك الحالي في الموقع
                            <a href="">
                                    {{ auth()->user()->balance }} ليرة سورية
                        </a>

                        </p>
                        <div class="p-2">
                            <input max="{{ auth()->user()->balance-1 }}"
                                min="1" id="" placeholder="أدخل الرصيد المراد سحبه" name="money"
                                type="number" required class="form-control" required />
                        </div>
                        <div class="p-2">
                            <select name="country" id="" class="form-control" required>
                                <option value="دمشق">دمشق</option>
                                <option value="ريف دمشق">ريف دمشق</option>
                                <option value="اللاذقية">اللاذقية</option>
                                <option value="طرطوس">طرطوس</option>
                                <option value="حمص">حمص</option>
                                <option value="حماة">حماة</option>
                                <option value="حلب">حلب</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <select name="method_id" id="" class="form-control" required>
                                <option value="" selected>اختر طريقة التسليم رجاءا</option>
                                @foreach ($methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="p-2">
                            <input id="" placeholder="اختر مكان التسليم" name="place_for_delivery"
                                type="text" required class="form-control" required />
                        </div>
                        <div class="p-2">
                            <input id="" placeholder="أدخل رقم للتواصل" name="phone"
                                type="tel" required class="form-control" required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">تقديم طلب سحب من الموقع</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">عودة</button>
                    </div>
                </form>
                @if (!empty($money))
                    <form action="" method="POST">
                        @csrf
                        @method('delete')

                        <div class="card">
                            <div class="card-body">
                                <p>* تم طلب مبلغ من الموقع مقداره <a href=""><b>{{ $money->money }}</b></a> ليرة</p>
                                <button class="btn btn-danger" type="submit">الغاء الطلب المسبق لعملية السحب</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">رصيدي في الموقع : </h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6><a href="">
                            {{ auth()->user()->balance }} ليرة سورية
                        </a>
                    </h6>
                    <p>
                        يمكن أن لاتظهر آخر عملية قمت بها ولكنها فقط بحاجة لمراجعة من مدير الموقع.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>


        @livewireScripts
@endsection

