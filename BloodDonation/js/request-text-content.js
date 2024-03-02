document.addEventListener("DOMContentLoaded", function () {
  function handleScroll(elementClass) {
    var elements = document.querySelectorAll("." + elementClass);

    elements.forEach(function (element) {
      var scrollPosition = window.scrollY;
      var triggerPosition = element.offsetTop - window.innerHeight + 100;

      if (scrollPosition > triggerPosition) {
        element.classList.add("show");
      }
    });
  }

  // Trigger handleScroll once on page load for each class
  handleScroll("request-text-content");
  handleScroll("content-container");

  window.addEventListener("scroll", function () {
    handleScroll("request-text-content");
    handleScroll("content-container");
  });
});
