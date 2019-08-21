import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';

export default class Magnet {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
        this.DOM = { element: document.querySelectorAll('.js-magnet')};
		this.DOM.body = document.body;
        
		new imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {

        if (this.DOM.element.length == 0) {
			return;
		}

        this.DOM.element.forEach(element => {

            window.addEventListener('mousemove', event => this.magnetize(element, event));

        });

    }
    

    /**
     * Magnetize
    */
    magnetize(element, event) {

        let mX = event.pageX,
            mY = event.pageY;
        const item = element;
        
        const customDist = item.getAttribute('data-dist') * 20 || 120;
        const centerX = item.offsetLeft + (item.clientWidth/2);
        const centerY = item.offsetTop + (item.clientHeight/2);
        
        let deltaX = Math.floor((centerX - mX)) * -0.45;
        let deltaY = Math.floor((centerY - mY)) * -0.45;
        
        let distance = this.calculateDistance(item, mX, mY);
            
        if(distance < customDist) {
            TweenMax.to(item, 0.5, { y: deltaY, x: deltaX, scale: 1.2 });
            item.classList.add('is-magnet');
        } else {
            TweenMax.to(item, 0.6, { y: 0, x: 0, scale: 1, });
            item.classList.remove('is-magnet');
        }

    }

    /**
     * calculateDistance
    */
    calculateDistance(element, mouseX, mouseY) {

        return Math.floor(Math.sqrt(Math.pow(mouseX - (element.offsetLeft+(element.clientWidth/2)), 2) + Math.pow(mouseY - (element.offsetTop+(element.clientHeight/2)), 2)));
    
    }

}