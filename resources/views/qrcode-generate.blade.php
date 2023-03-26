<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Code Image Generator</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <h1>{{ $name }}</h1>
        <p>Scan me</p>
        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}">
        <br><br>

        <a href="{{ route('qrcode.read', [$name, $linkedin, $github]) }}">Click here to read QR Code information</a>
    </div>
</body>

</html>
