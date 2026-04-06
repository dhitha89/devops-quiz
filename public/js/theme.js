function toggleTheme() {
    const html   = document.documentElement;
    const isDark = html.getAttribute('data-theme') === 'dark';
    html.setAttribute('data-theme', isDark ? 'light' : 'dark');
    document.getElementById('theme-icon').textContent  = isDark ? '🌙' : '☀️';
    document.getElementById('theme-label').textContent = isDark ? 'Dark' : 'Light';
}
