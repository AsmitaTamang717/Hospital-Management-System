function menuTypeChanged(value){
    var moduleType = document.getElementById('module');
    var pageType = document.getElementById('page');
    var externalLinkType = document.getElementById('external_link');
    
    moduleType.classList.add('d-none');
    pageType.classList.add('d-none');
    externalLinkType.classList.add('d-none');
    
    if (value === '1') {
        moduleType.classList.remove('d-none');
        moduleType.style.display = 'block';
    } else if (value === '2') {
        pageType.classList.remove('d-none');
        pageType.style.display = 'block';
    } else if (value === '3') {
        externalLinkType.classList.remove('d-none');
        externalLinkType.style.display = 'block';
    }

}