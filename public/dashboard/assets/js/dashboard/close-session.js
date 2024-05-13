function closeSession(){
    var sessionDivs = document.querySelectorAll('.session-message');
    sessionDivs.forEach(function(sessionDiv) {
        sessionDiv.classList.add('d-none');
    });
}