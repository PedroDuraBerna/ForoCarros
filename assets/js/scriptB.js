
//Script del Slider de imágenes

cont = 0;
rev = false;

const sliderEl = document.getElementById("slider");

setInterval(() => {
    const imgWidth = sliderEl.offsetWidth;
    if (cont > 5) {
        sliderEl.scrollLeft = 0;
        cont = 0;
    }
    cont++;
    sliderEl.scrollLeft += imgWidth;
}, 5000);
