<link rel="stylesheet" href="/public/css/sidebar.css">
<script src="https://kit.fontawesome.com/654def639f.js" crossorigin="anonymous"></script>

<aside class="sidebar" id="sidebar">
    <div class="top-sidebar">
        <div id="perfil-sidebar">
            <img src="/public/assets/perfil.png" alt="Foto de perfil do usuário">

            <div id="texto-sidebar">
                <h1 id="welcome-sidebar">Bem vindo(a),</h1>
                <h2 id="welcome-user-sidebar">Usuário</h2>
            </div>

            <i class="fa-solid fa-chevron-left toggle-sidebar"></i>
        </div>
        <nav class="content-sidebar">

            <div id="imagem-sidebar">
                <img src="/public/assets/linhadivider.png" alt="Imagem de divisão da sidebar">
            </div>
            <ul>
                <li class="item-sidebar">
                    <a href="#">
                        <i class="fa-solid fa-house"></i>
                        <span class="item-description">Página Inicial</span>
                    </a>
                </li>
                <li class="item-sidebar active">
                    <a href="#">
                        <i class="fa-solid fa-chart-column"></i>
                        <span class="item-description">Dashboard</span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="#">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="item-description">Publicações</span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="#">
                        <i class="fa-solid fa-user-pen"></i>
                        <span class="item-description">Usuários</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="logout-sidebar">
    <form action="/logout" method="post">
        <button type="submit" id="button-logout">
            <i class="fa-solid fa-right-from-bracket" id="icon-logout"></i>
            <span class="item-description">Logout</span>
        </button>
    </form>
    </div>
</aside>
<script src="/public/js/sidebar.js"></script>