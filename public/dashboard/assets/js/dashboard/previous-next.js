// validate basic details
function validateBasicDetails(){
     //basic details
    var errors = {};
    var required_fields = [
        'first_name',
        'last_name',
        'dob_bs',
        'phone',
        'license_no',
        'doctor_department',
        ];

    required_fields.forEach(function(fieldId){
        var fieldId_value = $('#' + fieldId).val();
        console.log("field value" + fieldId_value);
        if (!fieldId_value) {
            var labelText = $('#'+fieldId).attr('data-message');
            errors[fieldId] = labelText + ' is required';
            $('#' + fieldId + '_error').text(errors[fieldId]);
        }
        else{
            $('#' + fieldId + '_error').text('');
        }
    });
    return Object.keys(errors).length === 0;
}
// validate address details
function validateAddressDetails(){
    //basic details
   var errors = {};
   var required_fields = [
       'country',
       'permanent_province',
       'permanent_district',
       'permanent_municipality_name',
       ];

   required_fields.forEach(function(fieldId){
       var fieldId_value = $('#' + fieldId).val();
       console.log(fieldId_value);
       if (!fieldId_value ) {
           // var labelText = $('#' + fieldId).prev('label').text().trim();
           var labelText = $('#'+fieldId).attr('data-message');
           errors[fieldId] = labelText + ' is required';
           $('#' + fieldId + '_error').text(errors[fieldId]);
           
       }
       else{
        $('#' + fieldId + '_error').text('');
       }
   });
   return Object.keys(errors).length === 0;
}

// validate education details
function validateEducationDetails(){
    //basic details
   var errors = {};
   var required_fields = [
       'degree',
       'specialization',
       'institution',
       'completion_year_bs',
       'obtained_marks',
       ];

   required_fields.forEach(function(fieldId){
       var fieldId_value = $('#' + fieldId).val();
       console.log(fieldId_value);
       if (!fieldId_value ) {
           // var labelText = $('#' + fieldId).prev('label').text().trim();
           var labelText = $('#'+fieldId).attr('data-message');
           errors[fieldId] = labelText + ' is required';
           $('#' + fieldId + '_error').text(errors[fieldId]);
           
       }
       else{
        $('#' + fieldId + '_error').text('');
       }
   });
   return Object.keys(errors).length === 0;
}

// validate education details
function validateExperienceDetails(){
    //experience details
   var errors = {};
   var required_fields = [
       'organization',
       'position',
       'start_date_bs',
       'end_date_bs'
       ];
       
   required_fields.forEach(function(fieldId){
       var fieldId_value = $('#' + fieldId).val();
       
       console.log(fieldId_value);
       if (!fieldId_value ) {
           var labelText = $('#'+fieldId).attr('data-message');
           errors[fieldId] = labelText + ' is required';
           $('#' + fieldId + '_error').text(errors[fieldId]);
           
       }
       else{
        $('#' + fieldId + '_error').text('');
       }
   });
   return Object.keys(errors).length === 0;
}

// validate user details
function validateUserDetails(){
    //user details
   var errors = {};
   var required_fields = [
       'username',
       'email',
       'password',
       'confirm_password',
       ];
       
   required_fields.forEach(function(fieldId){
       var fieldId_value = $('#' + fieldId).val();
       console.log(fieldId_value);
    //required error
       if (!fieldId_value) {
           var labelText = $('#'+fieldId).attr('data-message');
           errors[fieldId] = labelText + ' is required';
           $('#' + fieldId + '_error').text(errors[fieldId]);
       }
       else{
        $('#' + fieldId + '_error').text('');
       }
   });
   return Object.keys(errors).length === 0;
}


// Basic next
function Basicnext() {
    if(validateBasicDetails()){
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
    
}
// Address next
function Addressnext() {
    if(validateAddressDetails() !== false){
        
        
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
    
}

// education next
function Educationnext() {
    if(validateEducationDetails()){
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
    
}

// experience next
function Experiencenext() {
    console.log('first');
    if(validateExperienceDetails()){
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
    
}

//submit
function Formsubmit(){
    if((validateUserDetails())){
        document.getElementById('myform').submit();
    }
}

//update
function Formupdate(){
    console.log('update');
    
        document.getElementById('myformUpdate').submit();
    
}


// ////////////////////////////previous/////////////////////////////////////////////

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



