<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: CAROUSEL
    */
    
?>

<?php if( have_rows('repeater') ): ?>

<div class="container block block--text">
    <div class="row margin-top-5 margin-bottom-5">
        <div class="gr-12">

            <div class="slider slider--gallery slider--cursor-navigation swiper-container overflow-visible js-slider-gallery">
                <div class="swiper-wrapper">

                <?php while ( have_rows('repeater') ) : the_row();

                        $image = get_sub_field('image');    

                    ?>

                    <div class="slider__item swiper-slide">
                        <div data-swiper-parallax="50%">
                            <div class="position-relative">
                                <?php if ($image): ?>        
                                    <img class="slider__img cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php  endwhile; ?>

                </div> <!-- End .swiper-wrapper -->

                <!-- <div class="slider__pagination swiper-pagination js-slider-primary-pagination"></div> -->
                <div class="slider__navigation slider__navigation--prev swiper-button-prev js-slider-primary-navigation-prev js-cursor-left"></div>
                <div class="slider__navigation slider__navigation--next swiper-button-next js-slider-primary-navigation-next js-cursor-right"></div>
            </div> <!-- End .slider -->
        
        </div>        
    </div>
</div>

<?php endif; ?>