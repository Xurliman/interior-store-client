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
