const hamburger = document.getElementById("header-hamburger");
const hamburger_close = document.getElementById("header-hamburger-close");
const overlay = document.getElementById("header-overlay");
const menu = document.getElementById("header-menu");

function toggleMenu() {
  hamburger.classList.toggle("--open");
  menu.classList.toggle("--open");
  overlay.classList.toggle("--active");
}

function closeMenu() {
  hamburger.classList.remove("--open");
  menu.classList.remove("--open");
  overlay.classList.remove("--active");
}

hamburger.addEventListener("click", toggleMenu);
overlay.addEventListener("click", closeMenu);
hamburger_close.addEventListener("click", closeMenu);