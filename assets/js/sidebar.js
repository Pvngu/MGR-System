    //// sidebar button
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    //// popup window
    // settings window
    const closeButtonS = document.querySelector(".closeBtnModalS")
    const modalS = document.querySelector(".settingsModal")
    const openButtonS = document.querySelectorAll(".openModalS")
    
    for(i = 0; i < openButtonS.length; i++){
        openButtonS[i].addEventListener("click", () => {
        modalS.showModal()
    })
    }
    closeButtonS.addEventListener("click", () => {
        modalS.close();
    })
    // logout window
    const closeButtonL = document.querySelectorAll(".closeBtnModalL");
    const modalL = document.querySelector(".logoutModal")
    const openButtonL = document.querySelector(".openModalL")
    openButtonL.addEventListener("click", () => {
        modalL.showModal()
    })

    for(i = 0; i < closeButtonL.length; i++){
        closeButtonL[i].addEventListener("click", () => {
        modalL.close();
    })
    }
    //About us window
    const closeButtonAU = document.querySelector(".closeBtnModalAU")
    const modalAU = document.querySelector(".aboutUsModal");
    const openButtonAU = document.querySelector(".openModalAU");
    openButtonAU.addEventListener("click", () => {
        modalAU.showModal()
    })

    closeButtonAU.addEventListener("click", () => {
        modalAU.close();
    })
        //Account settings window
        const closeButtonAS = document.querySelector(".closeBtnModalAS")
        const modalAS = document.querySelector(".accountStgModal");
        const openButtonAS = document.querySelector(".openModalAS");
        openButtonAS.addEventListener("click", () => {
        modalAS.showModal()
    })

    closeButtonAS.addEventListener("click", () => {
        modalAS.close();
    })

    ////Theme switcher slider
    var html = document.getElementsByTagName('html');
    var radios = document.getElementsByName('themes');
    var slider = document.querySelector('.slider');

    // Function to set a cookie with the selected theme
    function setThemeCookie(theme) {
    // Set expiration date to 3 months from the current date
    var expirationDate = new Date();
    expirationDate.setMonth(expirationDate.getMonth() + 3);

    document.cookie = "selected_theme=" + theme + "; expires=" + expirationDate.toUTCString() + "; path=/";
}

    // Function to get the value of a cookie
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }

    // Function to update the slider position based on the selected theme
    function updateSliderPosition() {
        var savedTheme = getCookie('selected_theme');
        if (savedTheme === 'dark-theme') {
            slider.style.transform = 'translateX(100%)';
        } else {
            slider.style.transform = 'translateX(0)';
        }
    }

    // Check if a theme cookie exists and apply the theme
    var savedTheme = getCookie('selected_theme');
    if (savedTheme) {
        html[0].classList.add(savedTheme);
        updateSliderPosition();
    }

    // Add event listeners for theme changes
    for (var i = 0; i < radios.length; i++) {
        radios[i].addEventListener('change', function () {
            html[0].classList.remove(html[0].classList.item(0));
            html[0].classList.add(this.id);
            setThemeCookie(this.id);
            updateSliderPosition();
        });
    }