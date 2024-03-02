 document.addEventListener("DOMContentLoaded", function () {
            var sections = document.querySelectorAll('section');

            function showSections() {
                sections.forEach(function (section) {
                    if (isElementInViewport(section)) {
                        section.classList.add('show');
                    }
                });
            }

            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            window.addEventListener('scroll', showSections);
            window.addEventListener('resize', showSections);

            // Initial check to show sections when the page loads
            showSections();
        });