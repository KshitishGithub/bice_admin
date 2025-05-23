//Book sells chart is here

const paitents = document.getElementById('admission').getContext('2d');
const paitentChart = new Chart(paitents, {
    type: 'bar',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
        datasets: [{
            label: 'Admission Data',
            data: [1165, 959, 880, 1281, 1056, 955, 1410],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ]
        }]
    },
    options: {
        resposive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },

});

//Book sells chart is here

const book_sells = document.getElementById('book_sells').getContext('2d');
const book_sells_chart = new Chart(book_sells, {
    type: 'line',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
        datasets: [{
            label: 'Success Students Data',
            data: [465, 959, 880, 1281, 1056, 1055, 1410],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
        }]
    },
    options: {
        resposive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },

});