
window.onload = function() {
    // var bs_date_inputs = document.querySelectorAll('.nepali-date-picker-bs');
    // bs_date_inputs.forEach(function(bs_date_input) {
    //     bs_date_input.value = '';
    // });
    // var ad_date_inputs = document.querySelectorAll('.nepali-date-picker-ad');
    // ad_date_inputs.forEach(function(ad_date_input) {
    //     ad_date_input.value = '';
    // });
    document.querySelectorAll('.nepali-date-picker-bs').forEach(function(nepali_date_bs) {
        nepali_date_bs.nepaliDatePicker({
            onChange: function() {
                var bs_date = nepali_date_bs.value;
                var ad_date_inputs = document.querySelectorAll('.nepali-date-picker-ad');
                ad_date_inputs.forEach(function(ad_date_input) {
                    var ad_date = NepaliFunctions.BS2AD(bs_date);
                    ad_date_input.value = ad_date;
                });
            }
        });
    });
};







