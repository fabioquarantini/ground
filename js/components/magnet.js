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
    
        this.DOM.element.forEach( (magnet) => {
            magnet.addEventListener('mousemove', this.moveMagnet );
            magnet.addEventListener('mouseout', function(event) {
                
                if (magnet.classList.contains("is-magnet")) {
                    magnet.classList.remove('is-magnet');
                }

                TweenMax.to( event.currentTarget, 0.4, {x: 0, y: 0, ease: Back.easeOut})

            } );
        });

    }
    
    /**
     * moveMagnet
    */
    moveMagnet(event) {

        let magnetButton = event.currentTarget;
        let bounding = magnetButton.getBoundingClientRect();
        
        if (!magnetButton.classList.contains("is-magnet")) {
            magnetButton.classList.add('is-magnet');
        }
        //console.log(magnetButton, bounding)

        TweenMax.to( magnetButton, 1, {
            x: ((( event.clientX - bounding.left)/magnetButton.offsetWidth) - 0.5) * 70,
            y: ((( event.clientY - bounding.top)/magnetButton.offsetHeight) - 0.5) * 70,
            ease: Power4.easeOut
        })

        //   magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';

    }

}