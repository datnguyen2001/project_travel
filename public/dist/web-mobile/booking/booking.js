$(function () {
    $('.card-review-main.card-d-none').slice(0, 6).show();
    $('.btn-view-all').click(function (e) {
        $('.card-review-main.card-d-none').show();
        $('.btn-view-all').hide();
        e.preventDefault();
    });
    SliderCategory();
});

function SliderCategory() {
    $('.slider-category__slick').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        speed: 800,
        slidesToShow: 5,
        slidesToScroll: 2,
        prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
        centerMode: false,
    })
}

class PriceRange extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        // Elements
        this.elements = {
            container: this.querySelector('div'),
            track: this.querySelector('div > div'),
            from: this.querySelector('input:first-of-type'),
            to: this.querySelector('input:last-of-type'),
            output: this.querySelector('output')
        }

        // Event listeners
        this.elements.from.addEventListener('input', this.handleInput.bind(this));
        this.elements.to.addEventListener('input', this.handleInput.bind(this));

        // Properties
        this.currency = (this.hasAttribute('currency') && this.getAttribute('currency') !== undefined && this.getAttribute('currency') !== '') ? this.getAttribute('currency') : '£';

        // Update the DOM
        this.updateDom();

    }

    disconnectedCallback() {
        delete this.elements;
        delete this.currency;

    }

    get from() {
        return parseInt(this.elements.from.value);
    }

    get to() {
        return parseInt(this.elements.to.value);
    }

    handleInput(event) {
        if (parseInt(this.elements.to.value) - parseInt(this.elements.from.value) <= 1) {
            if (event.target === this.elements.from) {
                this.elements.from.value = (parseInt(this.elements.to.value) - 1);
            } else if (event.target === this.elements.to) {
                this.elements.to.value = (parseInt(this.elements.from.value) + 1);
            }
        }

        // Update the DOM
        this.updateDom();
    }

    updateDom() {
        this.drawFill();
        this.drawOutput();
    }

    drawFill() {
        const percent1 = (this.elements.from.value / this.elements.from.max) * 100,
            percent2 = (this.elements.to.value / this.elements.to.max) * 100;

        this.elements.track.style.background = `linear-gradient(to right, var(--track-color) ${percent1}%, var(--track-highlight-color) ${percent1}%, var(--track-highlight-color) ${percent2}%, var(--track-color) ${percent2}%)`;
    }

    format(number){
        return number.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }

    drawOutput() {
        this.elements.output.textContent = `${this.format(this.elements.from.value)} ${this.currency} - ${this.format(this.elements.to.value)} ${this.currency}`;
    }
}

customElements.define('price-range', PriceRange);

