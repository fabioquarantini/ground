<?php

    /**
    * REGISTER: Register this here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: IMAGE
    */

    // Vars
    if( get_field('image') ) { $image = get_field('image'); }
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    
?>

<div class="container container--fluid block block--image">
    <div class="row">
        <div class="gr-12">

            <?php if ($image): ?>
                <?php echo wp_get_attachment_image( $image, $size, "", ["class" => "full-width"] ); ?>
            <?php endif; ?>        
            
        </div>        
    </div>
</div>
