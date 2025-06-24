import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.toggleTheme = function () {
    const html = document.documentElement;
    if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
};

// Initialize theme based on saved preference
if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
}
