<?php

    /**
    * REGISTER: Register block here: "inc/blocks.php"
    * RENDER: Render block here.
    * BLOCK: Name: TEST
    */

    $title = get_field('title');
    $content = get_field('content');  

    // Default Value
    if( !$title ) { $title = 'Titolo segnaposto'; } 
    if( !$content ) { $content = 'Content segnaposto'; } 
    
?>

<div class="container block block--text">
    <div class="row">
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
