//Introducimos el número 2 tras 1 segundo y el número 1 tras 2 segundos
//Con objetivo de dinamizar la espera tras el login

setTimeout("countDownA()", 1000);
setTimeout("countDownB()", 2000);

function countDownA() {
    document.getElementById("cdT").innerHTML = 2;
}

function countDownB() {
    document.getElementById("cdT").innerHTML = 1;
}