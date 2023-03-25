<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Code Image Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <h1>QR Code Image Generator</h1>

        <form action="{{ route('qrcode.generate') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name:">

            <input type="text" name="linkedin" placeholder="LinkedIn URL:">

            <input type="text" name="github" placeholder="GitHub URL:">

            <button type="submit" class="button">Gerar QR Code</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    @if ($errors->any())
    <script>
        Swal.fire({
            title: 'Ops! =(',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    </script>
    @endif
</body>

</html>
