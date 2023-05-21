<div class="step-forms">
    <p>select method of Payment :</p>
    <div class="box">
        <div class="row my-4">
            <div class="col g-0"><label class="select-label">Paymyment Method :</label> </div>
            <div class="col g-1">
                 <select name="payment" class="form-select text-center" id="country_id" aria-label="Default select example" wire:model="selectedPayment">
                    <option selected>select method:</option>
                    @foreach ($payments as $payment)
                        <option value="1">{{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="box " id="state">
        <div class="row my-4">
            <div class="col g-0"> <label class="select-label ">payment number :</label> </div>
            @if (!is_null($transectionNumber))
                <p class="form-select text-center">{{ $transectionNumber }}</p>
            @endif
        </div>
    </div>
    <div class="box">
        <div class="row my-4">
            <div class="col g-0"> <label class="select-label ">transaction number :</label> </div>
            <div class="col g-0">
                <input type="text" class="form-trans text-center" name="transaction"
                    placeholder="transaction number" required></div>
        </div>
    </div>
    <div class="box">
        <div class="row my-4">
            <div class="col g-0"> <label class="select-label">Transaction Screenshot :</label></div>
            <div class="col g-0">
                <label for="formFile" class="upload-label">Choose file</label>
                <input name="image" type="file" id="formFile">
            </div>
        </div>
    </div>
    <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <button type="submit" class="btn">Submit</button>
    </div>
</div>
