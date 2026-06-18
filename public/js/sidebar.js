const buttonToggle = document.querySelector('.toggle-sidebar');
buttonToggle.addEventListener('click', () => {
   document.querySelector('.sidebar').classList.toggle('closed-sidebar');
})

if (document.title === "Lista de Posts") {
   document.getElementById("Posts").classList.add("active");
}
if (document.title === "Lista de Usuarios") {
   document.getElementById("Usuarios").classList.add("active");
}
if (document.title === "Dashboard") {
   document.getElementById("Dashboard").classList.add("active");
}