window.onload = function() {

    clearThemeMode();

    if (localStorage.darkMode == undefined) {
        localStorage.darkMode = false;
    }
    else {
        if (localStorage.darkMode == "true") {
            loadDarkMode();
        }
        else {
            loadLightMode();
        }

        var darkBtn = document.getElementById("darkModeTogglerButton");
        if (darkBtn != null || darkBtn != undefined) {
            darkBtn.onclick = function () {
                changeDarkMode(localStorage.darkMode);
            };
        }
    }    
}

function changeDarkMode(isDarkMode) {
    var referenceElement = getElementReference();

    if (isDarkMode == "true") {
        referenceElement.classList.add("light-mode");
        referenceElement.classList.remove("dark-mode");
        localStorage.darkMode = false;
    }
    else {
        referenceElement.classList.add("dark-mode");
        referenceElement.classList.remove("light-mode");
        localStorage.darkMode = true;
    }
}

function loadDarkMode() {
    var referenceElement = getElementReference();
    referenceElement.classList.add("dark-mode");
}

function loadLightMode() {
    var referenceElement = getElementReference();
    referenceElement.classList.add("light-mode");
}

function clearThemeMode() {
    var referenceElement = getElementReference();
    referenceElement.classList.remove("light-mode");
    referenceElement.classList.remove("dark-mode");
}

function getElementReference() {
    return document.getElementById("resouceItTest");
}