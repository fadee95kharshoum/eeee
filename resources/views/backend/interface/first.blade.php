@extends('backend.layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
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
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
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


    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card mg-b-20" id="list1">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        اضافة صورة للسلايدر
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">هذا القسم يكون في أول قسم من الموقع </p>
                    <form action="{{ route('add-image-to-slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">العنوان</label>
                                <input type="text" class="form-control" name="name" id="title"
                                    placeholder="اكتب العنوان هنا">
                            </div>
                            <div class="col-auto">
                                <label for="image" class="visually-hidden">اختر الصورة</label>
                                <input type="file" class="form-control" name="image" id="image">
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
                        إدارة الصور للموقع
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">الترتيب</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                        @php
                            $inc = 1;
                        @endphp
                        <tbody>
                            @foreach ($sliderImages as $item)
                                <tr>
                                    <th scope="row">{{ $inc++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><img width="100px" src="{{ asset('backend/' . $item->path) }}" alt=""></td>
                                    <td>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic checkbox toggle button group">
                                            <form method="POST" action="{{ route('delete-image-from-slider', $item->id) }}">
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
                        اضافة فيديو للسلايدر
                    </div>
                    <p class="mg-b-20 text-muted card-sub-title">هذا القسم يكون في أول قسم من الموقع </p>
                    <form action="{{ route('update-video-from-slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-auto">
                                <label for="title" class="visually-hidden">العنوان</label>
                                <input type="text" class="form-control" name="name" id="title"
                                    placeholder="اكتب العنوان هنا">
                            </div>
                            <div class="col-auto">
                                <label for="video" class="visually-hidden">اختر الفيديو</label>
                                <input type="file" class="form-control" name="image" id="video">
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="visually-hidden">الوصف :</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="اكتب الوصف هنا"></textarea>
                        </div>
                        <div class="row pt-2">
                            <button type="submit" class="btn btn-primary mb-3">تحديث</button>
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
                        الفيديو المرفوع
                    </div>
                </div>
                <video class="video" autoplay loop muted>
                    <source src="{{ asset('backend/' . $video->path) }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
@endsection
@section('js')
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
