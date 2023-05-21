


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="{{ asset('frontend/form/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/form/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/form/css/form.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100&display=swap"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        body {
            height: 200px;
            background: linear-gradient(#19283f, #33d1cc);
        }
    </style>

</head>


<form action="{{ route('sales.store') }}" method="POST" class="form" id="forms" enctype="multipart/form-data">
    @csrf
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Account"></div>
        <div class="progress-step" data-title="Social"></div>
    </div>
    <div class="step-forms step-forms-active">
        <p>أدخل معلوماتك الشخصية هنا</p>
        <div class="group-inputs">
            <input type="text" name="name" id="username" placeholder="Name" class="form-control" required />
        </div>
        <div class="group-inputs">
            <input type="email" name="email" id="position" placeholder="Email" class="form-control" required />
        </div>
        <div class="group-inputs">
            <input type="phone" name="phone" id="phone namber" placeholder="Phone" class="form-control" required />
        </div>
        <div class="">
            <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
        </div>
    </div>
    <div class="step-forms">
        <p>select method of Payment :</p>
        <div class="box">
            <div class="row my-4">
                <div class="col g-0"><label class="select-label">Paymyment Method :</label> </div>
                <div class="col g-0">
                    <select id="payment_id" name="discount_id" class="form-select text-center" id="method_id"
                        aria-label="Default select example">
                        <option selected>select method:</option>
                        @foreach ($discounts as $discount)
                            <option value="{{ $discount->id }}">{{ $discount->payment->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="box d-none" id="v">
            <div class="row my-4">
                <div class="col g-0"> <label class="select-label ">payment number :</label>
                    <div id="state">
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="row my-4">
                <div class="col g-0"> <label class="select-label ">transaction number :</label> </div>
                <div class="col g-0">
                    <input type="text" class="form-trans text-center" name="transaction"
                        placeholder="transaction number" required>
                </div>
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


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="{{ asset('frontend/form/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/form/js/all.min.js') }}"></script>
<script src="{{ asset('frontend/form/js//form.js') }}"></script>


<script>
 $(document).ready(function () {
            $('#payment_id').on('change', function () {
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({
                    url: "{{url('get-transection-for-method')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        // $('#state').html('<option value="">Select State</option>');
                    //    $('#state').append('<option value="1">'+result['number']+"</option>");
                    $('#v').removeClass('d-none');

                        $('#state').append('<p class="upload-label text-center">'+result['number']+'</p>');

                    }
                });

            });
        });
    </script>




</html>
