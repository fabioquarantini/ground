<?php
/**
 * Template Name: Example Gsap ScrollTrigger
 *
 * @package Ground
 */

get_template_part( 'partials/header' ); ?>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-chars">GSAP ScrollTrigger</h2>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-6 gr-centered" data-scroll data-scroll-animation="batch">
				<div class="row">
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
					<div class="gr-4">
						<div class="example js-batch-el">Batch</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row margin-top-5 margin-bottom-5">
			<div class="gr-2@md gr-3">
                <div class="example" data-scroll data-scroll-animation="rotation">SCRUB FALSE</div>
			</div>
			<div class="gr-2@md gr-3">
                <div class="example" data-scroll data-scroll-animation="rotation" data-scroll-scrub="1">SCRUB 1</div>
			</div>
			<div class="gr-2@md gr-3">
                <div class="example" data-scroll data-scroll-animation="rotation" data-scroll-scrub="2">SCRUB 2</div>
			</div>
			<div class="gr-2@md gr-3">
                <div class="example" data-scroll data-scroll-animation="rotation" data-scroll-scrub="3">SCRUB 3</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-chars" data-scroll-scrub="2">GSAP With SCRUB</h2>
			</div>
		</div>
	</div>

	<div class="container  position-relative" data-scroll data-scroll-animation="pin-vertical" data-scroll-scrub="1">
		<div class="position-relative pin-vertical background-black" data-scroll-animation-target>
			<div class="row">
				<div class="gr-4 overflow-hidden position-relative full-viewport-height">
					<div class="pin-vertical__container pin-vertical__container--left js-pin-vertical-container-left">

						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-5.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-7.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-8.jpg"/>
							</div>
						</div>
					</div>
				</div>
				<div class="gr-4 overflow-hidden position-relative full-viewport-height">
					<div class="pin-vertical__container pin-vertical__container--center js-pin-vertical-container-center">

						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-5.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-7.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-8.jpg"/>
							</div>
						</div>
					</div>
				</div>
				<div class="gr-4 overflow-hidden position-relative full-viewport-height">
					<div class="pin-vertical__container pin-vertical__container--right js-pin-vertical-container-right">

						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-5.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-7.jpg"/>
							</div>
						</div>
						<div class="pin-vertical__item">
							<div class="aspect-w-1 aspect-h-1">
								<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-8.jpg"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div data-scroll data-scroll-animation="comparison" data-scroll-scrub="1">
		<div class="container margin-top-5 margin-bottom-5" data-scroll-animation-target>
			<div class="row">
				<div class="gr-12">
					<section class="position-relative aspect-w-16 aspect-h-9">
						<div class="comparison__media comparison__before-media js-comparison-before-media">
							<img class="comparison__img" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-before.jpg" alt="before">
						</div>
						<div class="comparison__media comparison__after-media js-comparison-after-media">
							<img class="comparison__img" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-after.jpg" alt="after">
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5" data-scroll data-scroll-animation="background-color" data-background-color="#000000">
		<div class="row padding-top-5 padding-bottom-5">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-chars" data-scroll-scrub="2">CHANGE BG COLOR #000000</h2>
			</div>
		</div>
	</div>

	<div class="container position-relative" data-scroll data-scroll-animation="pin-horizontal" data-scroll-scrub="1">
		<div class="row">
			<div class="gr-6 gr-centered">
				<div class="position-relative pin-horizontal" data-scroll-animation-target>
					<div class="pin-horizontal__container js-pin-horizontal-container">
						<h1 class="color-white" style="white-space: nowrap;">Start - Lorem ipsum dolor sit amet, consectetur adipiscing elit - End</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" data-scroll data-scroll-animation="background-color" data-background-color="#ffffff"></div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row margin-top-5 margin-bottom-5">
			<div class="gr-2@md gr-4">
				<div class="example" data-scroll data-scroll-animation="parallax" data-scroll-speed="1">Parallax Y</div>
			</div>
			<div class="gr-2@md gr-4">
				<div class="example" data-scroll data-scroll-animation="parallax" data-scroll-speed="2" data-scroll-speed-horizontal="-2">Parallax Y & X</div>
			</div>
			<div class="gr-2@md gr-4">
				<div class="example" data-scroll data-scroll-animation="parallax" data-scroll-speed="0" data-scroll-speed-horizontal="-2">Parallax X</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="350" height="200" data-scroll data-scroll-animation="draw-svg" data-scroll-scrub="1">
					<path id="word" style="stroke-linecap: round; stroke-linejoin: round;" fill="none" stroke="#000000" stroke-width="7"  d="M22.328,70.018c9.867-7.4,10.724,20.434,13.014,28.694c-0.08-9.105-1.308-31.463,11.936-31.886c11.313-0.361,17.046,19.368,16.367,28.098c-1.432-10.289,6.234-30.682,18.163-25.671c11.505,4.833,8.682,26.772,20.071,31.964c13.06,5.953,14.854-8.305,19.734-17.017c7.188-12.836,4.933-15.417,29.6-14.8c-8.954-3.842-37.42,1.728-28.539,20.1c5.823,12.045,34.911,12.583,30.018-8.873c-5.385,17.174,24.01,23.104,24.01,9.123c0-9.867,3.816-15.937,16.034-18.5c8.359-1.754,18.982,4.754,25.9,9.25c-10.361-4.461-51.941-13.776-37.749,12.357c9.435,17.372,50.559,2.289,33.477-6.063c-2.871,19.008,32.415,31.684,30.695,54.439c-2.602,34.423-66.934,24.873-79.302,2.134c-13.11-24.101,38.981-36.781,54.798-40.941c8.308-2.185,42.133-12.162,25.88-25.587c-2.779,17.058,19.275,28.688,29.963,12.911c6.862-10.131,6.783-25.284,30.833-19.117c-9.404-0.429-32.624-0.188-32.864,18.472c-0.231,17.912,21.001,21.405,40.882,11.951"/>
					<path id="dot" style="stroke-linecap: round; stroke-linejoin: round;"fill="none" stroke="#000000" stroke-width="7" d="M247.003,38.567c-7.423,1.437-11.092,9.883-1.737,11.142c14.692,1.978,13.864-13.66,1.12-8.675"/>
				</svg>
			</div>
		</div>
	</div>

	<div class="container position-relative margin-bottom-5" data-scroll data-scroll-animation="pin">
		<div class="row" data-scroll-animation-target>
			<div class="gr-6@md gr-centered@md gr-12">
				<div class="background-black">
					<img class="js-pin__element" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-2.jpg"/>
				</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5" data-scroll data-scroll-animation="background-color" data-background-color="#000000">
		<div class="row padding-top-5 padding-bottom-5">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-chars" data-scroll-scrub="2">
					CHANGE BG COLOR <span class="color-secondary">#000000</span>
				</h2>
			</div>
		</div>
	</div>

	<div class="container position-relative" data-scroll data-scroll-animation="pin-horizontal" data-scroll-scrub="1">
		<div class="row">
			<div class="gr-12">

				<div class="position-relative margin-bottom-5 pin-horizontal" data-scroll-animation-target>
					<div class="pin-horizontal__container js-pin-horizontal-container padding-1">
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-2.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-4.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-5.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-7.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-8.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-2.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-4.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-5.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-6.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-7.jpg"/>
								</div>
							</div>
						</div>
						<div class="pin-horizontal__item">
							<div class="padding-1">
								<div class="aspect-w-1 aspect-h-1">
									<img class="full-width cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-8.jpg"/>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5" data-scroll data-scroll-animation="background-color" data-background-color="#ffffff">
		<div class="row padding-top-5 padding-bottom-5">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-chars" data-scroll-scrub="2">
					CHANGE BG COLOR <span class="color-secondary">#ffffff</span>
				</h2>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row padding-top-5 padding-bottom-5">
			<div class="gr-12">
				<h2 data-scroll data-scroll-animation="splittext-lines" data-scroll-scrub="2">
					Lorem ipsum dolor sit amet, <span class="color-secondary">consectetur</span> adipiscing elit.
				</h2>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row margin-top-5">
			<div class="gr-6 gr-centered margin-top-5">
				<div class="example" data-scroll data-scroll-animation="fade-in-down">Animation FadeInDown</div>
				<div class="example" data-scroll data-scroll-animation="fade-in-down">Animation FadeInDown</div>
				<div class="example" data-scroll data-scroll-animation="fade-in-down">Animation FadeInDown</div>
			</div>
		</div>
	</div>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row margin-top-5">
			<div class="gr-6 gr-centered margin-top-5">
				<div class="example" data-scroll data-scroll-animation="scale">Animation Scale</div>
			</div>
		</div>
	</div>



<?php
get_template_part( 'partials/footer' );