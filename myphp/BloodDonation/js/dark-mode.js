// dark-mode.js

// Function to set the dark mode preference in localStorage
function setDarkModePreference(isDarkMode) {
    localStorage.setItem('darkMode', isDarkMode);
  }
  
  // Function to toggle dark mode on the body and set the preference
  function toggleDarkMode() {
    var body = document.getElementById("body");
    var isDarkMode = body.classList.toggle("dark-mode");
    setDarkModePreference(isDarkMode);
  }
  
  // Function to initialize dark mode based on user's preference
  function initializeDarkMode() {
    var body = document.getElementById("body");
    var isDarkMode = localStorage.getItem('darkMode') === 'true';
  
    if (isDarkMode) {
      body.classList.add("dark-mode");
    }
  }
  
  // Call the initializeDarkMode function when the page loads
  window.onload = initializeDarkMode;
  