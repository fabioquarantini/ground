<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: TEXT IMAGE
    */

    // Vars
    if( get_field('title') ) { $title = get_field('title'); }
    if( get_field('content') ) { $content = get_field('content'); }
    if( get_field('button') ) { $button = get_field('button'); }
    if( get_field('image') ) { $image = get_field('image'); }
    $size = 'full'; // (thumbnail, medium, large, full or custom size)

?>

<div class="container block block--text position-relative">
    <div class="row">
        <div class="gr-6@md gr-12">
            <div class="ratio-1-1">            
                <?php if ($image): ?>
                    <?php echo wp_get_attachment_image( $image, $size, "", ["class" => "cover"] ); ?>
                <?php endif; ?>   
            </div>
        </div> 

        <div class="gr-6@md gr-12">

            <div class="centered-vertical@md">

                <?php if ($title): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div><?php echo $content; ?></div>
                <?php endif; ?>

                <?php if ($button): ?>                            
                    <a class="button button--pill margin-top-1" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                <?php endif; ?>

            </div>

        </div> 
       
    </div>
</div>