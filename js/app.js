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
import Magnet from './components/magnet.js';


const infiniteScroll = new InfiniteScroll;
const loader = new Loader;
const modal = new Modal();
//const ajaxNavigation = new AjaxNavigation;
const sliderPrimary = new Slider('.js-slider-primary');
const split = new Split();
const toggle = new Toggle();
// const scrollOld = new ScrollOld();
const scroll = new Scroll();
const parallax = new Parallax();
const cursor = new Cursor();
const search = new Search();
const magnet = new Magnet();

const carousel = new Slider('.js-carousel',{
    loop: false,
    autoHeight: false,
    effect: 'slide',
    slidesPerView: 'auto',
    spaceBetween: 30,
    parallax: false,
    autoplay: false,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    },
    breakpoints: {
        // when window width is >= xs
        480: {
            slidesPerView: 'auto',
            //slidesPerView: 'auto',
            //freeMode: true,
            //spaceBetween: 48
        },
        // when window width is >= sm
        768: {
            slidesPerView: 'auto'
            //freeMode: false,
        },
        // when window width is >= md
        992: {
            slidesPerView: 'auto'
        },
        // when window width is >= lg
        1200: {
            slidesPerView: 'auto'
        },
        // when window width is >= xl
        1440: {
            slidesPerView: 'auto'
        }
    }
});