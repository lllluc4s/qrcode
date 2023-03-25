<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div>
    <h1>QR Code Image Generator</h1>

    <form action="{{ route('qrcode.generate') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" name="linkedin" placeholder="LinkedIn URL:">
        @error('linkedin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" name="github" placeholder="GitHub URL:">
        @error('github')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Gerar QR Code</button>
    </form>
</div>

<script src="{{ asset('/js/main.js') }}"></script>