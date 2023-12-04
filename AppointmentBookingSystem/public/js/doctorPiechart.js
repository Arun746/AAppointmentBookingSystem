document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('pieChart').getContext('2d');
    // The data is now accessible through the global variable doctorsData
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: doctorsData.map(data => data.departmentName),
            datasets: [{
                data: doctorsData.map(data => data.doctor_count),
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4CAF50', '#FF5733', '#6A5ACD'],
            }],
        },
    });
});
