export default {
    currentPosition: 0,
    slideWidth: 308,
    gap: 12,
    autoSlideInterval: null,
    container: null,

    init() {
        this.$nextTick(() => {
            this.container = this.$el.querySelector(".items__col");
            if (!this.container) {
                console.error("Could not find .items__col container!");
                return;
            }

            this.startAutoSlide();
        });
    },

    prevBtn() {
        if (!this.container) return;

        const newPosition = this.currentPosition + (this.slideWidth + this.gap);
        this.currentPosition = Math.min(newPosition, 0);
        this.updateTransform();
    },

    nextBtn() {
        if (!this.container || !this.$refs.itemsSell) return;

        try {
            const totalWidth = this.$refs.itemsSell.scrollWidth;
            const maxOffset = -(totalWidth - this.container.clientWidth);

            const newPosition =
                this.currentPosition - (this.slideWidth + this.gap);
            this.currentPosition = Math.max(newPosition, maxOffset);

            this.updateTransform();
        } catch (error) {
            console.error("Slider error:", error);
        }
    },

    updateTransform() {
        if (!this.$refs.itemsSell) return;
        this.$refs.itemsSell.style.transform = `translateX(${this.currentPosition}px)`;
        this.$refs.itemsSell.style.transition = "transform 0.3s ease";
    },

    startAutoSlide() {
        if (!this.container) return;

        clearInterval(this.autoSlideInterval);
        this.autoSlideInterval = setInterval(() => {
            if (!this.$refs.itemsSell) return;

            const totalWidth = this.$refs.itemsSell.scrollWidth;
            const maxOffset = -(totalWidth - this.container.clientWidth);

            if (this.currentPosition <= maxOffset) {
                this.currentPosition = 0;
            } else {
                this.nextBtn();
            }
            this.updateTransform();
        }, 3000);
    },

    destroy() {
        clearInterval(this.autoSlideInterval);
    },
};
