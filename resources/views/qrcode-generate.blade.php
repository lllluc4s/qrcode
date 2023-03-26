<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Code Image Generator</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <h1>{{ $qrCode->name }}</h1>
        <p>Scan me</p>
        <img src="data:image/png;base64,{{ base64_encode($qrCodeImage) }}">
        <br><br>

        <a href="{{ route('qrcode.read', $qrCode->id) }}">Click here to read QR Code information</a>
    </div>


</body>

</html>