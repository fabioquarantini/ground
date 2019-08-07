import 'lazysizes';
import InfiniteScroll from './components/infiniteScroll.js';
import Modal from './components/modal.js';
//import AjaxNavigation from './components/ajaxNavigation.js';
import Slider from './components/slider.js';
import Parallax from './components/parallax.js';
import Loader from './components/loader.js';
import Split from './components/split.js';
import Toggle from './components/toggle.js';
// import ScrollOld from './components/scrollOld.js';
import Scroll from './components/scroll.js';
import Cursor from './components/cursor.js';
import Search from './components/search.js';


const infiniteScroll = new InfiniteScroll;
const loader = new Loader;
const modal = new Modal();
//const ajaxNavigation = new AjaxNavigation;
const sliderPrimary = new Slider('.js-slider-primary');
const sliderSecondary = new Slider('.js-slider-secondary');
const split = new Split();
const toggle = new Toggle();
// const scrollOld = new ScrollOld();
const scroll = new Scroll();
const parallax = new Parallax();
const cursor = new Cursor();
const search = new Search();