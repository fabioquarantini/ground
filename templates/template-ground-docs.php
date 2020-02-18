<?php
/*
Template Name: Ground Docs
*/

get_template_part( 'partials/header' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container container--fluid background-secondary margin-bottom-4">
        <div class="container padding-5@md padding-1">
            <div class="row">
                <div class="gr-12 color-white">
                    <h1>Documentation</h1>
                    <h6><?php bloginfo( 'name' ); ?></h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Default Value GUTEMBERG BLOCKS -->
    <?php
    
    $defaultImages = get_field('gallery', 'option');

    if ($defaultImages):

        $title = 'Title Placeholder';
        $content = 'Content Placeholder';
        $image = $defaultImages[0];
        $gallery = $defaultImages;
        $repeater = array(
            array( "image" => $defaultImages[0], "title" => $title, "content" => $content ),
            array( "image" => $defaultImages[1], "title" => $title, "content" => $content ),
            array( "image" => $defaultImages[2], "title" => $title, "content" => $content ),
            array( "image" => $defaultImages[3], "title" => $title, "content" => $content ),
        );

        $dir = TEMPLATE_PATH . '/partials/blocks';
        $files = scandir($dir);
        foreach ( $files as $file ) :
            if ( $file !== '..' && $file !== '.') : ?>

                <div class="container">
                    <div class="row">
                        <div class="gr-12">  
                            <h3>Block:  <span class="color-secondary text-uppercase"><?php echo strstr($file, '.', true); ?></span></h3>                              
                        </div>
                    </div>
                </div>

                <div class="container margin-bottom-3">
                    <?php include( $dir . "/" . $file); ?>
                </div>
            
            <?php endif;

        endforeach;

    else: ?>

    <div class="container container--fluid margin-bottom-4">
        <div class="container padding-5@md padding-1">
            <div class="row">
                <div class="gr-12">
                    <h1>Images not found</h1>
                    <h6>Upload the default images to create the documentation page</h6>
                    <a class="button" target="_blank" href="<?php echo admin_url( 'admin.php?page=acf-options', 'http' ); ?>">UPLOAD</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php endif;

endwhile; endif;

get_template_part( 'partials/footer' ); ?>