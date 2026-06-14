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