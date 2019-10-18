						</main>
					
					<?php get_template_part( 'partials/content', 'footer' ); ?>

				</div> <!-- End [data-scroll-section] --> 

			</div><!-- End [data-router-view]  -->

		</div><!-- End [data-router-wrapper] -->

	</div> <!-- End .scroll -->

	<?php get_template_part( 'partials/search', 'form' ); ?>
	<?php get_template_part( 'partials/scroll', 'progress' ); ?>
	<?php get_template_part( 'partials/cursor' ); ?>
	<?php get_template_part( 'partials/modal' ); ?>

	<?php wp_footer();

	// Google Analytics: change UA-XXXXX-Y to be your site's ID.  ?>
	<script>
		window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
		ga('create','UA-XXXXX-Y','auto');
		ga('set', 'anonymizeIp', true);
		ga('send','pageview')
	</script>
	<script src="https://www.google-analytics.com/analytics.js" async defer></script>

	</body>
</html>
