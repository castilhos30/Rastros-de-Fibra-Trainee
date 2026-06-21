<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <!--Fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
    <!--Icones-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />
</head>

<body>
    <header class="navbar" id='navbar'>
        <div class="navbar-logo"><img src="../../../public/assets/Rato-texto.png" alt="Logo Rastro de Fibra"
                width="177px" height="65px"></div>
        <span class="material-symbols-outlined navbar-abrir" id="navbar-abrir" onclick="abrirMenu()">
            menu
        </span>
        <ul class="navbar-links" id="navbar-links">
            <li><a class="navbar-link" id="navbar-home" href="/landingpage">Home</a></li>
            <li><a class="navbar-link" id="navbar-posts" href="/pagina-de-posts">Posts</a></li>
            <?php if ($_SESSION) {
                echo "<li><a class='navbar-link' href='/dashboard'>Dashboard</a></li>";
            } else {
                echo "<li><a class='navbar-link' href='/login'>Login</a></li>";
            } ?>
            <li><a class="navbar-link" id="navbar-dicas" href="/api">Dicas</a></li>
        </ul>
        <span class="material-symbols-outlined navbar-fechar" id="navbar-fechar" onclick="fecharMenu()">
            close
        </span>
    </header>
    <script src="../../../public/js/navbar.js"></script>
</body>

</html>