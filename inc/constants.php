<?php

/**
 * Constants
 *
 * @package Ground
 */

define( 'GROUND_VERSION', '2.0.0' );
define( 'GROUND_SITE_URL', site_url() ); // Return http://www.site.com.
define( 'GROUND_TEMPLATE_URL', get_template_directory_uri() ); // Return http://www.site.com/wp-content/themes/themename.
define( 'GROUND_TEMPLATE_PATH', get_template_directory() ); // Return /home/user/public_html/wp-content/themes/themename.
define( 'GROUND_CHARSET', get_bloginfo( 'charset' ) ); // The "Encoding for pages and feeds" (set in Settings > Reading).

// Colors.
define( 'GROUND_COLOR_PRIMARY', get_field( 'color_primary', 'option' ) ? get_field( 'color_primary', 'option' ) : '#6366F1' );
define( 'GROUND_COLOR_SECONDARY', get_field( 'color_secondary', 'option' ) ? get_field( 'color_secondary', 'option' ) : '#14B8A6' );

// Fonts.
define( 'GROUND_FONT_PRIMARY', get_field( 'font_primary', 'option' ) ? get_field( 'font_primary', 'option' ) : '' );
define( 'GROUND_FONT_PRIMARY_NAME', get_field( 'font_primary_name', 'option' ) ? get_field( 'font_primary_name', 'option' ) : '' );
define( 'GROUND_FONT_SECONDARY', get_field( 'font_secondary', 'option' ) ? get_field( 'font_secondary', 'option' ) : '' );
define( 'GROUND_FONT_SECONDARY_NAME', get_field( 'font_secondary_name', 'option' ) ? get_field( 'font_secondary_name', 'option' ) : '' );

// Styles.
define( 'GROUND_ROUNDED_THEME', get_field( 'rounded_theme', 'option' ) ? get_field( 'rounded_theme', 'option' ) : '0' );

// Company.
/**
 * TODO: Lat lang
 */
define( 'GROUND_COMPANY_ADDRESS', get_field( 'company_address', 'option' ) ? get_field( 'company_address', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS_MAPS', get_field( 'company_address_maps', 'option' ) ? get_field( 'company_address_maps', 'option' ) : '' );
define( 'GROUND_COMPANY_PHONE_PRIMARY', get_field( 'company_phone_primary', 'option' ) ? get_field( 'company_phone_primary', 'option' ) : '' );
define( 'GROUND_COMPANY_PHONE_SECONDARY', get_field( 'company_phone_secondary', 'option' ) ? get_field( 'company_phone_secondary', 'option' ) : '' );
define( 'GROUND_COMPANY_EMAIL_PRIMARY', get_field( 'company_email_primary', 'option' ) ? get_field( 'company_email_primary', 'option' ) : '' );
define( 'GROUND_COMPANY_EMAIL_SECONDARY', get_field( 'company_email_secondary', 'option' ) ? get_field( 'company_email_secondary', 'option' ) : '' );
define( 'GROUND_COMPANY_FAX', get_field( 'company_fax', 'option' ) ? get_field( 'company_fax', 'option' ) : '' );

/**
 * TODO: Rename es GROUND_FACEBOOK_URL
 */
// Socials.
define( 'GROUND_SOCIAL_FACEBOOK', get_field( 'social_facebook', 'option' ) ? get_field( 'social_facebook', 'option' ) : '' );
define( 'GROUND_SOCIAL_TWITTER', get_field( 'social_twitter', 'option' ) ? get_field( 'social_twitter', 'option' ) : '' );
define( 'GROUND_SOCIAL_YOUTUBE', get_field( 'social_youtube', 'option' ) ? get_field( 'social_youtube', 'option' ) : '' );
define( 'GROUND_SOCIAL_FLICKR', get_field( 'social_flickr', 'option' ) ? get_field( 'social_flickr', 'option' ) : '' );
define( 'GROUND_SOCIAL_INSTAGRAM', get_field( 'social_instagram', 'option' ) ? get_field( 'social_instagram', 'option' ) : '' );
define( 'GROUND_SOCIAL_LINKEDIN', get_field( 'social_linkedin', 'option' ) ? get_field( 'social_linkedin', 'option' ) : '' );

// Footer.
define( 'GROUND_FOOTER_COPYRIGHT', get_field( 'footer_copyright', 'option' ) ? get_field( 'footer_copyright', 'option' ) : '' );

// Logo.
define( 'GROUND_LOGO_PRIMARY_PATH', get_field( 'logo_primary_path', 'option' ) ? get_field( 'logo_primary', 'option' ) : GROUND_TEMPLATE_PATH . '/img/logo.svg' );
define( 'GROUND_LOGO_SECONDARY_PATH', get_field( 'logo_secondary_path', 'option' ) ? get_field( 'logo_secondary_path', 'option' ) : GROUND_TEMPLATE_PATH . '/img/logo.svg' );

// No image.
define( 'GROUND_NO_IMAGE_PATH', get_field( 'no_image_path', 'option' ) ? get_field( 'no_image_path', 'option' ) : GROUND_TEMPLATE_URL . '/img/no-image.svg' );
