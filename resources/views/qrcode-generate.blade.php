<style>
    /* Estilo para a div que contém o formulário */
    div {
        display: flex;
        flex-direction: column;
        /* flex-direction: column; */
        align-items: center;
        justify-content: center;
        height: 100vh;
        background: #fff;
    }
</style>

<div>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}">
    <br>
    <a href="{{ route('qrcode.read', [$name, $linkedin, $github]) }}">Clique aqui para ler as informações do QR Code</a>
</div>
