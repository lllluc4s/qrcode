<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}">
    <br><br>
    <a href="{{ route('qrcode.read', [$name, $linkedin, $github]) }}">Clique aqui para ler as informações do QR Code</a>
</div>