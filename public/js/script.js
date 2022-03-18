// Javascript

let btn_ = document.querySelector('#btn_')
let colorScheme = 0;
let body_ = document.querySelector('body');
let main_ = document.querySelector('main');
let container_ = document.querySelector('.container');
let aside_ = document.querySelector('aside');
let footer_ = document.querySelector('footer');
let textColor = document.querySelectorAll('.text-color');

let a

function changeColor(){
    for(let i = 0; i < textColor.length; i++){
        textColor[i].style.color = a;
    }
}


btn_.addEventListener("click", function bgcolor(){
    if(colorScheme <1){
        colorScheme++ 
    }else{
        colorScheme = 0;
    }

    switch (colorScheme){
        
        case 0:
            a = '#383838'
            body_.style.backgroundColor = "";
            main_.style.backgroundColor = "#E2EDFF";
            container_.style.backgroundColor = "#E2EDFF";
            aside_.style.backgroundColor = "";
            footer_.style.backgroundColor = "";
            changeColor();
            break
        case 1:
            a = '#e6e6e6'
            body_.style.backgroundColor = "#c1c1c1";
            main_.style.backgroundColor = "#c1c1c1";
            container_.style.backgroundColor = "#c1c1c1";
            aside_.style.backgroundColor = "#2D2D2D";
            footer_.style.backgroundColor = "#2D2D2D";
            changeColor();
            break
    }
});

//fazer objeto literal para diminuir o tamanho do código

// fim dark mode button

let graphTitle = document.querySelectorAll('.highcharts-title');

graphTitle[0].innerHTML = "Média de casos por semana";
graphTitle[1].innerHTML = "Média de mortes por semana";
