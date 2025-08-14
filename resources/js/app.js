import Alpine from "alpinejs";
import slideshow from "./slideshow.js";
window.Alpine = Alpine;

Alpine.data("slideshow", () => slideshow);

Alpine.start();
