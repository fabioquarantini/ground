<footer class="footer">
	<div class="container">

		<div class="footer__row">
			<div class="row">
				<div class="footer__column text-center text-left@md gr-6@md">
					<?php get_template_part( 'partials/navigation', 'secondary' ); ?>
				</div>

				<div class="footer__column text-center text-right@md gr-6@md">
					{{Language switcher}}
				</div>
			</div>
		</div> <!-- End .footer__row -->

		<div class="footer__row">
			<div class="row">
				<div class="footer__column gr-11@md">
					<div class="footer__content text-center text-left@xl">
						<span class="footer__item">Organization name</span> -
						<span class="footer__item">P.IVA 00000000000</span> -
						<span class="footer__item">Via example 1, 25125 Brescia - Italy</span> -
						<span class="footer__item">Tel:<a class="footer__link" href="tel:+390300000000" >+39 030 0000000</a> </span> |
						<span class="footer__item">E-mail: <a class="footer__link" href="mailto:<?php echo antispambot( 'example@mail.com' ); ?>" ><?php echo antispambot( 'example@mail.com' ); ?></a> </span>
					</div>
				</div>
				<div class="footer__column text-center text-right@xl gr-1@md">
					<div class="social">
						<a class="social__link" href="#">
							<?php ground_icon( 'instagram', 'social__icon' ); ?>
						</a>
						<a class="social__link" href="#">
							<?php ground_icon( 'facebook', 'social__icon' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div> <!-- End .footer__row -->

	</div> <!-- End .container -->
</footer> <!-- End .footer -->
