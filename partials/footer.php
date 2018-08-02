			</main>

		</div> <!-- End .container -->

		<footer class="footer">
			<div class="container">

				<div class="footer__row clear-fix">
					<div class="footer__column text-center text-left@md gr-6@md">
						<?php get_template_part( 'partials/navigation', 'secondary' ); ?>
					</div>

					<div class="footer__column text-center text-right@md gr-6@md">
						{{Language switcher}}
					</div>
				</div> <!-- End .footer__row -->

				<div class="footer__row clear-fix">
					<div class="footer__column gr-11@md">
						<div class="footer__content text-center text-left@xl">
							<span class="footer__item">Organization name</span> -
							<span class="footer__item">P.IVA 00000000000</span> -
							<span class="footer__item">Via example 1, 25125 Brescia - Italy</span> -
							<span class="footer__item">Tel:<a class="footer__link" href="tel:+390300000000" >+39 030 0000000</a> </span> |
							<span class="footer__item">E-mail: <a class="footer__link" href="mailto:<?php echo antispambot("example@mail.com"); ?>" ><?php echo antispambot("example@mail.com"); ?></a> </span>
						</div>
					</div>
					<div class="footer__column text-center text-right@xl gr-1@md">
						{{Social}}
					</div>
				</div> <!-- End .footer__row -->

			</div> <!-- End .container -->
		</footer> <!-- End .footer -->

		<?php get_template_part( 'partials/loader', 'page' ); ?>

		<?php wp_footer();

		// Google Analytics: change UA-XXXXXXXX-X to be your site's ID.  ?>
		<script>
			window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
			ga('create','UA-XXXXX-Y','auto');
			ga('set', 'anonymizeIp', true);
			ga('send','pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>

	</body>
</html>
