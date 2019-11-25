<?php

    /**
    * REGISTER: Register this here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: IMAGE
    */

    $image = get_field('image');
    $size = 'large'; 
    
    // Default Value
    if( !$image ) { $image['url'] = TEMPLATE_URL.'/img/sample-1.jpg'; }     
    
?>

<div class="container block block--image">
    <div class="row">
        <div class="gr-12">

            <?php if ($image): ?>        
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            
        </div>        
    </div>
</div>
