// resources/js/dark_toggle.js
// Simple dark mode toggle script
document.getElementById('dark_toggle').addEventListener('click', function() {
    // Toggle the 'dark' class on the HTML element
    document.documentElement.classList.toggle('dark');
});