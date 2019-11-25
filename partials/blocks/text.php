<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: TEXT
    */

    $title = get_field('title');
    $content = get_field('content');  

    // Default Value
    if( !$title ) { $title = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'; } 
    if( !$content ) { $content = 'Donec vitae erat ipsum. Donec tempus neque a mauris blandit tempus. Donec eros velit, ornare at tempor at, pharetra pharetra augue. '; } 
    
?>

<div class="container block block--text">
    <div class="row margin-top-5 margin-bottom-5">
        <div class="gr-12">

            <?php if ($title):  ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($content): ?>
                <div><?php echo $content; ?></div>
            <?php endif; ?>
        
        </div>        
    </div>
</div>
