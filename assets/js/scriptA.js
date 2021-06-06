
var edit_email = false; 

function insertFormEmail() {

    var input = document.getElementById("input_email");
    var text = document.getElementById("text_email");

    edit_email = !edit_email;

    if(edit_email) {
        input.style.display = "block";
        text.style.display = "none";
    } else {
        input.style.display = "none";
        text.style.display = "block";
    }

}

var edit_interests = false; 

function insertFormInterests() {

    var input = document.getElementById("input_interests");
    var text = document.getElementById("text_interests");

    edit_interests = !edit_interests;

    if(edit_interests) {
        input.style.display = "block";
        text.style.display = "none";
    } else {
        input.style.display = "none";
        text.style.display = "block";
    }

}

var edit_bio = false; 

function insertFormBio() {

    var input = document.getElementById("input_bio");
    var text = document.getElementById("text_bio");

    edit_bio = !edit_bio;

    if(edit_bio) {
        input.style.display = "block";
        text.style.display = "none";
    } else {
        input.style.display = "none";
        text.style.display = "block";
    }

}

var edit_sign = false; 

function insertFormSign() {

    var input = document.getElementById("input_sign");
    var text = document.getElementById("text_sign");

    edit_sign = !edit_sign;

    if(edit_sign) {
        input.style.display = "block";
        text.style.display = "none";
    } else {
        input.style.display = "none";
        text.style.display = "block";
    }

}

function insertFormPhoto() {

    var input = document.getElementById("input_users_photo");

    edit_sign = !edit_sign;

    if(edit_sign) {
        input.style.display = "block";
    } else {
        input.style.display = "none";
    }

}