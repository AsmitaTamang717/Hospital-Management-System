/////////////////////////////// get district from province id ////////////////////////////////////////
$(document).ready(function() {
    $('.province').change(function() {
        var provinceId = $(this).val();
        console.log(provinceId);
        
        $.ajax({
            url: '/hospitalDistricts/' + provinceId, 
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var districts = response.districts;
                var districtSelect = $('.district');
                districtSelect.empty().append($('<option>').text('Select district').val('')); // Add placeholder option
                $.each(districts, function(id, name) {
                    districtSelect.append($('<option>').text(name).attr('value', id));
                });

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

///////////////////////////////////// get municipality from district id /////////////////////////////////////////
$(document).ready(function() {
    $('.district').change(function() {
        var districtId = $(this).val();
        console.log(districtId);
        
        $.ajax({
            url: '/hospitalMunicipalities/' + districtId, 
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var municipalities = response.municipalities;
                var municipalitySelect = $('.municipality');
                municipalitySelect.empty(); // Clear previous options
                municipalitySelect.append($('<option>').text('Select Municipality').val('')); // Add placeholder option
                $.each(municipalities, function(id, name) {
                    municipalitySelect.append($('<option>').text(name).attr('value', id));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});


/////////////////////////// cloning the permanent address details ////////////////////////////////////
$(document).ready(function() {
    var temporaryDetails;

    $(document).on('click', '#addTemporaryDetails', function() {
        // Check if temporary details have already been added
        if (!temporaryDetails) {
            const permanentDetails = $('.permanent-address-details');
            temporaryDetails = permanentDetails.clone(true);
            
            /// Update IDs, names, and other attributes
            temporaryDetails.find('[id^="permanent"]').each(function() {
                var newId = $(this).attr('id').replace('permanent', 'temporary');
                $(this).attr('id', newId);
                
                // Check if the name attribute exists before replacing
                if ($(this).attr('name')) {
                    var newName = $(this).attr('name').replace('permanent', 'temporary');
                    $(this).attr('name', newName);
                }

                // // Handle specific attributes
                var dataMessage = $(this).attr('data-message');
                if (dataMessage && dataMessage.startsWith('Permanent')) {
                    $(this).attr('data-message', dataMessage.replace('Permanent', 'Temporary'));
                }
                
                

            });

            const temporaryDetailsDiv = $('.temporary-address-details');
            temporaryDetailsDiv.append(temporaryDetails);

            
            $(this).text('Remove temporary details').attr('id', 'removeTemporaryDetails').addClass('bg-danger border-0');
        }
    });

    $(document).on('click', '#removeTemporaryDetails', function() {
        const temporaryDetailsRemove = $('.temporary-address-details');
        temporaryDetailsRemove.empty();
        
        // Reset button
        $('#removeTemporaryDetails').text('Add Temporary Details').attr('id', 'addTemporaryDetails').removeClass('bg-danger');

        // Reset temporaryDetails variable
        temporaryDetails = null;
    });
});


///////////////////////// cloning the education details ////////////////////////////////////
$(document).ready(function() {
    var addCounter = 1;
        // Event delegation for dynamic elements
        $(document).on('click', '#addEducation_1', function() {
                const newEducationDetails = $('.education-details-category').clone(true);  
                newEducationDetails.removeClass('education-details-category');
  

                // Create and append remove button to the degree head
                var removeBtn = $("<div>").addClass('btn d-flex education-remove  justify-content-end').append('<i class="fa fa-minus-square text-danger" aria-hidden="true"></i>').attr('id','new_id_'+addCounter);
                newEducationDetails.append(removeBtn);

        
                $('.new-Education-details').append(newEducationDetails);
                
                newEducationDetails.find('.nepali-date-picker-bs').removeClass('nepali-date-picker-bs').attr('id','education_cloned_bs_'+addCounter);
                newEducationDetails.find('.nepali-date-picker-ad').removeClass('nepali-date-picker-ad').attr('id','education_cloned_ad_'+addCounter);
            
                // Reinitialize Nepali date picker on the cloned node
                var start_cloned_id_bs = newEducationDetails.find('#education_cloned_bs_' + addCounter);
                var start_cloned_id_ad = newEducationDetails.find('#education_cloned_ad_' + addCounter);
                start_cloned_id_bs.val('');
                start_cloned_id_ad.val('');
                start_cloned_id_bs.nepaliDatePicker({
                    onChange: function() {
                        var bs_date =  start_cloned_id_bs.val();
                        var ad_date_input = start_cloned_id_ad;
                        var ad_date = NepaliFunctions.BS2AD(bs_date);
                        ad_date_input.val(ad_date);
                    }
                });

                addCounter++; 
            
        });
        $(document).on('click', '.education-remove', function(event) {
            event.preventDefault();
            $(this).parent().remove();         
        });  
         
});


///////////////////////////////////cloning experience details //////////////////////////////////////////////////////////

$(document).ready(function() {
    var addCounter = 1;
        $(document).on('click', '#addExperience', function() {

                const newExperienceDetails = $('.experience_1').clone(true);  
                newExperienceDetails.removeClass('experience_1');
                $('.experience_2').append(newExperienceDetails);
                
                   // Create and append remove button to the degree head
                var removeBtn = $("<button>").addClass('btn remove-btn experience-remove d-flex justify-content-end').append('<i class="fa fa-minus-square text-danger" aria-hidden="true"></i>');
                newExperienceDetails.append(removeBtn);

                // renaming the id in start date
                var startElementBs = newExperienceDetails.find('#start_date_bs');
                var current_start_id_bs = startElementBs.attr('id');
                var new_start_id_bs = current_start_id_bs + '_'+ addCounter;
                startElementBs.attr('id', new_start_id_bs);

                var startElementAd = newExperienceDetails.find('#start_date_ad');
                var current_start_id_ad = startElementAd.attr('id');
                var new_start_id_ad = current_start_id_ad + '_'+ addCounter;
                startElementAd.attr('id', new_start_id_ad);

                //renaming the id in end date
                var endElementBs = newExperienceDetails.find('#end_date_bs');
                var current_end_id_bs = endElementBs.attr('id');
                var new_end_id_bs = current_end_id_bs + '_'+ addCounter;
                endElementBs.attr('id', new_end_id_bs);

                var endElementAd = newExperienceDetails.find('#end_date_ad');
                var current_end_id_ad = endElementAd.attr('id');
                var new_end_id_ad = current_end_id_ad + '_'+ addCounter;
                endElementAd.attr('id', new_end_id_ad);

                // Reinitialize Nepali date picker on the cloned node for bs 
                var start_cloned_id_bs = newExperienceDetails.find('#' + new_start_id_bs);
                var start_cloned_id_ad = newExperienceDetails.find('#' + new_start_id_ad);
                start_cloned_id_bs.val('');
                start_cloned_id_ad.val('');

                start_cloned_id_bs.nepaliDatePicker({
                onChange: function() {
                var bs_date =  start_cloned_id_bs.val();
                var ad_date_input = start_cloned_id_ad;
                var ad_date = NepaliFunctions.BS2AD(bs_date);
                ad_date_input.val(ad_date);
                }
                });

                // Reinitialize Nepali date picker on the cloned node for bs 
                var end_cloned_id_bs = newExperienceDetails.find('#' + new_end_id_bs);
                var end_cloned_id_ad = newExperienceDetails.find('#' + new_end_id_ad);
                end_cloned_id_bs.val('');
                end_cloned_id_ad.val('');

                end_cloned_id_bs.nepaliDatePicker({
                onChange: function() {
                var bs_date =  end_cloned_id_bs.val();
                var ad_date_input = end_cloned_id_ad;
                var ad_date = NepaliFunctions.BS2AD(bs_date);
                ad_date_input.val(ad_date);
                }
                });

               addCounter++;
        });
        $(document).on('click', '.experience-remove', function(event) {
            console.log('Remove button clicked');
            event.preventDefault();
            $(this).parent().remove();   
            // newEducationDetails.empty();       
        });  
        
}); 



