// Get browser's height
const appHeight = () =>
    document.documentElement.style.setProperty(
        "--address-bar-height",
        `${window.innerHeight}px`
    );
window.addEventListener("resize", appHeight);
appHeight();
//  Swiper Carousel
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

// Open | Close Sign Up Modal
var signInBtn = document.querySelector(".sign-in-btn");
var signInModal = document.querySelector(".signin");
var signInClose = document.querySelector(".sign-in-close");
var blackout = document.querySelector(".blackout");
var signInSubmit = document.querySelector(".sign-in-submit");
var signInEmail = document.querySelector(".sign-in-email");
var signInPassword = document.querySelector(".sign-in-password");

// signInClose.addEventListener("click", () => {
//   signInModal.classList.remove("open");
//   blackout.classList.remove("active");
// });

// signInBtn.addEventListener("click", () => {
//   signInModal.classList.add("open");
//   blackout.classList.add("active");
// });

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("blackout")) {
        blackout.classList.remove("active");
        signInModal.classList.remove("open");
    } else {
        console.log();
    }
});

// signInSubmit.addEventListener("click", () => {
//   window.location.href = "../user.html";
// });

// Drop Dwon List
var secondNavBtn = document.querySelector(".second-nav-btn");
var secondDropDown = document.querySelector(".second-nav-drop-down");
var secondBlackout = document.querySelector(".second-blackout");
if (
    window.location.pathname !== '/' &&
    window.location.pathname !== '/about' &&
    window.location.pathname !== '/contact' &&
    window.location.pathname !== '/faq'
) {
    document.getElementById('close-button').classList.remove('hide');
}


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

// Open Sign Up Modal
// var signUpBtn = document.querySelector(".sign-up-btn");

// signUpBtn.addEventListener("click", () => {
//   window.location.href = "../signup.html";
// });

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

        console.log(sceneAttr);

        localStorage.setItem("scene-bg", sceneAttr);
    });
});
