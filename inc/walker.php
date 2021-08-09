<?php


	class Ground_Wp_Nav_Menu_Bem extends Walker_Nav_Menu {


	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

			$custom_class = $item->classes[0];


			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$classes[] = $custom_class;

			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$item_classes = $item->classes;
			//var_dump($item);

			$image = get_field('image', $item);
			$button = get_field('button', $item);

			$card ="";
			?>

			<?php ob_start();
			?>
				<li class="navigation__item--image">
					<?php if($button) : ?>
					<a class="no-underline" href="<?php echo $button['url']; ?>">
					<?php endif; ?>
						<figure class="media aspect-w-16 aspect-h-9">
							<img class="object-cover w-full"
									srcset="<?php echo $image['sizes']['1-1-small'] ?> 480w,
											<?php echo $image['sizes']['1-1-medium'] ?> 900w,
											<?php echo $image['sizes']['16-9-large'] ?> 1200w"
									sizes="(min-width: 1200px) 1200px,
											(min-width: 768px) 900px,
											100vh"
									src="<?php echo $image['sizes']['16-9-large'] ?>"
									alt=""
									loading="lazy">
						</figure>
					<?php if($button) : ?>
						<h2 class="text-lg lg:text-xl py-6"> <?php echo $button['title']; ?> </h2>
					</a>
					<?php endif; ?>
				</li>

			<?php $card = ob_get_clean();?>

			<?php

			$output .= $indent . '<li' . $class_names .'>';


			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';


			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );


			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );



			$item_output = $args->before;
			$item_output .= '<a class="navigation__link" '. $attributes .'>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			$item_output .= $image ? ('<ul class="navigation__image list-none">' . $card .'</ul>') : null;


			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}


}
