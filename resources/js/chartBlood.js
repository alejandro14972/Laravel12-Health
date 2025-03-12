import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", function () {
    var url = window.location.pathname;
    var miUrl = "/blood-presures";

    if (url === miUrl) {
        const ctxAvg = document.getElementById('bloodPressureChartAvg').getContext('2d');
        const labels = JSON.parse(document.getElementById('bloodPressureChartAvg').dataset.labels);
        const avg_systolicMorning = JSON.parse(document.getElementById('bloodPressureChartAvg').dataset.avgSystolicMorning);
        const avg_diastolicMorning = JSON.parse(document.getElementById('bloodPressureChartAvg').dataset.avgDiastolicMorning);
        const avg_systolicEvening = JSON.parse(document.getElementById('bloodPressureChartAvg').dataset.avgSystolicEvening);
        const avg_diastolicEvening = JSON.parse(document.getElementById('bloodPressureChartAvg').dataset.avgDiastolicEvening);

        new Chart(ctxAvg, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Max Mañanas',
                        data: avg_systolicMorning,
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Min Mañanas',
                        data: avg_diastolicMorning,
                        borderColor: 'rgb(191, 19, 209)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Max Tarde',
                        data: avg_systolicEvening,
                        borderColor: 'rgb(209, 206, 19)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Min Tarde',
                        data: avg_diastolicEvening,
                        borderColor: 'rgb(229, 15, 51)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    }
});
