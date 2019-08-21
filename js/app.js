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
//const toggle = new Toggle();
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
    touchEventsTarget: '.swiper-wrapper',
    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    },
    on: {

        touchStart: function() {

            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {

                TweenMax.to(swiper.slides[i], 0.6, { ease: Circ.easeOut, scale: 0.9})
                TweenMax.to(swiper.slides[i].querySelector(".carousel__media"), 2, { ease: Circ.easeOut, scale: 1.2})

            }
            
        },
    
        touchEnd: function() {

            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {

                TweenMax.to(swiper.slides[i], 0.2, { ease: Circ.easeOut, scale: 1})
                TweenMax.to(swiper.slides[i].querySelector(".carousel__media"), 0.2, { ease: Circ.easeOut, scale: 1})

            }
            
        },

    }
});