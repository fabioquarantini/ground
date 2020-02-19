<div class="container padding-left-0 padding-right-0 docs">
    <div class="row">
        <div class="gr-12">
            <div class="docs__tabs">
        
                <div class="docs__tab docs__tab--blocks">
                    <input class="js-scroll-update" type="radio" name="tabs" checked="checked" id="docs__tab1" />
                    <label class="js-cursor-hover" for="docs__tab1">Blocks</label>
                    <div id="docs__tab-content1" class="docs__content">
                        <?php get_template_part( 'partials/docs/blocks' ); ?>
                    </div>
                </div>
                
                <div class="docs__tab docs__tab--typography">
                    <input class="js-scroll-update" type="radio" name="tabs" id="docs__tab2" />
                    <label class="js-cursor-hover" for="docs__tab2">Typo</label>   
                    <div id="docs__tab-content2" class="docs__content">
                        <?php get_template_part( 'partials/docs/typography' ); ?>
                    </div>
                </div>

                <div class="docs__tab docs__tab--icons">
                    <input class="js-scroll-update" type="radio" name="tabs" id="docs__tab3" />                
                    <label class="js-cursor-hover" for="docs__tab3">Icons</label>   
                    <div id="docs__tab-content3" class="docs__content">
                        <?php get_template_part( 'partials/docs/icons' ); ?>
                    </div>
                </div>


                <div class="docs__tab docs__tab--colors">
                    <input class="js-scroll-update" type="radio" name="tabs" id="docs__tab4" />                
                    <label class="js-cursor-hover" for="docs__tab4">Colors</label>   
                    <div id="docs__tab-content4" class="docs__content">
                        <?php get_template_part( 'partials/docs/colors' ); ?>
                    </div>
                </div>

                <div class="docs__tab docs__tab--brand">
                    <input class="js-scroll-update" type="radio" name="tabs" id="docs__tab5" />                
                    <label class="js-cursor-hover" for="docs__tab5">Brand</label>   
                    <div id="docs__tab-content5" class="docs__content">
                        <?php get_template_part( 'partials/docs/brand' ); ?>
                    </div>
                </div>

                <div class="docs__tab docs__tab--buttons">
                    <input class="js-scroll-update" type="radio" name="tabs" id="docs__tab6" />                
                    <label class="js-cursor-hover" for="docs__tab6">Buttons</label>   
                    <div id="docs__tab-content6" class="docs__content">
                        <?php get_template_part( 'partials/docs/buttons' ); ?>
                    </div>
                </div>            

            </div>
        </div>
    </div>
</div>