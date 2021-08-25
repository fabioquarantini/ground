						</main>

						<div class="fixed bottom-0 right-0 z-50">

							<?php
							/**
							 * Hook: ground_notice.
							 */
							do_action( 'ground_notice' );
							?>
						</div>

						<?php
						get_template_part( 'partials/pre-footer' );
						get_template_part( 'partials/content', 'footer' );
						?>

						</div><!-- End [data-router-view]  -->

						</div><!-- End [data-router-wrapper] -->

						</div> <!-- End .scroll -->

						<?php get_template_part( 'partials/search', 'form' ); ?>
						<?php // get_template_part( 'partials/cursor' ); ?>
						<?php // get_template_part( 'partials/modal' ); ?>
						<?php // get_template_part( 'partials/debug-grid' ); ?>

						<?php wp_footer(); ?>

						</body>

						</html>
