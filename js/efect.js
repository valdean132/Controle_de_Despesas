/* * * Btn DarkMode * * */

const btnDark = document.querySelector('.btn-dark');
const body    = document.querySelector('body');

let classDarkMode     = localStorage.getItem('classDark');
let classDarkModeNome = JSON.parse(classDarkMode);

if(classDarkModeNome !== null){
    if(classDarkModeNome.nome === 'black'){
        body.classList.add(classDarkModeNome.nome);
    }
}


btnDark.addEventListener("click", () => {
    if(body.classList == 'black'){
        localSttorageName = {nome: ''};
        updateLocalStorage('classDark', localSttorageName);
        body.classList.remove('black');
    }else{
        localSttorageName = {nome: 'black'};
        updateLocalStorage('classDark', localSttorageName);
        body.classList.add('black');
    }
});

/* ** ** */

/* * * Menu Show * * */

const boxMenu = $('.menu-container');
const amberMenu = $('.barrinhas-menu');

amberMenu.click(()=>{
    if(boxMenu.hasClass('active')){
        boxMenu.removeClass('active');
    }else{
        boxMenu.addClass('active');
    }
});



/* ** ** */

/* 

Chegar tema do sistema

const prefersColorScheme = window.matchMedia('(prefers-color-scheme: dark)');

function changeTheme(e){
    if(e.matches){
        console.log('So sistema é modo dark');
    }else{
        console.log('No sistema é modo light');
    }
};


changeTheme(prefersColorScheme);


*/

/* * * Btn Delet * * */

const btnDelet      = document.querySelector('.delete-control');
const boxConfDelete = document.querySelector('.box-delete');
const boxConfNao    = document.querySelector('.conf-nao');
const boxConfSim    = document.querySelector('.conf-sim');
const boxMgsConf    = document.querySelector('.box-msg-conf');

btnDelet.addEventListener("click", () => {
    boxConfDelete.style.display = 'flex';
    setTimeout(()=>{
        boxConfDelete.style.opacity = '1';
    }, 500);
});

boxConfDelete.addEventListener("click", e =>{
    e.preventDefault();

    const box_delete = e.target.classList == 'box-delete';
    const conf_nao   = e.target.classList == 'cont-btn-wraper conf-nao';
    const conf_sim   = e.target.classList == 'cont-btn-wraper conf-sim';

    if(box_delete || conf_nao || conf_sim){
        boxConfDelete.style.opacity = '0';

        setTimeout(()=>{
            boxConfDelete.style.display = 'none';
        }, 500);
    }
});

boxConfSim.addEventListener("click", () => {
    boxMgsConf.style.display = 'flex';
    setTimeout(()=>{
        boxMgsConf.style.opacity = '1';
    }, 500);
});

/* ** ** */