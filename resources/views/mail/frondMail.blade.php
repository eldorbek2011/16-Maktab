<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <h2>Emailga xabar yuborildi</h2>
    <p><b>{{ $data['name'] }}</b></p>
    <p><b>{{ $data['email'] }}</b></p>
    <p><b>{{ $data['phone'] }}</b></p>
    <p><b>{{ $data['mavzu'] }}</b></p>
    <p><b>{{ $data['message'] }}</b></p>

</body>
</html>