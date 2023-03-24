<style>
    /* Estilo para a div que contém o formulário */
    form {
        display: flex;
        flex-direction: column;
        /* flex-direction: column; */
        align-items: center;
        justify-content: center;
        height: 100vh;
        background: #fff;
    }

    /* Estilo para os campos de entrada */
    input {
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        max-width: 300px;
    }

    /* Estilo para o botão */
    button {
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #ff2e63;
        color: #fff;
        cursor: pointer;
        max-width: 300px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
    }
</style>

<div>
    <form action="{{ route('qrcode.generate') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome:"> <br>
        <input type="text" name="linkedin" placeholder="Linkedin URL:"> <br>
        <input type="text" name="github" placeholder="GitHub URL:"> <br>

        <button type="submit">Gerar QR Code</button>
    </form>
</div>