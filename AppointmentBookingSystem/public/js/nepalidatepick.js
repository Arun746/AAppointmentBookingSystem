window.onload = function() {

      var elm = document.getElementById("dob");

      elm.nepaliDatePicker({
          ndpYear: true,
          ndpMonth: true,
          ndpYearCount: 10,
          readOnlyInput: true


      });
   };

   function bsToAd() {
    var bsDate = document.getElementById("dob").value;
    var englishdate = document.getElementById("engdob");
    var adDate = NepaliFunctions.BS2AD(bsDate)
    englishdate.value = adDate
}
setInterval(() => {
    bsToAd()
}, 30);
