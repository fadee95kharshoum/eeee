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


<form action="{{ isset($guard) ? url($guard.'/login') : route('login')}}" method="POST" class="form" id="forms">
    @csrf
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Account"></div>
        <div class="progress-step" data-title="Login"></div>
    </div>
    <div class="step-forms step-forms-active">
        <p><b>Please Enter Your Credential Info</b></p>
        <div class="group-inputs">
            <input type="email" name="email" id="username" placeholder="Email" class="form-control" required />
        </div>
        <div class="group-inputs">
            <input type="password" name="password" id="position" placeholder="Password" class="form-control" required />
        </div>
        <div class="btns-group">
            <button type="submit" class="btn">Submit</button>
        </div>
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



</html>
