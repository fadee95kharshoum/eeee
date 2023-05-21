<div class="card-body">
    <form action="{{ route('search') }}" method="POST">
        <div class="mb-4">
            <p class="mg-b-10"> اختر نوع البطاقة :</p>
            <select name="card_id" class="form-control SlectBox " id="card_id" required wire:model="selectedCard">
                <option selected>اختر النوع رجاءا</option>
                <!--placeholder-->
                @foreach ($cards as $card)
                    <option value="{{ $card->id }}">{{ $card->name }}</option>
                @endforeach
            </select>
        </div>
        @if (!is_null($selectedCard))
            <div class="col-auto">
                <div class="mb-2" id="type">
                    <p class="mg-b-10">اختر قيمة البطاقة :</p>
                    <select name="type_id" class="form-control SlectBox" id="type_id" required>
                        <!--placeholder-->
                        <option selected>اختر القيمة رجاءا</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <p class="mg-t-10">اختر الحالة :</p>
                    <select name="status" class="form-control SlectBox" id="status" required>
                        <!--placeholder-->
                        <option selected>اختر الحالة رجاءا</option>
                        <option value="Pendding">Pendding</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <button wire:click="search" id="search" type="submit" class="btn btn-success">بحث</button>
            </div>
        @endif

    </form>
</div>
