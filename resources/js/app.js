import slideshow from "./slideshow.js";

// Wait for Livewire's Alpine to initialize
document.addEventListener('alpine:init', () => {
    // Register your slideshow component
    window.Alpine.data('slideshow', slideshow);
});
