// Drop Dwon List
var secondNavBtn = document.querySelector(".second-nav-btn");
var secondDropDown = document.querySelector(".second-nav-drop-down");
var secondBlackout = document.querySelector(".second-blackout");

secondNavBtn.addEventListener("click", () => {
  secondDropDown.classList.add("open");
  secondBlackout.classList.add("active");
});

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("second-blackout")) {
    secondDropDown.classList.remove("open");
    secondBlackout.classList.remove("active");
  } else {
    console.log();
  }
});

// Swiper Carousel
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

// Chat Modal
var chatBtnClose = document.querySelector(".chat-popup-btn-close");
var chat = document.querySelector(".chat-popup");
var openChatBtn = document.querySelector(".open-chat-btn");
var blackoutWhite = document.querySelector(".blackout-white");
var chatSendBtn = document.querySelector(".chat-popup-send-btn");

chatSendBtn.addEventListener("click", (e) => e.preventDefault());

openChatBtn.addEventListener("click", () => {
  chat.classList.add("open");
  blackoutWhite.classList.add("active");
});

chatBtnClose.addEventListener("click", (e) => {
  e.preventDefault();
  chat.classList.remove("open");
  blackoutWhite.classList.remove("active");
});

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("blackout-white")) {
    blackoutWhite.classList.remove("active");
    chat.classList.remove("open");
  } else {
    console.log();
  }
});

// Open Scene
var carouselBtnStart = document.querySelectorAll(".carousel__btn-start");

carouselBtnStart.forEach((element) => {
  element.addEventListener("click", () => {
    window.location.href = "../scene-configurator.html";
  });
});

// Push Scene Background LocalStorage
var kitchenScene = document.querySelectorAll(".kitchen-scene");

kitchenScene.forEach((scene) => {
  scene.addEventListener("click", (e) => {
    var sceneTarget = e.target;
    var sceneAttr = sceneTarget.getAttribute("data-scene");

    localStorage.setItem("scene-bg", sceneAttr);
  });
});
