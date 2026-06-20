const sidebar = document.querySelector('.sidebar');
const sidebarToggle = document.querySelector('.toggle-sidebar');
const sidebarMobileToggle = document.querySelector('.sidebar-mobile-toggle');
const sidebarBackdrop = document.querySelector('.sidebar-backdrop');

function openSidebar() {
   if (!sidebar) {
      return;
   }

   sidebar.classList.add('is-open');
   if (sidebarBackdrop) {
      sidebarBackdrop.classList.add('is-visible');
   }
   document.body.classList.add('sidebar-open');

   if (sidebarMobileToggle) {
      sidebarMobileToggle.classList.add('is-hidden');
      sidebarMobileToggle.setAttribute('aria-expanded', 'true');
   }
}

function closeSidebar() {
   if (!sidebar) {
      return;
   }

   sidebar.classList.remove('is-open');
   if (sidebarBackdrop) {
      sidebarBackdrop.classList.remove('is-visible');
   }
   document.body.classList.remove('sidebar-open');

   if (sidebarMobileToggle) {
      sidebarMobileToggle.classList.remove('is-hidden');
      sidebarMobileToggle.setAttribute('aria-expanded', 'false');
   }
}

if (sidebarToggle) {
   sidebarToggle.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
         closeSidebar();
         return;
      }

      sidebar.classList.toggle('closed-sidebar');
   });
}

if (sidebarMobileToggle) {
   sidebarMobileToggle.addEventListener('click', openSidebar);
}

if (sidebarBackdrop) {
   sidebarBackdrop.addEventListener('click', closeSidebar);
}

window.addEventListener('resize', () => {
   if (window.innerWidth > 768) {
      closeSidebar();
      if (sidebar) {
         sidebar.classList.remove('closed-sidebar');
      }
   }
});

if (document.title === "Lista de Posts") {
   document.getElementById("Posts").classList.add("active");
}
if (document.title === "Lista de Usuarios") {
   document.getElementById("Usuarios").classList.add("active");
}
if (document.title === "Dashboard") {
   document.getElementById("Dashboard").classList.add("active");
}