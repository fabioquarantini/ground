<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: CAROUSEL
    */

    // Vars
    if( have_rows('repeater') ) {
        $repeater = get_field('repeater');
    }

?>

<?php if( $repeater ): ?>

<div class="container block">
    <div class="row">
        <div class="gr-12">

            <div class="carousel carousel--primary swiper-container js-carousel overflow-visible">
                <div class="swiper-wrapper js-cursor-drag">

                    <?php foreach($repeater as $row):

                        // Vars
                        $image = $row['image'];
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        $title = $row['title'];
                        $content = $row['content'];
                        $button = $row['button']; ?>
                                    
                        <div class="carousel__item swiper-slide">
                            <div class="carousel__media">
                                <?php echo wp_get_attachment_image( $image, $size, "", ["class" => "carousel__img cover"] ); ?>
                            </div>
                            <div class="carousel__body centered text-center">
                                <?php if ($title): ?>
                                    <h3 class="carousel__title"><?php echo $title; ?></h3>
                                <?php endif; ?>
                                <?php if ($content): ?>                        
                                    <p class="carousel__text"><?php echo $content; ?></p>
                                <?php endif; ?>
                                <?php if ($button): ?>                            
                                <a class="carousel__button button button--pill" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
            
                    <?php endforeach; ?>
                    
                </div> <!-- End .swiper-wrapper -->

                <div class="row position-relative row-align-middle margin-top-2@md margin-top-1 test">

                    <div class="gr-1 display-none display-inline-block@md">
                        <div class="carousel__navigation-container">
                            <div class="carousel__navigation carousel__navigation--prev swiper-button-prev js-slider-primary-navigation-prev js-cursor-left js-magnet"></div>
                            <div class="carousel__navigation carousel__navigation--next swiper-button-next js-slider-primary-navigation-next js-cursor-right js-magnet"></div>
                        </div>
                    </div>

                    <div class="gr-11@md gr-12 ">
                        <div class="carousel__pagination carousel__pagination--flat swiper-pagination js-slider-primary-pagination"></div>
                    </div>

                </div>

            </div> <!-- End .slider -->

        </div>        
    </div>
</div>

<?php endif; ?>