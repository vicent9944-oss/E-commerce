const ctx = document.getElementById('weatherChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['12 PM', '3 PM', '6 PM', '9 PM', '12 AM'],
        datasets: [
          {
            label: 'Joto (°C)',
            data: [11, 14, 11, 12, 15],
            borderColor: '#0284c7',
            backgroundColor: '#0284c7',
            tension: 0.4,
            borderWidth: 2
          },
          {
            label: 'Unyevunyevu (%)',
            data: [6, 5, 9, 7, 7],
            borderColor: '#0d9488',
            backgroundColor: '#0d9488',
            tension: 0.4,
            borderWidth: 2
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
            align: 'end'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 20
          }
        }
      }
    });