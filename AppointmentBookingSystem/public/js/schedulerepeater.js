document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('schedule-add').addEventListener('click', function(e) {
        e.preventDefault();
        var scheduleContainer = document.getElementById('schedule-container');
        var scheduleRepeat = document.querySelector('.schedule-repeat').cloneNode(true);
        scheduleContainer.appendChild(scheduleRepeat);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-schedule') && e.target.closest(
                '.schedule-repeat')) {
            e.target.closest('.schedule-repeat').remove();
            console.log("Removed schedule");
        }
    });
});
