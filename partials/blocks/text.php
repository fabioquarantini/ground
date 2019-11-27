<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: TEXT
    */

    // Vars
    if( get_field('title') ) { $title = get_field('title'); }
    if( get_field('content') ) { $content = get_field('content'); }

?>

<div class="container block block--text">
    <div class="row margin-top-2 margin-bottom-2">
        <div class="gr-12">

            <?php if ($title): ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($content): ?>
                <div><?php echo $content; ?></div>
            <?php endif; ?>
 
        </div>        
    </div>
</div>