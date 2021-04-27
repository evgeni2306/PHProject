let registrbutton = document.querySelector('.registration');
let entrybutton = document.querySelector('.entry');
let entrform = document.querySelector('.entrform');
let regform = document.querySelector('.regform');
let passpole = document.querySelector('.passpole');
// let cnfrmpasspole = document.querySelector('.cnfrmpasspole') ;
let regformbutton = document.querySelector('.regformbutton');
let pole = document.querySelectorAll('.pole');
let msg = document.querySelector('.msg');
let regpole = document.querySelectorAll('.regpole');

// cnfrmpasspole.onchange = function(){
//     if(cnfrmpasspole.value != passpole.value){
//         cnfrmpasspole.classList.add('red')
//         msg.textContent ='Пароли не совпадают!';
//     }else{
//         cnfrmpasspole.classList.remove('red')
//         msg.textContent ='';
//     }
// }


regformbutton.onclick = function (){

};
//Очистка всех полей при смене формы
let poleclear = function(){
    for (  let pol of pole){
        pol.value ='';
    }
};
//Переход на форму регистрации
registrbutton.onclick = function() {
    regform.classList.remove('hidden');
    entrform.classList.add('hidden');
    poleclear()
};
//Переход на форму входа
entrybutton.onclick = function() {
    entrform.classList.remove('hidden');
    regform.classList.add('hidden');
    poleclear()
};
