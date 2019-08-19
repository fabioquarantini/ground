import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';

export default class Magnet {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {

        this.DOM = document.querySelectorAll('.js-magnet');

		new imagesLoaded(document.body, { background: true }, this.init());

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.init();
		});
	}

	init() {

        if (this.DOM.length == 0) {
			return;
		}

        this.DOM.forEach(function(elem){
            $(document).on('mousemove touch', function(e){
                magnetize(elem, e);
            });
        })

        // $(document).on('mousemove touch', function(e){
        //   magnetize('.el', e);
        // });

        function magnetize(el, e){
            let mX = e.pageX,
                mY = e.pageY;
            const item = $(el);
            
            const customDist = item.data('dist') * 20 || 120;
            const centerX = item.offset().left + (item.width()/2);
            const centerY = item.offset().top + (item.height()/2);
            
            let deltaX = Math.floor((centerX - mX)) * -0.45;
            let deltaY = Math.floor((centerY - mY)) * -0.45;
            
            let distance = calculateDistance(item, mX, mY);
                
            if(distance < customDist){
                TweenMax.to(item, 0.5, { y: deltaY, x: deltaX, scale: 1.2 });
                item.addClass('is-magnet');
            }
            else {
                TweenMax.to(item, 0.6, { y: 0, x: 0, scale: 1, });
                item.removeClass('is-magnet');
            }
        }

        function calculateDistance(elem, mouseX, mouseY) {
            return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left+(elem.width()/2)), 2) + Math.pow(mouseY - (elem.offset().top+(elem.height()/2)), 2)));
        }

        /*- MOUSE STICKY -*/
        function lerp(a, b, n) {
            return (1 - n) * a + n * b
        }

	}
}