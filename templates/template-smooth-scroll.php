<?php
/**
 * Template Name: Smooth Scroll
 *
 * @package Ground
 */

get_template_part( 'partials/header' ); ?>

	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">

				<h1 style="font-size: 160px; line-height: 160px;">
					<span class="display-inline-block" data-scroll data-scroll-speed="3" data-scroll-position="top">GROUND</span>
				</h1>

				<h1 style="font-size: 160px; line-height: 160px;">
					<span class="display-inline-block" data-scroll data-scroll-speed="4" data-scroll-position="top">TEMPLATE</span>
				</h1>
				<h1 style="font-size: 160px; line-height: 160px;">
					<span class="display-inline-block" data-scroll data-scroll-speed="2" data-scroll-position="top">SCROLL</span>
				</h1>
				<h1 style="font-size: 160px; line-height: 160px;">
					<span class="display-inline-block" data-scroll data-scroll-speed="1" data-scroll-position="top" data-scroll-direction="horizontal" data-scroll-delay="0.05">V</span>
					<span class="display-inline-block" data-scroll data-scroll-speed="-1" data-scroll-position="top" data-scroll-direction="horizontal" data-scroll-delay="0.05">1</span>
					<span class="display-inline-block" data-scroll data-scroll-speed="2" data-scroll-position="top" data-scroll-delay="0.5">.</span>
					<span class="display-inline-block" data-scroll data-scroll-speed="4" data-scroll-position="top" data-scroll-delay="0.05">0</span>
				</h1>

			</div>
		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">
				<?php get_template_part( 'partials/carousel', 'primary' ); ?>
			</div>
		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">
			<div class="gr-12">

				<div style="font-size: 160px; line-height: 160px;">
					<h1 class="display-inline-block">
						<span style="font-size: 160px; line-height: 160px;" data-splitting="masked" data-scroll data-scroll-offset="30%">DATA SPLITTING</span>
					</h1>
				</div>

				<div style="font-size: 160px; line-height: 160px;">
					<h1 class="display-inline-block">
						<span style="font-size: 160px; line-height: 160px;" data-splitting="masked" data-scroll data-scroll-offset="30%">MASKED VERSION</span>
					</h1>
				</div>

			</div>
		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">

			<div class="gr-12">

				<div data-scroll data-scroll-animation="fade-in-down" data-scroll-repeat>
					<div href="#fade-in-up" data-scroll-to>
						<h2>data-scroll-to FADE IN UP</h2>
					</div>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down" data-scroll-repeat>
					<div href="#fade-in-right" data-scroll-to>
						<h2>data-scroll-to FADE IN RIGHT</h2>
					</div>
				</div>

				<div data-scroll data-scroll-animation="fade-in-down" data-scroll-repeat>
					<h2>fade-in-down</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down">
					<h2>fade-in-down</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down">
					<h2>fade-in-down</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down">
					<h2>fade-in-down</h2>
				</div>
			</div>

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-down-staggered">
					<h2>fade-in-down-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down-staggered">
					<h2>fade-in-down-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down-staggered">
					<h2>fade-in-down-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-down-staggered">
					<h2>fade-in-down-staggered</h2>
				</div>
			</div>

		</div>
	</div>


	<div class="container margin-top-5">
		<div class="row">
			<div class="gr-12">

				<div style="font-size: 160px; line-height: 160px;">
					<h1 class="display-inline-block">
						<span style="font-size: 160px; line-height: 160px;" data-splitting="masked" data-scroll data-scroll-offset="10%">SLIDER GALLERY</span>
					</h1>
				</div>

			</div>
		</div>
	</div>


	<div class="container container--fluid padding-0 margin-bottom-5">
		<div class="row">
			<div class="gr-10@md gr-8 gr-centered">
				<?php get_template_part( 'partials/slider', 'gallery' ); ?>
			</div>
		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5" id="fade-in-up">
		<div class="row">

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-up">
					<h2>fade-in-up</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up">
					<h2>fade-in-up</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up">
					<h2>fade-in-up</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up">
					<h2>fade-in-up</h2>
				</div>
			</div>

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-up-staggered">
					<h2>fade-in-up-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up-staggered">
					<h2>fade-in-up-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up-staggered">
					<h2>fade-in-up-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-up-staggered">
					<h2>fade-in-up-staggered</h2>
				</div>
			</div>

		</div>
	</div>


	<div class="container" id="fixed-elements">
		<div class="row">

			<div class="gr-6">
				<div data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
					<div data-scroll>
						<h3>Fixed elements</h3>
					</div>
				</div>
			</div>

			<div class="gr-6">
				<div class="masked-full-height" data-scroll data-scroll-repeat>
					<div class="masked-full-height__target" id="fixed-target"></div>
					<div class="masked-full-height__bg" data-scroll data-scroll-sticky data-scroll-target="#fixed-target" style="background-image:url('<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg')"></div>
				</div>
			</div>

		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5" id="fade-in-right">
		<div class="row">

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-right">
					<h2>fade-in-right</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right">
					<h2>fade-in-right</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right">
					<h2>fade-in-right</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right">
					<h2>fade-in-right</h2>
				</div>
			</div>

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-right-staggered">
					<h2>fade-in-right-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right-staggered">
					<h2>fade-in-right-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right-staggered">
					<h2>fade-in-right-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-right-staggered">
					<h2>fade-in-right-staggered</h2>
				</div>
			</div>

		</div>
	</div>


	<div class="container">
		<div class="row">

			<div class="gr-12">

				<div>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.1" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 160px; line-height: 160px;">LERP</h1>
					</span>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.3" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 160px; line-height: 160px;">IPSUM</h1>
					</span>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.5" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 160px; line-height: 160px;">♥</h1>
					</span>
				</div>


				<div>
					<span class="display-inline-block" data-scroll>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.13" data-scroll-speed="6">B</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.12" data-scroll-speed="6">Y</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.11" data-scroll-speed="6"> </h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.1" data-scroll-speed="6">L</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.09" data-scroll-speed="6">E</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.08" data-scroll-speed="6">T</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.07" data-scroll-speed="6">T</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.06" data-scroll-speed="6">E</h1>
						<h1 style="font-size: 160px; line-height: 160px;" class="display-inline-block" data-scroll data-scroll-delay="0.05" data-scroll-speed="6">R</h1>
					</span>
				</div>

			</div>
		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">

			<div class="gr-4" data-scroll data-scroll-animation="zoom-in-staggered">
				<div class="overflow-hidden">
					<figure>
						<a href="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg" class="js-cursor-plus" data-modal="gallery" data-modal-caption="Lorem ipsum" data-modal-size="934x1401" data-router-disabled>
							<img class="cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1.jpg">
						</a>
					</figure>
				</div>
			</div>

			<div class="gr-4" data-scroll data-scroll-animation="zoom-in-staggered">
				<div class="overflow-hidden">
					<figure>
						<a href="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-2.jpg" class="js-cursor-plus" data-modal="gallery" data-modal-caption="Lorem ipsum" data-modal-size="934x1401" data-router-disabled>
							<img class="cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-2.jpg">
						</a>
					</figure>
				</div>
			</div>

			<div class="gr-4" data-scroll data-scroll-animation="zoom-in-staggered">
				<div class="overflow-hidden">
					<figure>
						<a href="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg" class="js-cursor-plus" data-modal="gallery" data-modal-caption="Lorem ipsum" data-modal-size="934x1401" data-router-disabled>
							<img class="cover" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-3.jpg">
						</a>
					</figure>
				</div>
			</div>

		</div>
	</div>


	<div class="container margin-top-5 margin-bottom-5">
		<div class="row">

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-left">
					<h2>fade-in-left</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left">
					<h2>fade-in-left</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left">
					<h2>fade-in-left</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left">
					<h2>fade-in-left</h2>
				</div>
			</div>

			<div class="gr-12">
				<div data-scroll data-scroll-animation="fade-in-left-staggered">
					<h2>fade-in-left-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left-staggered">
					<h2>fade-in-left-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left-staggered">
					<h2>fade-in-left-staggered</h2>
				</div>
				<div data-scroll data-scroll-animation="fade-in-left-staggered">
					<h2>fade-in-left-staggered</h2>
				</div>
			</div>

		</div>
	</div>


	<div class="container margin-top-5">
		<div class="row margin-top-5">

			<div class="gr-12 margin-top-5">

				<div>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.1" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 140px; line-height: 140px;">Nome</h1>
					</span>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.3" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 140px; line-height: 140px;">del</h1>
					</span>
					<span class="display-inline-block" data-scroll data-scroll-delay="0.5" data-scroll-speed="6" data-scroll-repeat>
						<h1 style="font-size: 140px; line-height: 140px;">Progetto </h1>
					</span>
				</div>

			</div>
		</div>
	</div>


	<div class="container position-relative margin-bottom-5">
		<div class="row">

			<div class="gr-4">

				<div class="position-relative" data-scroll data-scroll-delay="0.1" data-scroll-speed="6">
					<div class="position-relative overflow-hidden" data-scroll data-scroll-repeat>
						<img data-scroll data-scroll-delay="0.1" data-scroll-speed="-1.5" class="media__img--masked full-width" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1-vertical.jpg" alt="text">
					</div>
				</div>

			</div>

			<div class="gr-4 margin-top-3">

				<div class="position-relative" data-scroll data-scroll-delay="0.3" data-scroll-speed="6">
					<div class="position-relative overflow-hidden" data-scroll data-scroll-repeat>
						<img data-scroll data-scroll-delay="0.3" data-scroll-speed="-1.5" class="media__img--masked full-width" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1-vertical.jpg" alt="text">
					</div>
				</div>

			</div>

			<div class="gr-4">

				<div class="position-relative" data-scroll data-scroll-delay="0.5" data-scroll-speed="6">
					<div class="position-relative overflow-hidden" data-scroll data-scroll-repeat>
						<img data-scroll data-scroll-delay="0.5" data-scroll-speed="-4" class="media__img--masked full-width" src="<?php echo esc_url( TEMPLATE_URL ); ?>/img/sample-1-vertical.jpg" alt="text">
					</div>
				</div>

			</div>

		</div>
	</div>

<?php
get_template_part( 'partials/footer' );
