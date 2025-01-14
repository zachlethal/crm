<!-- resources/views/components/dark-mode-toggle.blade.php -->
<button id="darkModeToggle" class="fixed bottom-4 right-4 w-12 h-12 rounded-full bg-yellow-500 dark:bg-gray-800 flex items-center justify-center shadow-lg transition">
    <!-- Sun Icon -->
    <svg id="sunIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 4V2m0 20v-2m10-10h-2M4 12H2m16.95-6.95l-1.414 1.414M6.464 17.536l-1.414 1.414M17.536 17.536l1.414 1.414M6.464 6.464l1.414-1.414" />
        <circle cx="12" cy="12" r="5" />
    </svg>
    <!-- Moon Icon -->
    <svg id="moonIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white hidden" viewBox="0 0 24 24" fill="currentColor">
        <path d="M21 12.79A9 9 0 0111.21 3 7 7 0 1012 21a9.03 9.03 0 009-8.21z" />
    </svg>
</button>

<script>
    const toggleButton = document.getElementById('darkModeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');

    toggleButton.addEventListener('click', () => {
        const isDark = document.documentElement.classList.toggle('dark');

        // Toggle the visibility of Sun and Moon icons
        sunIcon.classList.toggle('hidden', isDark);
        moonIcon.classList.toggle('hidden', !isDark);

        // Apply dark/light classes to all relevant components
        const elementsToToggle = document.querySelectorAll('[x-data]');
        elementsToToggle.forEach(element => {
            element.classList.toggle('bg-gray-900', isDark);
            element.classList.toggle('bg-white', !isDark);
            element.classList.toggle('text-white', isDark);
            element.classList.toggle('text-gray-900', !isDark);
        });

        // Optional: Send a request to save the dark mode state on the server
        fetch('/toggle-dark-mode');
    });
</script>
