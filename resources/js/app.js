import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    var ctx = document.getElementById('budgetChart').getContext('2d');
    var chartData = window.chartData; // Данные передаем через Blade-шаблон

    var labels = chartData.map(function(item) {
        return item.date;
    });

    var values = chartData.map(function(item) {
        return item.value;
    });

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Бюджет по дням',
                data: values,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Дата'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Сумма (руб.)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
});