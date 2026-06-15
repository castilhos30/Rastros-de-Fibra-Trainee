document.onchange = function(event) {
    if (event.target.type === 'file') {
    const imagem = event.target.files[0];
    
    if (imagem){
        const container = event.target.closest('.lista-posts-identificacao');
        const previewImagem = container.querySelector('.lista-posts-imagem');
        if(previewImagem){
        previewImagem.src = URL.createObjectURL(imagem);
        }
    }
}}

function visibilidadeSenha(id) {
    const inputSenha = document.getElementById(id);
    if (inputSenha.type === "password") {
        inputSenha.type = "text";
        const olho = document.getElementById("olho");
        olho.classList.replace("bi-eye-slash", "bi-eye");

    } else {
        inputSenha.type = "password";
        const olho = document.getElementById("olho");
        olho.classList.replace("bi-eye", "bi-eye-slash");
    }
}  