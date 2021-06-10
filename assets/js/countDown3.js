
setTimeout("countDownA()", 1000);
setTimeout("countDownB()", 2000);
function countDownA() {
    document.getElementById("cdT").innerHTML = 2;
}
function countDownB() {
    document.getElementById("cdT").innerHTML = 1;
}