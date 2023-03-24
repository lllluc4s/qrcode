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

    /* Estilo para os campos de entrada */
    p {
        margin-bottom: 10px;
        padding: 8px;
        width: 100%;
        max-width: 300px;
    }

    /* Estilo para o botão */
    .button {
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
    <h1>My history</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In non hendrerit mauris. Proin eu elit elit. Integer sed tellus lacus. Nulla facilisi. Aliquam tincidunt ligula vel dolor lacinia euismod.</p>

    <p style="text-align: center;">
        <a href="{{ $linkedin }}" class="button">LinkedIn</a>
        <a href="{{ $github }}" class="button">GitHub</a>
    </p>
</div>