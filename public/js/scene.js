// Drop Down List
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

// Products Array
var customArr = [];

// Products Count
var countItems = 0;

// Products array for 'My Gallary'
var productArr = [];

// Chosen product mask
var productMaskChairs = "BarStool1";
var productMaskLamps = "lamp1";

// Options Btns
var optionsBtnSave = document.querySelectorAll(".options-btn-save");
var optionsBtn3d = document.querySelector(".options-btn-3d");
var optionsBtnDownload = document.querySelector(".options-btn-download");
var optionsBtnPrint = document.querySelector(".options-btn-print");
var optionsBtnShare = document.querySelectorAll(".options-btn-share");
var openOptionsBtn = document.querySelector(".open-options-btn");
var optionsMobileBtn = document.querySelector(".open-options-btn");

// Option Modals
var shareModal = document.querySelector(".share-blackout");
var savedModal = document.querySelector(".saved-modal");
var savedModalBlackout = document.querySelector(".saved-blackout");
var savedModalEmpty = document.querySelector(".saved-modal-empty");
var downloadModalBlackout = document.querySelectorAll(".download-blackout");
var downloadModal = document.querySelectorAll(".download-modal");
var optionsBoxMobile = document.querySelector(".options-box-mobile");
var optionsContainer = document.querySelector(".options-container");

// Option Btns Close Modals
var btnCloseShareModal = document.querySelectorAll(".close-share-modal");
var btnCloseSavedModal = document.querySelectorAll(".close-saved-modal");
var btnMoveToGallary = document.querySelector(".check-out-saved-modal");

// Show Order List
var orderList = document.querySelector(".order__list");
var moveUpBtn = document.querySelector(".move-up");

moveUpBtn.addEventListener("click", () => {
    orderList.classList.toggle("open");
    moveUpBtn.classList.toggle("down");
});

// Show Options Btn Tips
var optionsBtn = document.querySelectorAll(".options__btn");
var optionsTip = document.querySelectorAll(".options__tip");

// Show Options Tips
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

    // Hide Options Tips
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
        savedModalBlackout.classList.remove("active");
        savedModalEmpty.classList.remove("active");
        savedModal.classList.remove("active");
    });
});

btnMoveToGallary.addEventListener("click", () => {
    window.location.href = "../gallery.html";
});

// Open Mobile Options Menu / Hide Desktop Options menu
optionsMobileBtn.addEventListener("click", () => {
    optionsContainer.classList.toggle("open");
    checkOpenMenu();
});

// Open Options Modal
optionsBtn.forEach((button) => {
    button.addEventListener("click", (e) => {
        var buttonTarget = e.target;
        var buttonAttr = buttonTarget.getAttribute("data-tip");
        switch (buttonAttr) {
            case "share":
                shareModal.classList.add("active");
                break;
            case "save":
                if (customArr.length !== 0) {
                    savedModalBlackout.classList.add("active");
                    savedModal.classList.add("active");
                } else {
                    savedModalBlackout.classList.add("active");
                    savedModalEmpty.classList.add("active");
                }
                break;
            case "download":
                downloadModalBlackout.forEach((el) => {
                    el.classList.add("active");
                });

                downloadModal.forEach((el) => {
                    el.classList.add("active");
                });
                break;
            default:
                break;
        }
    });
});

// Remove All Blackouts From Modals
document.addEventListener("click", (e) => {
    if (
        e.target.classList.contains("share-blackout") ||
        e.target.classList.contains("saved-blackout") ||
        e.target.classList.contains("download-blackout")
    ) {
        shareModal.classList.remove("active");
        savedModalBlackout.classList.remove("active");
        savedModalEmpty.classList.remove("active");
        savedModal.classList.remove("active");

        downloadModalBlackout.forEach((el) => {
            el.classList.remove("active");
        });

        downloadModal.forEach((el) => {
            el.classList.remove("active");
        });
    }
});

// Custon Item Btns
var customItemBtn = document.querySelectorAll(".custom-item-btn");
var customDropList = document.querySelectorAll(".custom-drop-list");
var customBtn = document.querySelector(".custom-btn");
var removeBtn = document.querySelectorAll(".custom-item-remove");
var custom = document.querySelector(".custom");
var lastClickedButton = null;

// Open Cusotm Menu Items
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

// Open Custom Menu
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

// Custom Objects Chairs
var objectBarStoolsBtn = document.querySelectorAll(".object-bar-stool-btn");
var barStoolsImg = document.querySelectorAll(".bar-stool-img");

objectBarStoolsBtn.forEach((button) => {
    customObjectsHandler(button, barStoolsImg);
});

// Custom Objects Lamps
var objectLamp = document.querySelectorAll(".object-lamp-btn");
var lampImg = document.querySelectorAll(".lamp-img");

objectLamp.forEach((button) => {
    customObjectsHandler(button, lampImg);
});

// Custom Objects Fartuk
var objectFartukBtn = document.querySelectorAll(".object-fartuk-btn");
var fartukImg = document.querySelectorAll(".fartuk-img");

objectFartukBtn.forEach((button) => {
    customObjectsHandler(button, fartukImg);
});

// Custom Objects Portuquet
var objectParquetBtn = document.querySelectorAll(".object-parquet-btn");
var portuquetImg = document.querySelectorAll(".portuquet-img");

objectParquetBtn.forEach((button) => {
    customObjectsHandler(button, portuquetImg);
});

// Custom Objects Handler
function customObjectsHandler(button, object) {
    button.addEventListener("click", (e) => {
        var objectBtn = e.target;
        var objectBtnAttr = objectBtn.getAttribute("data-object");
        var objectBtnMaskAttr = objectBtn.getAttribute("data-mask");
        var objectRemoveAttr = objectBtn.getAttribute("data-remove");

        object.forEach((el) => {
            var objectAttr = el.getAttribute("data-object");

            if (objectAttr == objectBtnAttr) {
                // el.classList.add("object-visible");
            } else {
                // el.classList.remove("object-visible");
            }
        });

        // Check clicked product type for masks
        // if (objectBtnMaskAttr == "chairs") {
        //     // productMaskChairs = objectBtnAttr;
        // } else if (objectBtnMaskAttr == "lamps") {
        //     // productMaskLamps = objectBtnAttr;
        // }

        // Remove added products
        removeBtn.forEach((btn) => {
            var btnAttr = btn.getAttribute("data-remove");
            if (btnAttr == objectRemoveAttr) {
                btn.classList.add("active");

                btn.addEventListener("click", () => {
                    object.forEach((el) => {
                        var elProduct = el.getAttribute("data-product");

                        if (el.classList.contains("object-visible")) {
                            var indexProductArr = productArr.findIndex(
                                (item) => item.elProduct === elProduct
                            );
                            var indexCustomArr = customArr.findIndex(
                                (item) => item.elProduct === elProduct
                            );

                            if (
                                indexProductArr !== -1 ||
                                indexCustomArr !== -1
                            ) {
                                productArr.splice(indexProductArr, 1);
                                customArr.splice(indexCustomArr, 1);
                                countItems--;
                            }
                        }

                        el.classList.remove("object-visible");
                        btn.classList.remove("active");
                    });
                });
            }
        });

        checkObjectProduct(object);
    });
}

// Check Object Product
function checkObjectProduct(product) {
    product.forEach((el) => {
        var elProduct = el.getAttribute("data-product");
        var elPrice = el.getAttribute("data-price");

        if (el.classList.contains("object-visible")) {
            var existingProductIndex = customArr.findIndex(
                (item) => item.elProduct === elProduct
            );
            var existingProductIndexPr = productArr.findIndex(
                (item) => item.elProduct === elProduct
            );

            if (existingProductIndex === -1 || existingProductIndexPr === -1) {
                customArr.push({
                    elProduct,
                    elPrice,
                });

                productArr.push({
                    elProduct,
                    elPrice,
                });

                countItems++;
            }
        } else {
            var existingItemIndex = customArr.findIndex(
                (item) => item.elProduct === elProduct
            );
            var existingProductIndex = productArr.findIndex(
                (item) => item.elProduct === elProduct
            );

            if (existingItemIndex !== -1 || existingProductIndex !== -1) {
                customArr.splice(existingItemIndex, 1);
                productArr.splice(existingProductIndex, 1);
                countItems--;
            }
        }
    });
}

optionsBtnSave.forEach((element) => {
    element.addEventListener("click", () => {
        pushProductsToSavedModal();
    });
});

document.addEventListener("click", () => {
    pushProductsOrder();
});

// Push Products to Order
function pushProductsOrder() {
    var orderList = document.querySelector(".order__list");
    var orderCount = document.querySelector(".order__count");

    // if (customArr.length !== 0) {
    //     orderList.innerHTML = "";
    // }

    customArr.forEach((item) => {
        // var product = item.elProduct;
        // var price = item.elPrice;
        // var itemElement = document.createElement("div");
        //
        // itemElement.innerHTML = `
        //         <div class="order__item d-flex flex-column">
        //             <span class="order__item_title">${product}</span>
        //             <span class="order__item_price">$${price}</span>
        //         </div>
        // `;
        //
        // orderList.appendChild(itemElement);
    });

    if (countItems <= 1) {
        // orderCount.innerHTML = `${countItems} item`;
    } else {
        // orderCount.innerHTML = `${countItems} items`;
    }
}

// Save Products To Saved Modal
function pushProductsToSavedModal() {
    var savedModalItems = document.querySelector(".saved-modal__items");
    savedModalItems.innerHTML = "";

    productArr.forEach((item) => {
        var product = item.elProduct;
        var price = item.elPrice;
        var savedItem = document.createElement("div");

        savedItem.innerHTML = `
        <div class="saved-modal__item d-flex">
            <h5 class="saved-modal__item_title h5">${product} &nbsp;</h5>
            <h5 class="saved-modal__item-price">$${price}</h5>
        </div>
    `;

        // savedModalItems.appendChild(savedItem);
    });
}

// Close Custom Menu if Options Menu is open
function checkOpenMenu() {
    if (custom.classList.contains("open")) {
        optionsContainer.classList.remove("open");
    } else if (optionsContainer.classList.contains("open")) {
        custom.classList.remove("open");
    } else {
        custom.classList.remove("open");
    }
}

// Open Popup notify
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

// Masks
var masks = document.querySelectorAll(".mask_btn");

zoomInButton.addEventListener("click", () => panzoomInstance.zoomIn());

zoomOutButton.addEventListener("click", () => panzoomInstance.zoomOut());

// Get Chosen Scene
document.addEventListener("livewire:navigated", () => {
    // Get scene-kitchen
    var kitchen = localStorage.getItem("scene-bg");

    // Show Camera View
    var cameraView = document.querySelector(".camera-view");
    var cameraViewBtn = document.querySelectorAll(".options-btn-3d");
    var viewScene = document.querySelector(".view-scene");
    var cameraItemView = document.querySelectorAll(".camera__item");
    var view1 = document.querySelector(".view1");
    var view2 = document.querySelector(".view2");
    var view3 = document.querySelector(".view3");
    var foregroundBlack = document.querySelector(".foreground-black");
    var foregroundBlackView2 = document.querySelector(
        ".foreground-black-view2"
    );
    var foregroundRed = document.querySelector(".foreground-red");
    var foregroundRedView2 = document.querySelector(".foreground-red-view2");
    var viewNum = "View1";

    var sceneImg = document.getElementById("scene-img");
    var wallPattern = document.getElementById("wall-pattern");
    var chair = document.getElementById("chair");

    // Scene Masks
    var kitchenBlackMasks = document.querySelector(".kitchen-black-masks");
    var kitchenRedMasks = document.querySelector(".kitchen-red-masks");
    var kitchenWhiteMasks = document.querySelector(".kitchen-white-masks");
    var maskWallPanels = document.querySelector(".mask-wall-pattern");
    var maskChairs = document.querySelector(".mask-chairs");
    var maskFloor = document.querySelector(".mask-floor");
    var maskLamps = document.querySelector(".mask-lamps");
    var kitchenView1 = document.querySelectorAll(".kitchen-view1");
    var kitchenView2 = document.querySelectorAll(".kitchen-view2");
    var kitchenView3 = document.querySelectorAll(".kitchen-view3");

    // Scene Custom Items
    var chairsCustomImg = document.querySelector(".custom-chairs-img");
    var floorCustomImg = document.querySelector(".floor-custom-img");
    var lampsCustomImg = document.querySelector(".custom-lamps-img");

    // Scene Custom Items
    var customFartuks = document.querySelectorAll(".custom-fartuk");
    var customFloors = document.querySelectorAll(".custom-parquet");
    var customChairs = document.querySelectorAll(".custom-chair");
    var customLamps = document.querySelectorAll(".custom-lamp");

    // Scene Objects
    var objectFloor = document.querySelectorAll(".portuquet-img");
    var objectFartuk = document.querySelectorAll(".fartuk-img");
    var objectChair = document.querySelectorAll(".bar-stool-img");
    var objectLamp = document.querySelectorAll(".lamp-img");
    var chirsBox = document.querySelector(".bar-stools");
    var portuquetsBox = document.querySelector(".portuquets");
    var lampsBox = document.querySelector(".lamps");

    var wallPattern = document.getElementById("wall-pattern");
    var chair = document.getElementById("chair");
    var floor = document.getElementById("floor");
    var lamp = document.getElementById("lamp");
    // loadImageWithModal(
    //     floorCustomImg,
    //     `./img/${kitchen}/Detailed/Parquet1.jpg`
    // );
    loadImageWithModal(sceneImg, `http://127.0.0.1:8000/storage/01J2Q09H0NJSQ5PQGE6DCM8TTK.jpg`);

    // floor.style = "display: block";
    // lamp.style = "display: block";
    // chair.style = "display: block";

    // Open / Close | Scene / Camera View
    cameraViewBtn.forEach((element) => {
        element.addEventListener("click", () => {
            viewScene.classList.add("hide");
            cameraView.classList.add("active");
            custom.classList.remove("open");
            // view1.src = `./img/${kitchen}/View1/Jpeg/Final.jpg`;
            // view2.src = `./img/${kitchen}/View2/Jpeg/Final.jpg`;
            // view3.src = `./img/${kitchen}/View3/Jpeg/Final.jpg`;
        });
    });
    // if (kitchen == "kitchen-black") {
    //     foregroundBlack.classList.add("active");
    // } else if (kitchen == "kitchen-red") {
    //     foregroundRed.classList.add("active");
    // }

    // Kitchens foreground
    // switch (kitchen) {
    //     case "kitchen-black":
    //         foregroundBlack.classList.add("active");
    //         foregroundRed.classList.remove("active");
    //         break;
    //     case "kitchen-red":
    //         foregroundRed.classList.add("active");
    //         foregroundBlack.classList.remove("active");
    //         break;
    //     default:
    //         foregroundBlack.classList.remove("active");
    //         foregroundRed.classList.remove("active");
    //         break;
    // }

    // Open Chosen Camera View
    cameraItemView.forEach((view) => {
        view.addEventListener("click", (e) => {
            var viewTarget = e.target;
            var viewAttr = viewTarget.getAttribute("data-view");

            viewNum = viewAttr;
            changeObjectsView(viewNum);
            changeMasksView(viewNum);
            changeObjectMaksView(viewNum);

            viewScene.classList.remove("hide");
            cameraView.classList.remove("active");

            loadImageWithModal(sceneImg, `http://127.0.0.1:8000/storage/01J2Q09H0NJSQ5PQGE6DCM8TTK.jpg`);

            switch (viewAttr) {
                case "View1":
                    if (kitchen === "kitchen-black") {
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.remove("active");
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.add("active");
                        floor.style = "display: block";
                    }
                    if (kitchen === "kitchen-red") {
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.remove("active");
                        // foregroundRed.classList.add("active");
                        // foregroundRedView2.classList.remove("active");
                        floor.style = "display: block";
                        lamp.style = "display: block";
                        lampsBox.style = "display: block";
                        portuquetsBox.style = "display: block";
                    }
                    if (kitchen === "kitchen-white") {
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.remove("active");
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.remove("active");
                        chair.style = "display: block";
                        lamp.style = "display: block";
                        lampsBox.style = "display: block";
                        chirsBox.style = "display: block";
                    }
                    break;
                case "View2":
                    if (kitchen === "kitchen-white") {
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.remove("active");
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.remove("active");
                        chirsBox.style = "display: none";
                        chair.style = "display: none";
                        lamp.style = "display: none";
                        lampsBox.style = "display: none";
                    }
                    if (kitchen === "kitchen-red") {
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.remove("active");
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.add("active");
                        floor.style = "display: block";
                        lamp.style = "display: block";
                        lampsBox.style = "display: block";
                        portuquetsBox.style = "display: block";
                    }
                    if (kitchen === "kitchen-black") {
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.remove("active");
                        // foregroundBlackView2.classList.add("active");
                        // foregroundBlack.classList.remove("active");
                        floor.style = "display: block";
                    }
                    break;
                case "View3":
                    if (kitchen === "kitchen-white") {
                        chair.style = "display: block";
                        lampsBox.style = "display: none";
                        chirsBox.style = "display: block";
                        floor.style = "display: block";
                    }
                    if (
                        kitchen === "kitchen-black" ||
                        kitchen === "kitchen-red"
                    ) {
                        floor.style = "display: none";
                    }
                    if (kitchen === "kitchen-red") {
                        // foregroundRed.classList.remove("active");
                        // foregroundRedView2.classList.remove("active");
                        lampsBox.style = "display: none";
                        lamp.style = "display: none";
                        // foregroundRed.classList.remove("active");
                        // foregroundBlackView2.classList.remove("active");
                        portuquetsBox.style = "display: none";
                    }
                    if (kitchen === "kitchen-black") {
                        // foregroundBlackView2.classList.remove("active");
                        // foregroundBlack.classList.remove("active");
                        portuquetsBox.classList.add("hide");
                    } else {
                        portuquetsBox.classList.remove("hide");
                    }
                    break;
            }
        });
    });

    var maskBtn = document.querySelectorAll(".mask_btn");
    var masks = document.querySelectorAll(".mask");
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

    // Show forEach Masks
    function showMasks(mask, customMenu) {
        // Remove Masks
        setTimeout(() => {
            mask.classList.remove("active");
        }, 200);

        // Check Chosen Product Mask
        var maskAttr = mask.getAttribute("data-mask");
        mask.classList.add("active");

        if (maskAttr == "chairs") {
            // mask.src = `./img/${kitchen}/${viewNum}/Masks/Png/${productMaskChairs}.png`;
        } else if (maskAttr == "lamps") {
            // mask.src = `./img/${kitchen}/${viewNum}/Masks/Png/${productMaskLamps}.png`;
        } else if (maskAttr == "floor") {
            // mask.src = `./img/${kitchen}/${viewNum}/Masks/Png/Parquet.png`;
        } else if (maskAttr == "wall-pattern") {
            // mask.src = `./img/${kitchen}/${viewNum}/Masks/Png/KitchenFartuk.png`;
        }

        // Open Custom Menu
        customItemBtn.forEach((button) => {
            var buttonAttr = button.getAttribute("data-mask");

            if (buttonAttr == customMenu) {
                button.classList.add("open");
            } else {
                button.classList.remove("open");
            }
            console.log("working")
        });

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

    // Show Maks Block
    // switch (kitchen) {
    //     case "kitchen-black":
    //         kitchenBlackMasks.classList.add("active");
    //         break;
    //     case "kitchen-red":
    //         kitchenRedMasks.classList.add("active");
    //         break;
    //     case "kitchen-white":
    //         kitchenWhiteMasks.classList.add("active");
    //         break;
    //     default:
    //         break;
    // }

    // Show View Masks
    function changeMasksView(view) {
    //     switch (view) {
    //         case "View1":
    //             kitchenView1.forEach((el) => el.classList.add("active"));
    //             break;
    //         case "View2":
    //             kitchenView2.forEach((el) => el.classList.add("active"));
    //             kitchenView1.forEach((el) => el.classList.remove("active"));
    //             break;
    //         case "View3":
    //             kitchenView3.forEach((el) => el.classList.add("active"));
    //             kitchenView1.forEach((el) => el.classList.remove("active"));
    //             break;
    //         default:
    //             break;
    //     }
    }

    // Show View Object Masks
    function changeObjectMaksView(view) {
    //     maskWallPanels.src = `./img/${kitchen}/${view}/Masks/Png/KitchenFartuk.png`;
    //     maskChairs.src = `./img/${kitchen}/${view}/Masks/Png/BarStool1.png`;
    //     maskLamps.src = `./img/${kitchen}/${view}/Masks/Png/Lamp1.png`;
    //     maskFloor.src = `./img/${kitchen}/${view}/Masks/Png/Parquet.png`;
    }

    // Change Chairs Custom img
    // switch (kitchen) {
    //     case "kitchen-black":
    //         chairsCustomImg.src = `./img/kitchen-black/Detailed/BarStool1.jpg`;
    //         break;
    //     case "kitchen-white":
    //         chairsCustomImg.src = `../img/kitchen-white/Detailed/BarStool1.jpg`;
    //         break;
    //     default:
    //         break;
    // }

    // Change Lamps Custom img
    // switch (kitchen) {
    //     case "kitchen-black":
    //         lampsCustomImg.src = `./img/kitchen-black/Detailed/Lamp1.jpg`;
    //         break;
    //     case "kitchen-red":
    //         lampsCustomImg.src = `./img/kitchen-red/Detailed/Lamp1.jpg`;
    //         break;
    //     case "kitchen-white":
    //         lampsCustomImg.src = `./img/kitchen-white/Detailed/Lamp1.jpg`;
    //         break;
    //     default:
    //         break;
    // }

    // Wall Pattern Custom
    // customFartuks.forEach((img, index) => {
    //     img.src = `./img/${kitchen}/Detailed/KitchenFartuk${index + 1}.jpg`;
    //
    //     img.onerror = () => {};
    // });

    // Floor Custom
    // customFloors.forEach((img, index) => {
    //     img.src = `./img/${kitchen}/Detailed/Parquet${index + 1}.jpg`;
    // });

    // Chair Custom
    // customChairs.forEach((img, index) => {
    //     if (kitchen == "kitchen-white") {
    //         var kitchenWhiteChair = document.querySelector(
    //             ".kitchen-white-chair"
    //         );
    //         kitchenWhiteChair.style = "display: none";
    //     }
    //
    //     img.src = `./img/${kitchen}/Detailed/BarStool${index + 1}.jpg`;
    // });

    // Lamp Custom
    // customLamps.forEach((img, index) => {
    //     switch (kitchen) {
    //         case "kitchen-red":
    //             var kitchenRedLamp =
    //                 document.querySelectorAll(".kitchen-red-lamp");
    //             kitchenRedLamp.forEach((el) => {
    //                 el.style = "display: block";
    //             });
    //             img.src = `./img/${kitchen}/Detailed/Lamp${index + 1}.jpg`;
    //             break;
    //         case "kitchen-white":
    //             var kitchenWhiteLamp = document.querySelectorAll(
    //                 ".kitchen-white-lamp"
    //             );
    //             kitchenWhiteLamp.forEach((el) => {
    //                 el.style = "display: none";
    //             });
    //             img.src = `./img/${kitchen}/Detailed/Lamp${index + 1}.jpg`;
    //             break;
    //         default:
    //             img.src = `./img/${kitchen}/Detailed/Lamp${index + 1}.jpg`;
    //             break;
    //     }
    //
    //     img.onerror = () => {
    //         console.log("Image not found.");
    //     };
    // });

    // Chair Objects
    // objectChair.forEach((img, index) => {
    //     if (kitchen == "kitchen-red") {
    //         chair.style = "display: none";
    //     } else {
    //         img.src = `./img/${kitchen}/${viewNum}/Png/BarStool${
    //             index + 1
    //         }.png`;
    //     }
    // });
    // Lamp Objects
    // objectLamp.forEach((img, index) => {
    //     img.src = `./img/${kitchen}/${viewNum}/Png/Lamp${index + 1}.png`;
    //
    //     img.onerror = () => {
    //         img.classList.remove("object-visible");
    //         console.log("Image not found.");
    //     };
    // });

    // Floor Objects
    // objectFloor.forEach((img, index) => {
    //     img.src = `./img/${kitchen}/${viewNum}/Png/Parquet${index + 1}.png`;
    //
    //     img.onerror = () => {
    //         console.log("Image not found.");
    //     };
    // });

    // Wall pattern Objects
    // objectFartuk.forEach((img, index) => {
    //     if (kitchen == "kitchen-white") {
    //         wallPattern.style = "display: none";
    //     } else {
    //         img.src = `./img/${kitchen}/${viewNum}/Png/KitchenFartuk${
    //             index + 1
    //         }.png`;
    //     }
    //
    //     img.onerror = () => {
    //         console.log("Image not found.");
    //     };
    // });

    // Change Objects By ViewNum
    function changeObjectsView(view) {
        // Lamp Objects
        // objectLamp.forEach((img, index) => {
        //     img.src = `./img/${kitchen}/${view}/Png/Lamp${index + 1}.png`;
        // });

        // Chair Objects
        // objectChair.forEach((img, index) => {
        //     if (kitchen == "kitchen-red") {
        //         chair.style = "display: none";
        //     } else {
        //         img.src = `./img/${kitchen}/${viewNum}/Png/BarStool${
        //             index + 1
        //         }.png`;
        //     }
        //
        //     img.onerror = () => {
        //         console.log("Image not found.");
        //     };
        // });

        // Floor Objects
        // objectFloor.forEach((img, index) => {
        //     img.src = `./img/${kitchen}/${view}/Png/Parquet${index + 1}.png`;
        //
        //     img.onerror = () => {
        //         console.log("Image not found.");
        //     };
        // });

        // Wall pattern Objects
        // objectFartuk.forEach((img, index) => {
        //     if (kitchen == "kitchen-white") {
        //         wallPattern.style = "display: none";
        //     } else {
        //         img.src = `./img/${kitchen}/${viewNum}/Png/KitchenFartuk${
        //             index + 1
        //         }.png`;
        //     }
        //
        //     img.onerror = () => {
        //         console.log("Image not found.");
        //     };
        // });
    }
});

// Start/Stop Loading Modal
var loadingModal = document.getElementById("loadingModal");
function showLoadingModal() {
    loadingModal.style.display = "flex";
    console.log("downloading...");
}

function hideLoadingModal() {
    loadingModal.style.display = "none";
    console.log("downloaded");
}

// Handle Images Loading
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

    // imageElement.src = url;
}
