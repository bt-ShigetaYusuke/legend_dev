var hamburger = document.querySelector(".hamburger"),
    hamburger_close = document.querySelector(".hamburger-close"),
    overlay = document.querySelector(".overlay"),
    menu = document.querySelector(".menu");

function toggleMenu() {
  hamburger.classList.toggle("open");
  menu.classList.toggle("open");
  overlay.classList.toggle("active");
}

function closeMenu() {
  hamburger.classList.remove("open");
  menu.classList.remove("open");
  overlay.classList.remove("active");
}

hamburger.addEventListener("click", toggleMenu);
overlay.addEventListener("click", closeMenu);
hamburger_close.addEventListener("click", closeMenu);

