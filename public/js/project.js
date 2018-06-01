

$(document).ready(function () {
    var alerted = $('.alert');
    setTimeout(function () {
        alerted.fadeOut('slow');
    }, 1000);
});

function imgFile(){
    $('#file').trigger('click');
}

function loadFile(event) {
    $('#output').attr('src', URL.createObjectURL(event.target.files[0]));
}