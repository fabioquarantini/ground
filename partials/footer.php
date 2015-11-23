			</div> <!-- End .content -->

			<footer class="page-footer" role="contentinfo">
				<p class="page-footer__organization">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> <?php echo antispambot("mail@mail.com"); ?></p>

				<?php get_template_part( 'partials/navigation', 'secondary' ); ?>

			</footer> <!-- End .page-footer -->

		</div> <!-- End .container -->

		<?php wp_footer();

		if ( !is_user_logged_in() ) {
			// Google Analytics: change UA-XXXXXXXX-X to be your site's ID.  ?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', 'UA-XXXXXXXX-X', 'auto');
				ga('set', 'anonymizeIp', true);
				ga('send', 'pageview');
			</script>
		<?php } ?>

	</body>

</html>
