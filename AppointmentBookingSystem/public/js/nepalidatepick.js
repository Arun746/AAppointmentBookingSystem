window.onload = function() {
   
      var elm = document.getElementById("dob");
   
      elm.nepaliDatePicker({
          ndpYear: true,
          ndpMonth: true,
          ndpYearCount: 10,
          language: "english"
      });
   };