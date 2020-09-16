<?php

/*  == REST ==================================================================

        1 - Add custom field (REST editable)

    ==========================================================================  */


/*  ==========================================================================
	1 - Add custom field (REST editable)
	==========================================================================  */

    // Show custom field
    function woocommerce_product_example_of_custom_field_fields() {

        echo '<div class="product_custom_field options_group">';
            woocommerce_wp_text_input(
                array(
                    'id'          => 'example_of_custom_field',
                    'label'       => __( 'Example of custom field', 'woocommerce' ),
                    'placeholder' => '',
                    'desc_tip'    => 'false',
                    //'description' => __( 'Description', 'woocommerce' )
                )
            );
        echo '</div>';

    }

    add_action('woocommerce_product_options_shipping', 'woocommerce_product_example_of_custom_field_fields');


    // Save field
    function woocommerce_product_example_of_custom_field_fields_save($post_id) {

        $woocommerce_example_of_custom_field = $_POST['example_of_custom_field'];
        if( !empty( $woocommerce_example_of_custom_field ) ) {
            update_post_meta( $post_id, 'example_of_custom_field', esc_attr( $woocommerce_example_of_custom_field ) );
        }

    }

    add_action('woocommerce_process_product_meta', 'woocommerce_product_example_of_custom_field_fields_save');


    // REST field
    add_action( 'rest_api_init', function() {

        register_rest_field( 'product',
            'example_of_custom_field',
            array(
                'get_callback' => function( $object, $field_name, $request ) {
                    return get_post_meta($object['id'], 'example_of_custom_field', true);
                },
                'update_callback' => function( $value, $object, $field_name ) {
                    update_post_meta($object->id, 'example_of_custom_field', esc_attr($value));
                },
                'schema' => array(
                    'description'	=> __( 'Example of custom field', 'woocommerce' ),
                    'type'			=> 'string',
                    'context'		=> array( 'view', 'edit' )
                ),
            )
        );

    });