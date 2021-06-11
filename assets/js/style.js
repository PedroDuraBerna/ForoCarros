//Script del cambio de estilo

actualizarClase();

$(document).ready(function () {

    $("#theme").on("change", function (e) {

        console.log(e.target.value);

        localStorage.setItem("theme", JSON.stringify(e.target.value));

        actualizarClase();

    });

});


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
