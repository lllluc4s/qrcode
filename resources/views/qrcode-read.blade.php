<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Code Image Generator</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <h1>Hello! My name is {{ $name }} &#x1F60A;</h1>
        <br><br><br>

        <h2>My history</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In non hendrerit mauris. Proin eu elit elit. Integer sed tellus lacus. Nulla facilisi. Aliquam tincidunt ligula vel dolor lacinia euismod.</p>
        <br><br><br>

        <div style="text-align: center;">
            <a href="{{ $linkedin }}" target="_blank" class="button">LinkedIn</a>
            <a href="{{ $github }}" target="_blank" class="button">GitHub</a>
        </div>
    </div>
</body>

</html>