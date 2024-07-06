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

// Sign Up
var signUpInput = document.querySelector(".signup__input");
var signUpBtn = document.querySelector(".signup__btn");
var confirmation = document.querySelector(".confirmation");
var signUp = document.querySelector(".signup");
var signInBtn = document.querySelector(".sign-in-btn");

signUpBtn.addEventListener("click", (e) => {
  e.preventDefault();

  confirmation.classList.add("active");
  signUp.classList.add("hide");
});

signInBtn.addEventListener("click", () => {
  window.location.href = "../index.html";
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
