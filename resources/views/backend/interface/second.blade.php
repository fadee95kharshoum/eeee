@extends('backend.layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تغيير واجهة الموقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الاعدادات</span>
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
    {{-- <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        اعدادات القسم الداخلي/ تعديل السعر
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">أدخل السعر المراد ضربه في قيمة البطاقة المدخلة</p>
                    <form action="{{ route('card.updatePrice') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">السعر :</label>
                                <input type="text" class="form-control" name="coin" id="title"
                                    placeholder="ادخل السعر هنا" value="{{ $dolar->coin }}" />
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">تحديث</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        اعدادات القسم الثاني/ عنوان القسم الثاني
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">هذا القسم يكون في ثاني قسم من الموقع </p>
                    <form action="{{ route('update-head-second-section') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">العنوان :</label>
                                <input type="text" class="form-control" name="name" id="title"
                                    placeholder="اكتب العنوان هنا" value="{{ $headSecondSection->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="visually-hidden">الوصف :</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="اكتب الوصف هنا">{{ $headSecondSection->description }}</textarea>
                        </div>
                        <div class="row pt-2">
                            <button type="submit" class="btn btn-primary mb-3">تحديث</button>
                        </div>
                    </form>
                    <a class="modal-effect btn btn-info btn-block" data-effect="effect-scale" data-toggle="modal"
                        href="#modaldemo7">عرض التفاصيل</a>

                </div>
            </div>
        </div>
    </div>
    {{-- me --}}
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        اعدادات القسم الثاني/ جسم القسم الثاني
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">
                        هذا القسم يكون في ثاني قسم من الموقع
                    </p>
                    <form action="{{ route('update-body-second-section') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">العنوان :</label>
                                <input type="text" class="form-control" name="name" id="title"
                                    placeholder="اكتب العنوان هنا">
                            </div>
                            <div class="col-auto">
                                <label for="image" class="visually-hidden">اختر الصورة :</label>
                                <select type="file" class="form-control" name="number" id="image">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="icon" class="visually-hidden">اختر أيقونة :</label>
                                <select type="file" class="form-control" name="icon" id="icon">
                                    <option value="pencil">pencil</option>
                                    <option value="tv">tv</option>
                                    <option value="plug">plug</option>
                                    <option value="cog">cog</option>
                                    <option value="bars">bars</option>
                                    <option value="shopping-cart">shopping-cart</option>
                                    <option value="camera">camera</option>
                                    <option value="home">home</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="visually-hidden">الوصف :</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="اكتب الوصف هنا"></textarea>
                        </div>
                        <div class="row pt-2">
                            <button type="submit" class="btn btn-primary mb-3">اضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        إدارة قسم الخدمات في الموقع
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">الترتيب</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الرقم</th>
                                <th scope="col">الايقونة</th>
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                        @endphp
                        <tbody>
                            @foreach ($itemsBodySecondSection as $item)
                                <tr>
                                    <th scope="row">{{ $inc++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->path }}</td>
                                    <td>{{ $item->icon }}</td>
                                    <td>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic checkbox toggle button group">
                                            <form method="POST" action="{{ route('delete-body-second-section', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        اعدادات القسم الثالث
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">هذا القسم يكون في اخر قسم من الموقع </p>

                    <form action="{{ route('update-discount-section') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">العنوان</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $discount->name }}" id="title" placeholder="اكتب العنوان هنا">
                            </div>
                            <div class="col-auto">
                                <label for="image" class="visually-hidden">اختر الصورة</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="visually-hidden">الوصف :</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="اكتب الوصف هنا"> {{ $discount->description }}</textarea>
                        </div>
                        <div class="row pt-2">
                            <button type="submit" class="btn btn-primary mb-3">تحديث</button>
                        </div>
                    </form>
                    <a class="modal-effect btn btn-info btn-block" data-effect="effect-scale" data-toggle="modal"
                        href="#modaldemo8">عرض التفاصيل</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">عنوان قسم الحسم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>{{ $discount->name }}</h6>
                    <p>{{ $discount->description }}</p>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('backend/' . $discount->path) }}" alt="">
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
    <!-- Modal effects -->
    <div class="modal" id="modaldemo7">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">عنوان قسم الحسم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>{{ $headSecondSection->name }}</h6>
                    <p>{{ $headSecondSection->description }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
@endsection
@section('js')
    <!-- Modals js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
@endsection
