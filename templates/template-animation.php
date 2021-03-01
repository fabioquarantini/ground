<?php

/**
 * Template Name: Animation
 *
 * @package Ground
 */

get_template_part('partials/header'); ?>

<div class="relative overflow-hidden">

    <div class="container text-center">
        <h2 class="mt-40 text-gray-800 text-center"><span class="text-8xl animate-pulse">Ground Animation</span> <span class="text-gray-300">V1.0.2</span></h2>
        <div class="animate-bounce inline-block mt-20">
            <?php ground_icon('arrow-long-down'); ?>
        </div>
    </div>

    <div class="container mt-12 text-center" data-flip>
        <h2 class="mb-9 text-gray-300">Drag the squares <strong class="text-gray-800">Flip</strong></h2>
        <button data-flip-trigger>CLICK HERE TO FLIP</button>
        <div class="relative">
            <div class="inline-block h-44 w-44 m-12 border border-green-500" data-flip-from>
                <div class="bg-green-500 h-full w-full" data-flip-item></div>
            </div>
            <div class="inline-block h-12 w-12 m-12 border border-green-500 transform rotate-45" data-flip-to></div>
        </div>
    </div>

    <div class="container max-w-2xl mt-40 text-center">

        <h2 class="mt-9 text-gray-300">fade-in <strong class="text-gray-800">Staggered</strong></h2>
        <div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-staggered"></div>
        </div>

        <h2 class="mt-9 text-gray-300">fade-in-down <strong class="text-gray-800">Staggered</strong></h2>
        <div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-down-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-down-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-down-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-down-staggered"></div>
        </div>

        <h2 class="mt-9 text-gray-300">fade-in-up <strong class="text-gray-800">Staggered</strong></h2>
        <div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-up-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-up-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-up-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-up-staggered"></div>
        </div>

        <h2 class="mt-9 text-gray-300">fade-in-left <strong class="text-gray-800">Staggered</strong></h2>
        <div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-left-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-left-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-left-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-left-staggered"></div>
        </div>

        <h2 class="mt-9 text-gray-300">fade-in-right <strong class="text-gray-800">Staggered</strong></h2>
        <div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-right-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-right-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-right-staggered"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 opacity-0" data-scroll="animate-fade-in-right-staggered"></div>
        </div>

        <h2 class="mt-16 text-gray-300">Animation <strong class="text-gray-800">fade-in</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-in-down</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-down"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-down"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-down"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-in-up</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-up"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-up"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-up"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-in-left</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-left"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-left"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-left"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-in-right</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-right"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-right"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-fade-in-right"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">scale-in</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-scale-in"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-scale-in"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg opacity-0" data-scroll="animate-scale-in"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-out</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-out-up</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-up"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-up"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-up"></div>

        <h2 class="mt-28 text-gray-300">Animation <strong class="text-gray-800">fade-out-down</strong></h2>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-down"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-down"></div>
        <div class="py-9 my-12 bg-green-300 rounded-lg" data-scroll="animate-fade-out-down"></div>

    </div>

    <div data-scroll="js-background-color" data-background-color="#000000"></div>

    <div class="container max-w-4xl text-center my-44 text-white">

        <div class="my-12">
            <h1 class="opacity-0 text-9xl" data-scroll="js-splittext-chars" data-scroll-scrub="2">Animation JS</h1>
        </div>

        <div class="my-12">
            <h1 class="opacity-0" data-scroll="js-splittext-lines" data-scroll-scrub="2">
                Lorem ipsum dolor sit amet, <span class="text-green-300">consectetur adipiscing elit.</span> Ut vitae porta risus. Sed ornare efficitur iaculis. Integer porttitor massa ac ligula dignissim fringilla.
            </h1>
        </div>

        <div class="my-44">
            <h2 class="mt-28 mb-12 text-gray-300">Parallax <strong class="text-gray-500">Y -Y</strong></h2>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="0.5"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="-0.8"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="0.9"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="-0.4"></div>
        </div>

        <div class="my-44">
            <h2 class="mt-28 mb-12 text-gray-300">Parallax <strong class="text-gray-500">X/Y -X/-Y</strong></h2>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="0" data-scroll-speed-x="2"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="-1" data-scroll-speed-x="1"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="1" data-scroll-speed-x="-1"></div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5" data-scroll="js-parallax" data-scroll-speed-y="0" data-scroll-speed-x="-2"></div>
        </div>

        <div class="my-44 text-center">
            <h2 class="mt-28 text-gray-300">Scale <strong class="text-gray-500">Scrub</strong></h2>
            <div class="py-9 my-12 bg-green-300 rounded-lg w-1/2 inline-block" data-scroll="js-scale" data-scroll-scrub="1"></div>
        </div>

        <div class="my-44">
            <h2 class="mt-28 text-gray-300">Rotation <strong class="text-gray-500">Scrub True/False</strong></h2>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll="js-rotation">SCRUB FALSE</div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll="js-rotation" data-scroll-scrub="1">SCRUB 1</div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll="js-rotation" data-scroll-scrub="2">SCRUB 2</div>
            <div class="py-9 my-12 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll="js-rotation" data-scroll-scrub="3">SCRUB 3</div>
        </div>

        <div class="my-44" data-scroll="js-batch">
            <h2 class="mt-28 mb-9 text-gray-300">Batch <strong class="text-gray-500"></strong></h2>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
            <div class="py-9 bg-green-300 rounded-lg inline-block w-1/5 text-black" data-scroll-target></div>
        </div>

        <!-- <div class="my-44">
            <h2 class="mt-28 mb-9 text-gray-300">Video <strong class="text-gray-500">Play if Inview</strong></h2>
            <div class="rounded-lg overflow-hidden border border-white aspect-w-16 aspect-h-9" data-scroll="js-video">
                <video data-scroll-target preload="none" playsinline muted loop>
                    <source src="https://res.cloudinary.com/dhcuygjf8/video/upload/v1609172097/Evoluzione/Video/video-404_ohherb.mp4" type="video/mp4">
                </video>
            </div>
        </div> -->

        <div class="my-44">
            <h2 class="mb-6 text-gray-300">Draw <strong class="text-gray-500">SVG</strong></h2>
            <div class="bg-white bg-opacity-10 rounded-lg text-center pt-4">
                <div class="inline-block">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="350" height="200" data-scroll="js-draw-svg" data-scroll-scrub="1">
                        <path id="word" style="stroke-linecap: round; stroke-linejoin: round;" fill="none" stroke="#ffffff" stroke-width="7" d="M22.328,70.018c9.867-7.4,10.724,20.434,13.014,28.694c-0.08-9.105-1.308-31.463,11.936-31.886c11.313-0.361,17.046,19.368,16.367,28.098c-1.432-10.289,6.234-30.682,18.163-25.671c11.505,4.833,8.682,26.772,20.071,31.964c13.06,5.953,14.854-8.305,19.734-17.017c7.188-12.836,4.933-15.417,29.6-14.8c-8.954-3.842-37.42,1.728-28.539,20.1c5.823,12.045,34.911,12.583,30.018-8.873c-5.385,17.174,24.01,23.104,24.01,9.123c0-9.867,3.816-15.937,16.034-18.5c8.359-1.754,18.982,4.754,25.9,9.25c-10.361-4.461-51.941-13.776-37.749,12.357c9.435,17.372,50.559,2.289,33.477-6.063c-2.871,19.008,32.415,31.684,30.695,54.439c-2.602,34.423-66.934,24.873-79.302,2.134c-13.11-24.101,38.981-36.781,54.798-40.941c8.308-2.185,42.133-12.162,25.88-25.587c-2.779,17.058,19.275,28.688,29.963,12.911c6.862-10.131,6.783-25.284,30.833-19.117c-9.404-0.429-32.624-0.188-32.864,18.472c-0.231,17.912,21.001,21.405,40.882,11.951" />
                        <path id="dot" style="stroke-linecap: round; stroke-linejoin: round;" fill="none" stroke="#ffffff" stroke-width="7" d="M247.003,38.567c-7.423,1.437-11.092,9.883-1.737,11.142c14.692,1.978,13.864-13.66,1.12-8.675" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="my-44" data-scroll="js-pin" data-scroll-scrub="1">
            <div data-scroll-target>
                <h2 class="mb-6 text-gray-300">Pin <strong class="text-gray-500">Scale</strong></h2>
                <div class="bg-white bg-opacity-10 rounded-lg">
                    <div data-scroll-target-animate class="bg-green-300 rounded-lg w-full h-80"></div>
                </div>
            </div>
        </div>

        <div class="my-44" data-scroll="js-pin-horizontal" data-scroll-scrub="1">
            <div data-scroll-target>
                <h2 class="mb-9 text-gray-300">Pin <strong class="text-gray-500">Horizontal</strong></h2>
                <div class="relative flex whitespace-nowrap bg-white rounded-lg pb-4">
                    <div class="mix-blend-mode-difference" data-scroll-target-animate>
                        <h1 class="text-9xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-44" data-scroll="js-pin-horizontal" data-scroll-scrub="1">
            <div data-scroll-target>
                <h2 class="mb-9 text-gray-300">Pin <strong class="text-gray-500">Horizontal Items</strong></h2>
                <div class="relative flex whitespace-nowrap bg-white rounded-lg py-9">
                    <div class="mix-blend-mode-difference" data-scroll-target-animate>
                        <div class="flex space-x-12">
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                            <div class="py-9 w-60 bg-white rounded-lg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="relative my-44" data-scroll="js-pin-image-sequence" data-scroll-frames="120" data-scroll-path="https://res.cloudinary.com/dhcuygjf8/image/upload/v1605626657/Coltri/Landing%20Product/Smart">
            <div class="relative" data-scroll-target>
                <h2 class="text-gray-300">Pin <strong class="text-gray-500">Image Sequence</strong></h2>
                <div class="relative w-9/12 m-auto" data-scroll-target-animate>
                    <canvas data-scroll-canvas class="relative w-full" />
                </div>
            </div>
        </div> -->

        <div data-scroll="js-comparison" data-scroll-scrub="1">
            <div data-scroll-target>
                <h2 class="mb-6 text-gray-300">Pin <strong class="text-gray-500">Comparison</strong></h2>
                <div class="position-relative aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                    <div class="h-full w-full">
                        <img class="absolute h-full w-full top-0" src="<?php echo esc_url(TEMPLATE_URL); ?>/img/sample-before.jpg" alt="before">
                    </div>
                    <div class="h-full w-full absolute overflow-hidden top-0 translate-x-full js-comparison-after-media">
                        <img class="-translate-x-full" src="<?php echo esc_url(TEMPLATE_URL); ?>/img/sample-after.jpg" alt="after">
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
get_template_part('partials/footer');
