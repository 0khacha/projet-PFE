// Fetch data for registered users per day
fetch('DataPerDay.php?dataType=users')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Update the content of the HTML element with the fetched data
        document.getElementById('registeredUsersBox').querySelector('.statistic-number').textContent = data[0].userCount;

        // Create a bar chart using Chart.js
        const ctx = document.getElementById('usersChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(entry => entry.registration_day),
                datasets: [{
                    label: 'Number of Users',
                    data: data.map(entry => entry.userCount),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching users data:', error);
    });

// Fetch data for appointments per day
fetch('DataPerDay.php?dataType=appointments')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Update the content of the HTML element with the fetched data
        document.getElementById('appointmentsBox').querySelector('.statistic-number').textContent = data[0].appoinmentCount;

        // Create a bar chart using Chart.js
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(entry => entry.submit_day),
                datasets: [{
                    label: 'Number of Appointments',
                    data: data.map(entry => entry.appoinmentCount),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching appointments data:', error);
    });

// Fetch data for requests per day
fetch('DataPerDay.php?dataType=requests')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Update the content of the HTML element with the fetched data
        document.getElementById('requestsBox').querySelector('.statistic-number').textContent = data[0].requestsCount;

        // Create a bar chart using Chart.js
        const ctx = document.getElementById('requestsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(entry => entry.requests_day),
                datasets: [{
                    label: 'Number of Requests',
                    data: data.map(entry => entry.requestsCount),
                    backgroundColor: 'rgba(255, 205, 86, 0.2)',
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching requests data:', error);
    });
