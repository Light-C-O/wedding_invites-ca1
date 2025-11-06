// resources/js/dark_toggle.js
// Simple dark mode toggle script
// document.getElementById('dark_toggle').addEventListener('click', function() {
    // Toggle the 'dark' class on the HTML element
//     document.documentElement.classList.toggle('dark');
// });

//Updated version of dark mode toggle script - to make sure it stay dark or light until triggered
// When the user clicks the button, it toggles the class and stores the preference in localStorage.
const toggleButton = document.getElementById('dark_toggle');
const html = document.documentElement;

// Apply saved theme on page load
if (localStorage.getItem('theme') === 'dark') {
    html.classList.add('dark');
}

// Toggle and save theme preference
toggleButton.addEventListener('click', function() {
    html.classList.toggle('dark');

    if (html.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});