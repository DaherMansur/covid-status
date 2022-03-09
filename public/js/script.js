// Javascript

let colorScheme = 0;
let body_ = document.querySelector('body');
let main_ = document.querySelector('main');
let container_ = document.querySelector('.container');
let aside_ = document.querySelector('aside');
let footer_ = document.querySelector('footer');
let highcharts_bg = document.querySelector('.highcharts-background');



function bgcolor(){
    if(colorScheme < 3){
        colorScheme++ 
    }else{
        colorScheme = 0;
    }

    switch (colorScheme){
        case 0:
            body_.style.backgroundColor = "#E2EDFF";
            main_.style.backgroundColor = "#E2EDFF";
            container_.style.backgroundColor = "#E2EDFF";
            /* highcharts_bg.style.fill = "#E2EDFF"; */


            aside_.style.backgroundColor = "#1e2140";
            footer_.style.backgroundColor = "#1e2140";

            break
        case 1:
            body_.style.backgroundColor = "#FFF";
            main_.style.backgroundColor = "#FFF";
            container_.style.backgroundColor = "#FFF";            
            /* highcharts_bg.style.fill = "#FFF"; */


            aside_.style.backgroundColor = "#734EBC";
            footer_.style.backgroundColor = "#734EBC";
            break
        case 2:
            body_.style.backgroundColor = "#C7C3F5";
            main_.style.backgroundColor = "#C7C3F5";
            container_.style.backgroundColor = "#C7C3F5";
            /* highcharts_bg.style.fill = "#C7C3F5"; */


            aside_.style.backgroundColor = "#734EBC";
            footer_.style.backgroundColor = "#734EBC";
            break
        case 3:
            body_.style.backgroundColor = "#c1c1c1";
            main_.style.backgroundColor = "#c1c1c1";
            container_.style.backgroundColor = "#c1c1c1";
            /* highcharts_bg.style.fill = "#c1c1c1"; */


            aside_.style.backgroundColor = "#2D2D2D";
            footer_.style.backgroundColor = "#2D2D2D";
            break
        case 4:
            body_.style.backgroundColor = "#E2EDFF";
            main_.style.backgroundColor = "#E2EDFF";
            container_.style.backgroundColor = "#E2EDFF";
            /* highcharts_bg.style.fill = "#E2EDFF"; */


            aside_.style.backgroundColor = "#5D80B8";
            footer_.style.backgroundColor = "#5D80B8";

        break
    }
};