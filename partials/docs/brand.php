<div class="container docs__header">
    <div class="row">
        <div class="gr-12">
            <div class="docs__chapter"></div>
            <div class="docs__title">Brand identity</div>
        </div>
    </div>
</div>

<div class="container margin-top-4 margin-bottom-5">
    <div class="row">
        
        <div class="gr-3@md gr-12 margin-bottom-2">
            <h6>Logo</h6>
		    <?php echo file_get_contents(TEMPLATE_PATH . "/img/logo.svg"); ?>
        </div>

        <div class="gr-3@md gr-12 margin-bottom-2">
            <h6>Favicon</h6>
			<img src="<?php echo TEMPLATE_URL .'/img/favicon.png' ?>">        
        </div>

        <div class="gr-3@md gr-12 margin-bottom-2">
            <h6>Icon</h6>
			<img src="<?php echo TEMPLATE_URL .'/img/icon.png' ?>">        
        </div>

        <div class="gr-3@md gr-12 margin-bottom-2">
            <h6>No Image</h6>
			<img src="<?php echo TEMPLATE_URL .'/img/no-image.svg' ?>">        
        </div>

    </div>
</div>