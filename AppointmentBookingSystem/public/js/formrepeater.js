document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("addbutton")) {
        document
            .getElementById("addbutton")
            .addEventListener("click", function () {
                console.log("added");
                const newRow = document.querySelector(".education-repeat").cloneNode(true);
                document.querySelector(".education-repeat").parentNode.appendChild(newRow);
                const inputFields = newRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    input.value = "";
                });
            });
    }

    document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-education') && e.target.closest('.education-repeat')) {

        e.target.closest('.education-repeat').remove();

        console.log("sjdfhsajkdh");
    }
});

});




document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("experience-add")) {
        document
            .getElementById("experience-add")
            .addEventListener("click", function () {
                // console.log("added");
                const newRow = document.querySelector(".experience-repeat").cloneNode(true);
                document.querySelector(".experience-repeat").parentNode.appendChild(newRow);
                const inputFields = newRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    input.value = "";
                });
            });
    }


    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-experience') && e.target.closest('.experience-repeat')) {
            e.target.closest('.experience-repeat').remove();
            console.log("sjdfhsajkdh");
        }
    })
});
