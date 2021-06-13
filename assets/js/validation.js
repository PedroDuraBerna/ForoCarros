//Con esto obtenemos el email cuando quitamos el foco del input y llamamos a la función "validationEmail"

$("#email_form").blur(function(e) {
    if (validateEmail(e.target.value)) {
        $("#error_email").text("");
    } else {
        $("#error_email").text("Formato de email no válido");
    }
});

//La función "validationEmail" sirve para decirnos si el correo tiene el formato correcto

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}