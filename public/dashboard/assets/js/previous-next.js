function next() {
    var currentStep = document.querySelector('.active-step');
    var nextStep = currentStep.nextElementSibling;

    if (nextStep) {
        // Hide the current step
        currentStep.classList.remove('active-step');
        currentStep.classList.add('d-none');

        // Show the next step
        nextStep.classList.add('active-step');
        nextStep.classList.remove('d-none');
    }
}

function previous() {
    var currentStep = document.querySelector('.active-step');
    var previousStep = currentStep.previousElementSibling;

    if (previousStep) {
        // Hide the current step
        currentStep.classList.remove('active-step');
        currentStep.classList.add('d-none');

        // Show the next step
        previousStep.classList.add('active-step');
        previousStep.classList.remove('d-none');
    }
}



