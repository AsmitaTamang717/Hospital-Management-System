////////////////////////////////////////get doctor from department//////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('.appointment-department').change(function() {
        var departmentId = $(this).val();
        // console.log(departmentId);
        $.ajax({
            url: '/appointment/getDoctors/' + departmentId, 
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var doctors = response.doctors;
                var doctorSelect = $('.appointment-doctor');
                doctorSelect.empty().append($('<option>').text('Select Doctor').val('')); // Add placeholder option
                $.each(doctors, function(id, name) {
                    doctorSelect.append($('<option>').text(name).attr('value', id));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});


///////////////////////////////////Modal to show schedules when the doctor is selected ///////////////////////////////////////////////////
$(document).ready(function(){
    $('.appointment-doctor').change(function(){
        var selectedDoctorId = $(this).val();
        if(selectedDoctorId !== null){
            $('#modalTriggerBtn').trigger('click');
        }

        $.ajax({
            url: '/appointment/getSchedules/' + selectedDoctorId, 
            method: 'GET',
            dataType: 'json',
            success: function(response){
                var schedules = response.availableScheduleDays;
                var selectedDoctorClass = $('.scheduleIntervals');
                selectedDoctorClass.empty();
                if( schedules!== null ){
                    $.each(schedules, function(id,schedule) {
                        $('#schedule_id').val(schedule.id);
                        var scheduleTime = schedule.days+' '+schedule.from +' - '+schedule.to;
                        var scheduleItem = $('<button>').addClass('modal-btn btn btn-outline-success').text(scheduleTime).attr('value',id).css({'font-size' : '14px'});
                        scheduleItem.click(function(event){
                            event.preventDefault();
                            var self = this;
                            selectedDoctorClass.find('.quota-message').remove();
                            $.ajax({
                                url: '/appointment/checkQuota/' + schedule.id,
                                method: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    var appointmentCount = response.appointmentCount;
                                    var total_quota = response.total_quota;

                                    if(appointmentCount < total_quota){
                                        $('#exampleModal').modal('hide');
                                        var timeValue = $(self).text();
                                        $('#timeValue').val(timeValue);
                                    }
                                    else{
                                        if ($(self).next('.quota-message').length == 0) {
                                            var quota_message = $('<div>')
                                                .addClass('quota-message d-flex justify-content-center text-danger')
                                                .text("Quota is full for this time")
                                                .css({'font-size': '14px'});
                                            $(self).after(quota_message);
                                        }
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        })
                        selectedDoctorClass.append(scheduleItem);
                    });
                }
                else{
                    selectedDoctorClass.append($('<div>')).text("There are no schedules");
                }
                
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        }); 
    })
})