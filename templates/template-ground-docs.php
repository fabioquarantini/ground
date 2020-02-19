<?php
/*
Template Name: Ground Docs
*/

get_template_part( 'partials/header' ); ?>

<div class="container container--fluid padding-left-0 padding-right-0 background-secondary">
    <div class="container padding-top-3@md padding-bottom-3@md padding-top-5 padding-bottom-2">
        <div class="row">
            <div class="gr-12 color-white">
                <h1>Documentation</h1>
                <h6><?php bloginfo( 'name' ); ?></h6>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'partials/docs/tabs' ); ?>
    
<?php get_template_part( 'partials/footer' ); ?>