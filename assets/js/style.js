//Script del cambio de estilo

actualizarClase();

//La web está pendiente de que hagamos clik a una opción del desplegable, cuando clikamos entonces se llama a la función "actualizarClase", guardando
//además la opción que hemos clicado en el LocaStorage

$(document).ready(function() {

    $("#theme").on("change", function(e) {

        console.log(e.target.value);

        localStorage.setItem("theme", JSON.stringify(e.target.value));

        actualizarClase();

    });

});

//Con esta función introducimos la clase .dark_mode al body, haciendo que cambie de estilo completamente

function actualizarClase() {

    if (localStorage.getItem("theme")) {
        var theme = JSON.parse(localStorage.getItem("theme"));
        $("#theme").val(theme);
        if (theme == "#222" && !$("body").hasClass("dark_mode")) {
            $("body").addClass("dark_mode");
        }
        if (theme == "classic" && $("body").hasClass("dark_mode")) {
            $("body").removeClass("dark_mode");
        }
    }

}