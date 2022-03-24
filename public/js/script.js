// Javascript


const darkMode = document.querySelector('#darkModeButton');

let section = document.querySelectorAll('section');
let isActive = false;
let nav = document.querySelector('nav');
let darkModeBtn = document.querySelector('#darkModeButtonImg');

darkMode.addEventListener("click", () => {
    let a

    if (!isActive) {
        document.documentElement.style.setProperty('--bg-color', '#2D2D2D');
        document.documentElement.style.setProperty('--bg-color-2', '#C1C1C1');
        nav.style.backgroundColor = ('#afafafcc');
        darkModeBtn.style.boxShadow = ('0px 0px 25px rgb(184, 169, 255)');

        a = "rgba(255, 255, 255, 0.527)";

        isActive = true;
    } else {
        document.documentElement.style.setProperty('--bg-color', '#1E2140');
        document.documentElement.style.setProperty('--bg-color-2', '#fff');
        nav.style.backgroundColor = ('#ffffffab');
        darkModeBtn.style.boxShadow = ('0px 0px 5px rgb(184, 169, 255)');

        a = "#fff"
        isActive = false;
    }

    for (let i = 1; i < section.length; i++) {
        section[i].style.backgroundColor = a;
    }
});

/* nav */

let menuBtn = document.getElementById('menuBtn');
let isNavActive = true;

menuBtn.addEventListener("click", ()=>{
    
    if(!isNavActive){
        nav.style.display = ('none');

        isNavActive = true;
    }else {
        nav.style.display = ('block');

        isNavActive = false;
    }
})