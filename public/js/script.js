// Javascript


const darkModeTrigger = document.querySelector('#darkModeButton');

let section = document.querySelectorAll('section');
let nav = document.querySelector('nav');
let darkModeBtn = document.querySelector('#darkModeButtonImg');

//criando cookies

function createCookie(name, value) {
    let date = new Date(2025, 0, 01);
    date = date.toGMTString();

    document.cookie = name + '=' + value + '; expires=' + date + '; path=/';
}

//pegar valores cookie

function getCookieValue(line, value) {
    var cookies = document.cookie;
    let allCookies = cookies.split(';')[line];
    let cookieValue = allCookies.split('=')[value];    
    return cookieValue;
}

//validando cookie

function cookieValidation(a, b) {
    if (document.cookie == '') {
        createCookie(a, b)
    } else {
        console.log('cookie already exists!')
    }
}

// preset de cores para o Dark Mode

function darkModeOff() {
    document.documentElement.style.setProperty('--bg-color', '#1E2140');
    document.documentElement.style.setProperty('--bg-color-2', '#fff');
    nav.style.backgroundColor = ('#ffffffab');
    darkModeBtn.style.boxShadow = ('0px 0px 5px rgb(184, 169, 255)');
    a = "#fff"
}
function darkModeOn() {
    document.documentElement.style.setProperty('--bg-color', '#2D2D2D');
    document.documentElement.style.setProperty('--bg-color-2', '#C1C1C1');
    nav.style.backgroundColor = ('#afafafcc');
    darkModeBtn.style.boxShadow = ('0px 0px 25px rgb(184, 169, 255)');
    a = "rgba(255, 255, 255, 0.527)";
}

//auto dark-mode usando cookie

function cookieSettings() {
    cookieValidation('darkModeCookie', 'false')
    let a
    if (getCookieValue(0, 1) == 'true') {
        darkModeOn();
    } else if (getCookieValue(0, 1) == 'false') {
        darkModeOff();
    }
    for (let i = 1; i < section.length; i++) {
        section[i].style.backgroundColor = a;
    }
};
cookieSettings();

//botão dark mode

let y = false;

darkModeTrigger.addEventListener('click', ()=>{
    let a
    console.log('biriba funcionou!')
    if(y == false){
        darkModeOn();
        createCookie('darkModeCookie', 'true')
        y = true;
    }else {
        darkModeOff();
        createCookie('darkModeCookie', 'false');
        y = false;
    }
    for (let i = 1; i < section.length; i++) {
        section[i].style.backgroundColor = a;
    }
});

/* nav */

let menuBtn = document.getElementById('menuBtn');
let isNavActive = true;

menuBtn.addEventListener("click", () => {

    if (!isNavActive) {
        nav.style.display = ('none');

        isNavActive = true;
    } else {
        nav.style.display = ('block');

        isNavActive = false;
    }
})