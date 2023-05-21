<div class="card-body">
    <form action="{{ route('uploads.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <p class="mg-b-10"> <b>اختر نوع البطاقة :</b></p>
            <select name="card_id" class="form-control SlectBox " id="card_id" required wire:model="selectedCard">
                <option selected>اختر النوع رجاءا</option>
                <!--placeholder-->
                @foreach ($cards as $card)
                    <option value="{{ $card->id }}">{{ $card->name }}</option>
                @endforeach
            </select>
        </div>
        @if (!is_null($selectedCard))
            {{-- <div class="col-auto"> --}}
            <div class="mb-4" id="type">
                <p class="mg-b-10"><b>اختر قيمة البطاقة :</b></p>
                <select name="type_id" class="form-control SlectBox" id="type_id" required wire:model="selectedType">
                    <!--placeholder-->
                    <option selected>اختر القيمة رجاءا</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- </div> --}}
        @endif

        @if (!is_null($Type))
            {{-- {{ $selectedType->name }} --}}
            <span class="m-2 ">
                <b>    سعر الواحد من فئة {{ $Type->name }} هو : {{ $Type->daily_price }} ليرة سورية</b>

            </span>
            @if ($Type->name != 'custom')
                <b>
                    <p class="mg-b-10">أدخل كل بطاقة في سطر <b>دون فراغات <b> من أجل تحسب بشكل صحيح: </p>
                </b>
                <textarea name="value" class="form-control SlectBox" id="city_id" dir="ltr" rows="6"
                    placeholder="{{ $Type->placeholder }}"></textarea>
            @else
            @if (!is_null($selectedCardName))
                @switch($selectedCardName)
                    @case('Payyer')
                        {{-- <p>Payyer</p> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive hoverable-table">
                                    <table class="table table-hover" id="example1" data-page-length='50'
                                        style=" text-align: center;">
                                        <thead id="thead1">
                                            <tr>
                                                <th class="wd-15p border-bottom-0">أدخل رقم التحويل</th>
                                                <th class="wd-15p border-bottom-0">أدخل الصورة</th>
                                                <th class="wd-5p border-bottom-0">أدخل القيمة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="number" name="transaction_number" class="form-control" id=""
                                                        dir="ltr"></td>
                                                <td><input type="file" name="path" class="form-control" id=""
                                                        dir="ltr" required></td>
                                                <td><input type="text" name="value" class="form-control" id=""
                                                        dir="ltr" required></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('USDT')
                        {{-- <p>USDT</p> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive hoverable-table">
                                    <table class="table table-hover" id="example1" data-page-length='50'
                                        style=" text-align: center;">
                                        <thead id="thead1">
                                            <tr>
                                                <th class="wd-15p border-bottom-0">أدخل رقم التحويل</th>
                                                <th class="wd-15p border-bottom-0">أدخل الصورة</th>
                                                <th class="wd-5p border-bottom-0">أدخل القيمة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="number" name="transaction_number" class="form-control" id=""
                                                        dir="ltr" required></td>
                                                <td><input type="file" name="path" class="form-control" id=""
                                                        dir="ltr" required></td>
                                                <td><input type="text" name="value" class="form-control" id=""
                                                        dir="ltr" required></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('Paypal')
                        {{-- <p>Paypal</p> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive hoverable-table">
                                    <table class="table table-hover" id="example1" data-page-length='50'
                                        style=" text-align: center;">
                                        <thead id="thead1">
                                            <tr>
                                                <th class="wd-25p border-bottom-0">أدخل الرابط</th>
                                                <th class="wd-15p border-bottom-0">أدخل الايميل</th>
                                                <th class="wd-5p border-bottom-0">أدخل القيمة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="url" name="link" class="form-control" id=""
                                                        dir="ltr"></td>
                                                <td><input type="email" name="email" class="form-control" id=""
                                                        dir="ltr"></td>
                                                <td><input type="number" name="value" class="form-control" id=""
                                                        dir="ltr"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @break

                    @default
                        {{-- <p>default</p> --}}
                        {{-- <p>{{ $selectedCardName }}</p> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive hoverable-table">
                                    <table class="table table-hover" id="example1" data-page-length='50'
                                        style=" text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="wd-25p border-bottom-0">أدخل البطاقة</th>
                                                <th class="wd-5p border-bottom-0">أدخل قيمة البطاقة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="value" class="form-control" id=""
                                                        dir="ltr"></td>
                                                <td><input type="number" min="5" max="100" name="custom"
                                                        class="form-control" id="" dir="ltr"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                @endswitch
            @endif
            @endif


        @endif

        <button type="submit" class="btn btn-success">ارسال الى مدير الموقع</button>

    </form>
</div>
