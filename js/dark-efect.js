const btnDark = document.querySelector('.btn-dark');
const body    = document.querySelector('body');



let classDarkMode = localStorage.getItem('classDark');
let classDarkModeNome = JSON.parse(classDarkMode);

if(classDarkModeNome !== null){
    if(classDarkModeNome.nome === 'black'){
        body.classList.add(classDarkModeNome.nome);
    }
}


btnDark.addEventListener("click", function(){
    
    if(body.classList == 'black'){
        localSttorageName = {nome: ''};
        updateLocalStorageDark();
        body.classList.remove('black');
    }else{
        localSttorageName = {nome: 'black'};
        updateLocalStorageDark();
        body.classList.add('black');
    }
});


const updateLocalStorageDark = () => {
    localStorage.setItem('classDark', JSON.stringify(localSttorageName));
}
