<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div>
    <h1>Hello! My name is {{ $name }}</h1>

    <h1>My history</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In non hendrerit mauris. Proin eu elit elit. Integer sed tellus lacus. Nulla facilisi. Aliquam tincidunt ligula vel dolor lacinia euismod.</p>

    <p style="text-align: center;">
        <a href="{{ $linkedin }}" target="_blank" class="button">LinkedIn</a>
        <a href="{{ $github }}" target="_blank" class="button">GitHub</a>
    </p>
</div>