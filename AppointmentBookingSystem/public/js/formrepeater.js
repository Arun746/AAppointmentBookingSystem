document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("addbutton")) {
        document
            .getElementById("addbutton")
            .addEventListener("click", function () {
                // console.log("added");
                const newRow = document.querySelector(".education-repeat").cloneNode(true);
                document.querySelector(".education-repeat").parentNode.appendChild(newRow);
                const inputFields = newRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    input.value = "";
                });
            });
    }

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-education') && e.target.closest('.education-repeat')) {
        const educationEntries = document.querySelectorAll('.education-repeat');

        if (educationEntries.length > 1) {
            e.target.closest('.education-repeat').remove();
        } else {
            alert('At least one education entry is required.');
        }
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


    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-experience') && e.target.closest('.experience-repeat')) {
            const experienceEntries = document.querySelectorAll('.experience-repeat');

            if (experienceEntries.length > 1) {
                e.target.closest('.experience-repeat').remove();
            } else {
                alert('At least one experience entry is required.');
            }
        }
    });

});





