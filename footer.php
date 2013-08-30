			<footer>
				<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> <?php echo antispambot("mail@mail.com"); ?></p>
				<?php if( has_nav_menu( 'secondary-nav' ) ) {
					ground_secondary_nav();
					echo "<!-- End #menu-navigation-footer -->";
				} ?>
			</footer> <!-- End footer -->
		
		</div> <!-- End #container -->
		
		<?php wp_footer(); ?>

		<?php if ( !is_user_logged_in() && get_option( 'analytics_option' ) == false ) { ?>
			<script>
				(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
				function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
				e=o.createElement(i);r=o.getElementsByTagName(i)[0];
				e.src='//www.google-analytics.com/analytics.js';
				r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
				ga('create','<?php echo get_option( 'analytics_option' ); ?>');ga('send','pageview');
			</script>
		<?php } ?>

	</body>

</html>
