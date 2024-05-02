// window.onload = function() {
//     var nepaliDate = document.querySelector('.nepali-date-picker-bs');
//     nepaliDate.nepaliDatePicker();
     
 
// nepaliDate.nepaliDatePicker({
//     onChange: function() {
//         var bs_date = nepaliDate.value;
//         var ad_date = NepaliFunctions.BS2AD(bs_date); 
       
//         document.querySelector('.nepali-date-picker-ad').value = ad_date;
//     }
// });
// };
window.onload = function() {
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







