setTimeout(function () {
    var errorMessages = document.getElementsByClassName("alert");
    for (var i = 0; i < errorMessages.length; i++) {
        errorMessages[i].remove();
    }
}, 3000);
