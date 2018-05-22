

$(document).ready(function () {
    alert('Something');
    var alerted = $('.alert');
    setTimeout(function () {
        alerted.fadeOut('slow');
    }, 1000);
});