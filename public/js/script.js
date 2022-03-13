// Javascript

let btn_ = document.querySelector('#btn_')
let colorScheme = 0;
let body_ = document.querySelector('body');
let main_ = document.querySelector('main');
let container_ = document.querySelector('.container');
let aside_ = document.querySelector('aside');
let footer_ = document.querySelector('footer');
let highcharts_bg = document.querySelector('.highcharts-background');


btn_.addEventListener("click", function bgcolor(){
    if(colorScheme <1){
        colorScheme++ 
    }else{
        colorScheme = 0;
    }

    switch (colorScheme){
        case 0:
            body_.style.backgroundColor = "#E2EDFF";
            main_.style.backgroundColor = "#E2EDFF";
            container_.style.backgroundColor = "#E2EDFF";
            aside_.style.backgroundColor = "#1e2140";
            footer_.style.backgroundColor = "#1e2140";
            break
        case 1:
            body_.style.backgroundColor = "#c1c1c1";
            main_.style.backgroundColor = "#c1c1c1";
            container_.style.backgroundColor = "#c1c1c1";
            aside_.style.backgroundColor = "#2D2D2D";
            footer_.style.backgroundColor = "#2D2D2D";
            break
    }
});

