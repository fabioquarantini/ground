<?php
/*
Template Name: Ground Docs
*/

get_template_part( 'partials/header' ); ?>

<div class="container container--fluid background-secondary margin-bottom-4">
    <div class="container padding-5@md padding-1">
        <div class="row">
            <div class="gr-12 color-white">
                <h1>Documentation</h1>
                <h6>Gutemberg Blocks</h6>
            </div>
        </div>
    </div>
</div>

<?php
$dir = TEMPLATE_PATH . '/partials/blocks';
$files = scandir($dir);
foreach ( $files as $file ) :
    if ( $file !== '..' && $file !== '.') : ?>

        <div class="container">
            <div class="row">
                <div class="gr-12">  
                    <h3>Block: <span class="color-secondary text-uppercase"><?php echo strstr($file, '.', true); ?></span></h3>                              
                </div>
            </div>
        </div>

        <div class="container">
            <?php include( $dir . "/" . $file); ?>
        </div>
    
    <?php endif; ?>
<?php endforeach; ?>

<?php get_template_part( 'partials/footer' ); ?>