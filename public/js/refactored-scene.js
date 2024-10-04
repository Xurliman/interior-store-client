var optionsBtnSave = document.querySelectorAll(".options-btn-save");
var optionsMobileBtn = document.querySelector(".open-options-btn");
var shareModal = document.querySelector(".share-blackout");
var downloadModalBlackout = document.querySelectorAll(".download-blackout");
var downloadModal = document.querySelectorAll(".download-modal");
var optionsContainer = document.querySelector(".options-container");
var btnCloseShareModal = document.querySelectorAll(".close-share-modal");
var btnCloseSavedModal = document.querySelectorAll(".close-saved-modal");
var orderList = document.querySelector(".order__list");
var moveUpBtn = document.querySelector(".move-up");
moveUpBtn.addEventListener("click", () => {
    orderList.classList.toggle("open");
    moveUpBtn.classList.toggle("down");
});
var optionsBtn = document.querySelectorAll(".options__btn");
var optionsTip = document.querySelectorAll(".options__tip");
optionsBtn.forEach((button) => {
    button.addEventListener("mouseover", (e) => {
        var buttonTarget = e.target;
        var buttonAttr = buttonTarget.getAttribute("data-tip");

        optionsTip.forEach((el) => {
            var elAttr = el.getAttribute("data-tip");

            if (buttonAttr == elAttr) {
                el.classList.add("active");
            } else {
                el.classList.remove("active");
            }
        });
    });
    button.addEventListener("mouseout", (e) => {
        var buttonTarget = e.target;
        var buttonAttr = buttonTarget.getAttribute("data-tip");

        optionsTip.forEach((el) => {
            var elAttr = el.getAttribute("data-tip");

            if (buttonAttr == elAttr) {
                el.classList.remove("active");
            }
        });
    });
});
btnCloseShareModal.forEach((el) => {
    el.addEventListener("click", () => {
        shareModal.classList.remove("active");
    });
});

btnCloseSavedModal.forEach((el) => {
    el.addEventListener("click", () => {
    });
});

optionsMobileBtn.addEventListener("click", () => {
    optionsContainer.classList.toggle("open");
    checkOpenMenu();
});

optionsBtn.forEach((button) => {
    button.addEventListener("click", (e) => {
        var buttonTarget = e.target;
        var buttonAttr = buttonTarget.getAttribute("data-tip");
        switch (buttonAttr) {
            case "share":
                shareModal.classList.add("active");
                break;
            case "download":
                downloadModalBlackout.forEach((el) => {
                    el.classList.add("active");
                });
                break;
            default:
                break;
        }
    });
});

document.addEventListener("click", (e) => {
    if (
        e.target.classList.contains("share-blackout") ||
        e.target.classList.contains("download-blackout")
    ) {
        shareModal.classList.remove("active");
        downloadModalBlackout.forEach((el) => {
            el.classList.remove("active");
        });

        downloadModal.forEach((el) => {
        });
    }
});

var customBtn = document.querySelector(".custom-btn");
var custom = document.querySelector(".custom");
var customItemBtn = document.querySelectorAll(".custom-item-btn");
var customDropList = document.querySelectorAll(".custom-drop-list");
var lastClickedButton = null;
customItemBtn.forEach((button) => {
    button.addEventListener("click", (e) => {
        var btn = e.target;
        var buttonAttr = btn.getAttribute("data-item");
        customDropList.forEach((el) => {
            var listAttr = el.getAttribute("data-item");
            if (buttonAttr == listAttr) {
                el.classList.toggle("open");
            } else {
                el.classList.remove("open");
            }
        });

        button.classList.toggle("open");
        if (lastClickedButton && lastClickedButton !== button) {
            lastClickedButton.classList.remove("open");
        }

        lastClickedButton = button;
    });
});

customBtn.addEventListener("click", () => {
    custom.classList.toggle("open");

    if (custom.classList.contains("open")) {
        console.log();
    } else {
        customItemBtn.forEach((el) => {
            el.classList.remove("open");
        });

        customDropList.forEach((el) => {
            el.classList.remove("open");
        });
    }

    checkOpenMenu();
});
function checkOpenMenu() {
    if (custom.classList.contains("open")) {
        optionsContainer.classList.remove("open");
    } else if (optionsContainer.classList.contains("open")) {
        custom.classList.remove("open");
    } else {
        custom.classList.remove("open");
    }
}
var closePopup = document.querySelector(".close-popup");
var popupBlackout = document.querySelector(".popup-blackout");
var popupMobile = window.matchMedia("(max-width: 540px)").matches;

if (popupMobile) {
    popupBlackout.classList.add("active");
}

closePopup.addEventListener("click", () => {
    popupBlackout.classList.remove("active");
});

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("popup-blackout")) {
        popupBlackout.classList.remove("active");
    }
});

// Zooming / Panzoom;
var container = document.querySelector("#myPanzoom");
var zoomInButton = document.getElementById("zoomInButton");
var zoomOutButton = document.getElementById("zoomOutButton");

var maxScale = 5;
var isMobile = window.matchMedia("(max-width: 540px)").matches;

var panzoomInstance = new Panzoom(container, {
    disablePan: maxScale <= 1,
    minScale: isMobile ? 0.3 : 1,
    startScale: 1,
    increment: 0.1,
    contain: isMobile ? false : "outside",
    disableZoom: false,
});

if (isMobile) {
    container.addEventListener("wheel", panzoomInstance.zoomWithWheel);
    panzoomInstance.setOptions({ cursor: "grab" });
}

zoomInButton.addEventListener("click", () => panzoomInstance.zoomIn());
zoomOutButton.addEventListener("click", () => panzoomInstance.zoomOut());
document.addEventListener("livewire:navigated", () => {
    console.log("navigated")
    var cameraView = document.querySelector(".camera-view");
    var cameraViewBtn = document.querySelectorAll(".options-btn-3d");
    var viewScene = document.querySelector(".view-scene");
    var cameraItemView = document.querySelectorAll(".camera__item");
    var viewNum = "View1";

    var sceneImg = document.getElementById("scene-img");
    loadImageWithModal(sceneImg, `http://127.0.0.1:8000/storage/01J2Q09H0NJSQ5PQGE6DCM8TTK.jpg`);
    cameraViewBtn.forEach((element) => {
        element.addEventListener("click", () => {
            viewScene.classList.add("hide");
            cameraView.classList.add("active");
            custom.classList.remove("open");
        });
    });
    cameraItemView.forEach((view) => {
        view.addEventListener("click", (e) => {
            var viewTarget = e.target;
            var viewAttr = viewTarget.getAttribute("data-view");

            viewNum = viewAttr;

            viewScene.classList.remove("hide");
            cameraView.classList.remove("active");

            loadImageWithModal(sceneImg, `http://127.0.0.1:8000/storage/01J2Q09H0NJSQ5PQGE6DCM8TTK.jpg`);
        });
    });

    var maskBtn = document.querySelectorAll(".mask_btn");
    var maskWallPanels = document.querySelector(".mask-wall-pattern");
    var maskChairs = document.querySelector(".mask-chairs");
    var maskFloor = document.querySelector(".mask-floor");
    var maskLamps = document.querySelector(".mask-lamps");

    maskBtn.forEach((button) => {
        button.addEventListener("click", (e) => {
            var buttonTarget = e.target;
            var buttonAttr = buttonTarget.getAttribute("data-mask");
            switch (buttonAttr) {
                case "wall-pattern":
                    showMasks(maskWallPanels, buttonAttr);
                    break;
                case "chairs":
                    showMasks(maskChairs, buttonAttr);
                    break;
                case "floor":
                    showMasks(maskFloor, buttonAttr);
                    break;
                case "lamps":
                    showMasks(maskLamps, buttonAttr);
                    break;
                default:
                    break;
            }

            checkOpenMenu();
        });
    });

    function showMasks(mask, customMenu) {
        setTimeout(() => {
            mask.classList.remove("active");
        }, 200);
        mask.classList.add("active");
        customDropList.forEach((el) => {
            var listArtt = el.getAttribute("data-mask");

            if (listArtt == customMenu) {
                el.classList.add("open");
            } else {
                el.classList.remove("open");
            }
        });

        custom.classList.add("open");
    }
});
var loadingModal = document.getElementById("loadingModal");
function showLoadingModal() {
    loadingModal.style.display = "flex";
    console.log("downloading...");
}

function hideLoadingModal() {
    loadingModal.style.display = "none";
    console.log("downloaded");
}
function loadImageWithModal(imageElement, url) {
    showLoadingModal();
    setTimeout(() => {
        function onLoad() {
            hideLoadingModal();
            imageElement.removeEventListener("load", onLoad);
        }

        if (imageElement.complete && imageElement.naturalWidth !== 0) {
            hideLoadingModal();
        } else {
            imageElement.addEventListener("load", onLoad);
            imageElement.addEventListener("error", onLoad);
        }
    }, 800);
}
