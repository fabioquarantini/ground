			</div> <!-- End .content -->

			<footer class="page-footer" role="contentinfo">
				<p class="page-footer__organization">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> <?php echo antispambot("mail@mail.com"); ?></p>

				<?php get_template_part( 'partials/navigation', 'secondary' ); ?>

			</footer> <!-- End .page-footer -->

		</div> <!-- End .container -->

		<?php wp_footer(); ?>

		<?php if ( !is_user_logged_in() ) {
			// Google Analytics: change UA-XXXXX-X to be your site's ID.  ?>
			<script>
				(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
				function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
				e=o.createElement(i);r=o.getElementsByTagName(i)[0];
				e.src='https://www.google-analytics.com/analytics.js';
				r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
				ga('create','UA-XXXXX-X','auto');ga('send','pageview');
			</script>
		<?php } ?>

	</body>

</html>