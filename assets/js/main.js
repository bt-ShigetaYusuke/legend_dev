// headerメニュー
const hamburger = document.getElementById("header-hamburger");
const hamburger_close = document.getElementById("header-hamburger-close");
const overlay = document.getElementById("header-overlay");
const menu = document.getElementById("header-nav");

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

// ページ内遷移
function handleAnchorClicks() {
  document.querySelectorAll('a[href*="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const hash = this.getAttribute("href").split("#")[1];
      const target = document.querySelector(`#${hash}`);
      if (target) {
        e.preventDefault();
        const top = window.pageYOffset + target.getBoundingClientRect().top;
        window.scrollTo({
          top: top,
          behavior: "smooth",
        });
        closeMenu();
      }
    });
  });
}

// トップページの時だけhandleAnchorClicksを実行
if (window.location.pathname === "/") {
  handleAnchorClicks();
}

// swiper トップページ
function swiper() {
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    speed: 3000,
    allowTouchMove: true,
    // slidesPerView: 3,
    slidesPerView: "auto",
    // centeredSlides: true,
    spaceBetween: 0,
    autoplay: {
      delay: 0,
      pauseOnMouseEnter: true,
      disableOnInteraction: false,
    },
    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
    // navigation: {
    //   nextEl: ".swiper-button-next",
    //   prevEl: ".swiper-button-prev",
    // },
  });
}

swiper();
