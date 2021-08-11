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


/* * * Menu Show * * */



// dynamicLoading();

function dynamicLoading(){
    const containerCenter = $('.container-center');
    $('[realtime]').click(function(){
        var pagina = $(this).attr('realtime');

        let url = include_path+'pages/'+pagina+'.php';
        containerCenter.hide();
        
        containerCenter.load(url);
        

        if(pagina !== 'home'){
            window.history.pushState('', '', pagina);
        }else{
            window.history.pushState('', '', include_path);
        }
        boxMenu.removeClass('active');
        containerCenter.fadeIn(200);

        return false;
    });
}

/* ** ** */

/* * * Efect Relogio * * */

function load(oc){
    if(oc == 1){
        const mElement = document.querySelector('.encaixe_m');
        const hElement = document.querySelector('.encaixe_p');

        const updateClock = () =>{
            let now = new Date();
            let hour = now.getSeconds();
            let minute = now.getSeconds();

            let mDeg = ((360/12) * minute) * 5;
            let hDeg = ((360/60) * hour) * 5;

            mElement.style.transform = `rotate(${mDeg}deg)`;
            hElement.style.transform = `rotate(${hDeg}deg)`;
            
        }

        setInterval(updateClock, 500);
        updateClock();
    }
}

load(1);
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

// deleteControlDep();

// function deleteControlDep(){
//     const btnDelet      = document.querySelector('.delete-control');
//     const boxConfDelete = document.querySelector('.box-delete');
//     const boxConfNao    = document.querySelector('.conf-nao');
//     const boxConfSim    = document.querySelector('.conf-sim');
//     const boxMgsConf    = document.querySelector('.box-msg-conf');

//     btnDelet.addEventListener("click", () => {
//         boxConfDelete.style.display = 'flex';
//         setTimeout(()=>{
//             boxConfDelete.style.opacity = '1';
//         }, 500);
//     });

//     boxConfDelete.addEventListener("click", e =>{
//         e.preventDefault();

//         const box_delete = e.target.classList == 'box-delete';
//         const conf_nao   = e.target.classList == 'cont-btn-wraper conf-nao';
//         const conf_sim   = e.target.classList == 'cont-btn-wraper conf-sim';

//         if(box_delete || conf_nao || conf_sim){
//             boxConfDelete.style.opacity = '0';

//             setTimeout(()=>{
//                 boxConfDelete.style.display = 'none';
//             }, 500);
//         }
//     });

//     boxConfSim.addEventListener("click", () => {
//         boxMgsConf.style.display = 'flex';
//         setTimeout(()=>{
//             boxMgsConf.style.opacity = '1';
//         }, 500);
//     });
// }

/* ** ** */