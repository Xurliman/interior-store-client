// Open Request Modal
var requestCloseBtn = document.querySelectorAll(".request-close-btn");
var requestBlackout = document.querySelector(".request-blackout");
var contactFormSendBtn = document.querySelector(".contact-form-send-btn");

contactFormSendBtn.addEventListener("click", (e) => {
    e.preventDefault();
    requestBlackout.classList.add("active");
});

requestCloseBtn.forEach((element) => {
    element.addEventListener("click", () => {
        requestBlackout.classList.remove("active");
    });
});

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("request-blackout")) {
        requestBlackout.classList.remove("active");
    }
});
