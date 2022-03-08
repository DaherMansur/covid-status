// Javascript

let colorScheme = 0;
let body_ = document.querySelector('body');
let main_ = document.querySelector('main');
let aside_ = document.querySelector('aside');  


function bgcolor(){
    if(colorScheme < 3){
        colorScheme++ 
    }else{
        colorScheme = 0;
    }

    switch (colorScheme){
        case 0:
            body_.style.backgroundColor = "#E2EDFF";
            main_.style.backgroundColor = "#1e2140";
            aside_.style.backgroundColor = "#1e2140";
            break
        case 1:
            body_.style.backgroundColor = "red";
            break
        case 2:
            body_.style.backgroundColor = "green";
            break
        case 3:
            body_.style.backgroundColor = "blue";
            break
    }
};

