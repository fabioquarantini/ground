<?php

/**
 * ACF Constants
 *
 * @package Ground
 */


// Dark Mode.
define( 'GROUND_DARK_MODE', get_field( 'dark_mode', 'option' ) ? get_field( 'dark_mode', 'option' ) : '#6366F1' );

// Colors.
define( 'GROUND_COLOR_PRIMARY', get_field( 'color_primary', 'option' ) ? get_field( 'color_primary', 'option' ) : '#6366F1' );
define( 'GROUND_COLOR_SECONDARY', get_field( 'color_secondary', 'option' ) ? get_field( 'color_secondary', 'option' ) : '#14B8A6' );
define( 'GROUND_COLOR_BODY', get_field( 'color_body', 'option' ) ? get_field( 'color_body', 'option' ) : '#FFFFFF' );
define( 'GROUND_COLOR_TYPO', get_field( 'color_typo', 'option' ) ? get_field( 'color_typo', 'option' ) : '#000000' );

// Fonts.
define( 'GROUND_FONT_SOURCE_PRIMARY', get_field( 'font_source_primary', 'option' ) ? get_field( 'font_source_primary', 'option' ) : '' );
define( 'GROUND_FONT_FAMILY_PRIMARY', get_field( 'font_family_primary', 'option' ) ? get_field( 'font_family_primary', 'option' ) : '' );
define( 'GROUND_FONT_SOURCE_SECONDARY', get_field( 'font_source_secondary', 'option' ) ? get_field( 'font_source_secondary', 'option' ) : '' );
define( 'GROUND_FONT_FAMILY_SECONDARY', get_field( 'font_family_secondary', 'option' ) ? get_field( 'font_family_secondary', 'option' ) : '' );

// Styles.
define( 'GROUND_ROUNDED_THEME', get_field( 'rounded_theme', 'option' ) ? get_field( 'rounded_theme', 'option' ) : '0' );

// Company.
define( 'GROUND_COMPANY_NAME', get_field( 'company_name', 'option' ) ? get_field( 'company_name', 'option' ) : '' );
define( 'GROUND_COMPANY_PIVA', get_field( 'company_piva', 'option' ) ? get_field( 'company_piva', 'option' ) : '' );
define( 'GROUND_COMPANY_CF', get_field( 'company_cf', 'option' ) ? get_field( 'company_cf', 'option' ) : '' );
define( 'GROUND_COMPANY_CITY', get_field( 'company_city', 'option' ) ? get_field( 'company_city', 'option' ) : '' );
define( 'GROUND_COMPANY_PROVINCE', get_field( 'company_province', 'option' ) ? get_field( 'company_province', 'option' ) : '' );
define( 'GROUND_COMPANY_COUNTRY', get_field( 'company_country', 'option' ) ? get_field( 'company_country', 'option' ) : '' );
define( 'GROUND_COMPANY_CAP', get_field( 'company_cap', 'option' ) ? get_field( 'company_cap', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS', get_field( 'company_address', 'option' ) ? get_field( 'company_address', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS_URL', get_field( 'company_address_url', 'option' ) ? get_field( 'company_address_url', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS_LATITUDE', get_field( 'company_address_latitude', 'option' ) ? get_field( 'company_address_latitude', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS_LONGITUDE', get_field( 'company_address_longitude', 'option' ) ? get_field( 'company_address_longitude', 'option' ) : '' );
define( 'GROUND_COMPANY_PHONE', get_field( 'company_phone', 'option' ) ? get_field( 'company_phone', 'option' ) : '' );
define( 'GROUND_COMPANY_WHATSAPP', get_field( 'company_whatsapp', 'option' ) ? get_field( 'company_whatsapp', 'option' ) : '' );
define( 'GROUND_COMPANY_FAX', get_field( 'company_fax', 'option' ) ? get_field( 'company_fax', 'option' ) : '' );
define( 'GROUND_COMPANY_EMAIL', get_field( 'company_email', 'option' ) ? get_field( 'company_email', 'option' ) : '' );
define( 'GROUND_COMPANY_PEC', get_field( 'company_pec', 'option' ) ? get_field( 'company_pec', 'option' ) : '' );
define( 'GROUND_COMPANY_OPENING_HOURS', get_field( 'company_opening_hours', 'option' ) ? get_field( 'company_opening_hours', 'option' ) : '' );
define( 'GROUND_COMPANY_CLOSING_TIME', get_field( 'company_closing time', 'option' ) ? get_field( 'company_closing time', 'option' ) : '' );


// Socials.
define( 'GROUND_SOCIAL_LINKEDIN_URL', get_field( 'social_linkedin_url', 'option' ) ? get_field( 'social_linkedin_url', 'option' ) : '' );
define( 'GROUND_SOCIAL_FACEBOOK_URL', get_field( 'social_facebook_url', 'option' ) ? get_field( 'social_facebook_url', 'option' ) : '' );
define( 'GROUND_SOCIAL_TWITTER_URL', get_field( 'social_twitter_url', 'option' ) ? get_field( 'social_twitter_url', 'option' ) : '' );
define( 'GROUND_SOCIAL_INSTAGRAM_URL', get_field( 'social_instagram_url', 'option' ) ? get_field( 'social_instagram_url', 'option' ) : '' );
define( 'GROUND_SOCIAL_YOUTUBE_URL', get_field( 'social_youtube_url', 'option' ) ? get_field( 'social_youtube_url', 'option' ) : '' );


// Header.
define( 'GROUND_HEADER_TEXT', get_field( 'header_text', 'option' ) ? get_field( 'header_text', 'option' ) : '' );
define( 'GROUND_HEADER_TYPE', get_field( 'header_type', 'option' ) ? get_field( 'header_type', 'option' ) : '' );
define( 'GROUND_HEADER_ALL_PRODUCTS', get_field( 'header_all_products', 'option' ) ? get_field( 'header_all_products', 'option' ) : '' );

// Logos.
define( 'GROUND_LOGO_URL_PRIMARY', get_field( 'logo_url_primary', 'option' ) ? get_field( 'logo_url_primary', 'option' ) : '' );
define( 'GROUND_LOGO_SOURCE_PRIMARY', get_field( 'logo_source_primary', 'option' ) ? get_field( 'logo_source_primary', 'option' ) : '' );
define( 'GROUND_LOGO_TYPE_PRIMARY', get_field( 'logo_type_primary', 'option' ) ? get_field( 'logo_type_primary', 'option' ) : '' );
define( 'GROUND_LOGO_URL_SECONDARY', get_field( 'logo_url_secondary', 'option' ) ? get_field( 'logo_url_secondary', 'option' ) : '' );
define( 'GROUND_LOGO_SOURCE_SECONDARY', get_field( 'logo_source_secondary', 'option' ) ? get_field( 'logo_source_secondary', 'option' ) : '' );
define( 'GROUND_LOGO_TYPE_SECONDARY', get_field( 'logo_type_secondary', 'option' ) ? get_field( 'logo_type_secondary', 'option' ) : '' );

// No image.
define( 'GROUND_NO_IMAGE_URL', get_field( 'no_image_url', 'option' ) ? get_field( 'no_image_url', 'option' ) : GROUND_TEMPLATE_URL . '/img/no-image.svg' );


// Shop.
define( 'GROUND_SHOP_ADD_TO_CART', get_field( 'shop_add_to_cart', 'option' ) ? get_field( 'shop_add_to_cart', 'option' ) : '' );
define( 'GROUND_SHOP_PAYMENT', get_field( 'shop_payment', 'option' ) ? get_field( 'shop_payment', 'option' ) : '' );
// define( 'GROUND_SHOP_PRODUCT_PAGE_RELATION', get_field( 'shop_product_page_relation', 'option' ) ? get_field( 'shop_product_page_relation', 'option' ) : '' );
