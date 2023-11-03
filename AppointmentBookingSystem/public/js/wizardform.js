// wizardform.js
function toggleFormOne() {
    var info = document.getElementById('basicinfo');
    var education = document.getElementById("education");

    if (info.style.display === "block") {
        info.style.display = "none";
        education.style.display = "block";
    } else {
        info.style.display = "block";
        education.style.display = "none";
        experience.style.display = "none";
    }
}

function toggleFormTwo() {
    var education = document.getElementById("education");
    var experience = document.getElementById("experience");

    if (education.style.display === "block") {
        education.style.display = "none";
        experience.style.display = "block";
    } else {
        education.style.display = "block";
        experience.style.display = "none";
    }
}

function toggleFormThree() {
    var experience = document.getElementById("experience");
    var login = document.getElementById("login");

    if (experience.style.display === "block") {
        experience.style.display = "none";
        login.style.display = "block";
    } else {
        experience.style.display = "block";
        login.style.display = "none";
    }
}

$(function () {
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $('.fvrduplicate:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus" aria-hidden="true"></i>');
    }).on('click', '.btn-remove', function (e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});
