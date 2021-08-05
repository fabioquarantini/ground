<div class="relative overflow-hidden py-12 mb-16 bg-gray-100 transform -translate-x-2/4 w-screen ml-1/2 lg:py-28 lg:rounded-theme lg:ml-0 lg:translate-x-0 lg:w-auto">

    <?php
    if (is_product_category()) {
        $cat          = get_queried_object();
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        if ($thumbnail_id) { ?>
            <img class="absolute inset-0 object-cover w-full h-full" loading="lazy" src="<?php echo wp_get_attachment_image_src($thumbnail_id, 'medium_large')[0]; ?>">
            <!-- <div class="absolute inset-0 bg-gradient-to-l from-black to-white opacity-90" aria-hidden="true"></div> -->
    <?php }
    } ?>

    <div class="relative lg:px-0 px-6">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-full lg:col-start-2 lg:col-span-3">
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                    <h1 class="color-black text-3xl font-bold" data-scroll data-scroll-animation="fade-in-down-staggered"><?php woocommerce_page_title(); ?></h1>
                <?php endif; ?>
            </div>
            <div class="col-span-full text-gray-500 text-base lg:col-span-5">
                <?php do_action('woocommerce_archive_description'); ?>
            </div>
        </div>
    </div>

</div>