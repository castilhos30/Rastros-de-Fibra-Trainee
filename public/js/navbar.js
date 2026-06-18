function abrirMenu(){
    document.querySelector('body').style.height = '100vh';
    document.querySelector('header').style.position = 'fixed';
    document.querySelector('body').style.overflow = 'hidden';
    document.querySelector('body').style.overflowX = 'hidden';
    document.querySelector('header').style.height = '100vh';
    document.querySelector('header').style.padding = '3%';
    document.querySelector('header').style.paddingBottom = 'calc(3% + 20px)'
    document.querySelector('header').style.backgroundColor = '#0C1A27';
    document.querySelector('header').style.flexDirection = 'column';  
    document.querySelector('header').style.gap = '20px';
    document.querySelector('header').style.zIndex = '10';
    document.getElementById('navbar-links').style.gap = '25px'; 
    document.querySelector('header').style.justifyContent = 'space-around';   
    

    document.querySelector('img').style.width = '177px';
    document.querySelector('img').style.height = '65px';

    document.getElementById('navbar-links').style.display = 'flex';
    document.getElementById('navbar-links').style.fontSize = '32px';
    document.getElementById('navbar-links').style.flexDirection = 'column';

    document.getElementById('navbar-abrir').style.display = 'none';
    document.getElementById('navbar-fechar').style.display = 'flex';
}

function fecharMenu(){
    document.querySelector('body').style.height = '';
    document.querySelector('header').style.position = '';
    document.querySelector('body').style.overflow = '';
    document.querySelector('body').style.overflowX = '';
    document.querySelector('header').style.height = '';
    document.querySelector('header').style.padding = '';
    document.querySelector('header').style.paddingBottom = ''
    document.querySelector('header').style.backgroundColor = '';
    document.querySelector('header').style.flexDirection = '';
    document.querySelector('header').style.justifyContent = '';
    document.querySelector('header').style.gap = '';
    document.getElementById('navbar-links').style.gap = '';
    document.querySelector('header').style.justifyContent = '';  

    document.querySelector('img').style.width = '';
    document.querySelector('img').style.height = '';

    document.getElementById('navbar-links').style.display = '';
    document.getElementById('navbar-links').style.fontSize = '';
    document.getElementById('navbar-links').style.flexDirection = '';

    document.getElementById('navbar-abrir').style.display = '';
    document.getElementById('navbar-fechar').style.display = '';
}

const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
  if (window.scrollY > 30) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});
if (document.title === "Posts") {
  document.getElementById("navbar-posts").style.color = "#05AC4B";
  document.getElementById("navbar-posts").style.textDecoration= "underline";
  document.getElementById("navbar-posts").style.textDecorationThickness = "2px";
}

if (document.title === "Rastros de Fibra") {
  document.getElementById("navbar-home").style.color = "#05AC4B";
  document.getElementById("navbar-home").style.textDecoration= "underline";
  document.getElementById("navbar-home").style.textDecorationThickness = "2px";
}

