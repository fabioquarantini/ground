import Utilities from './utilities/utilities.js';
import './components/highway.js';
import Slider from './components/slider.js';
import Modal from './components/modal.js';

//import './components/console.js';
//import './components/infiniteScroll.js';
//import './components/loader.js';
//import './components/toggleClass.js';
//import './components/lazyLoad.js';
//import './components/animations.js';
//import './components/parallax.js';

import 'lazysizes';
var slider = new Slider('.js-slider-primary', {
	init: false
});
slider.start();
var modal = new Modal('.js-modal');