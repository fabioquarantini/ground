import 'lazysizes';
import InfiniteScroll from './components/infiniteScroll.js';
import Modal from './components/modal.js';
import Navigation from './components/navigation.js';
import Slider from './components/slider.js';
import Preloader from './components/preloader.js';
import Split from './components/split.js';

const infiniteScroll = new InfiniteScroll;
const modal = new Modal('.js-modal');
const navigation = new Navigation;
const preloader = new Preloader;
const slider = new Slider('.js-slider-primary');
const split = new Split;