// resources/js/dark_toggle_mobile.js
// Simple dark mode toggle script for mobile toggle button
document.getElementById('dark_toggle_mobile').addEventListener('click', function() {
    // Toggle the 'dark' class on the HTML element
    document.documentElement.classList.toggle('dark');
});