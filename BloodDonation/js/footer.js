// footer.js
console.log('Before fetch operation');

document.addEventListener('DOMContentLoaded', function () {
    const footerPlaceholder = document.getElementById('footer-placeholder');

    if (footerPlaceholder) {
        fetch('footer.html')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                footerPlaceholder.innerHTML = data;
            })
            .catch(error => console.error('Error fetching footer:', error));
    } else {
        console.error('Footer placeholder element not found.');
    }
});
