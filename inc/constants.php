<?php

/**
 * Constants
 *
 * @package Ground
 */

define( 'GROUND_SITE_URL', site_url() ); // Return http://www.site.com.
define( 'GROUND_TEMPLATE_URL', get_template_directory_uri() ); // Return http://www.site.com/wp-content/themes/themename.
define( 'GROUND_TEMPLATE_PATH', get_template_directory() ); // Return /home/user/public_html/wp-content/themes/themename.
define( 'GROUND_CHARSET', get_bloginfo( 'charset' ) ); // The "Encoding for pages and feeds" (set in Settings > Reading).

// THEME GENERAL SETTINGS
define( 'GROUND_COLOR_PRIMARY', get_field( 'color_primary', 'option' ) ? get_field( 'color_primary', 'option' ) : '#000000' );
define( 'GROUND_COLOR_SECONDARY', get_field( 'color_secondary', 'option' ) ? get_field( 'color_secondary', 'option' ) : '' );

define( 'GROUND_FONT_PRIMARY', get_field( 'font_primary', 'option' ) ? get_field( 'font_primary', 'option' ) : '' );
define( 'GROUND_FONT_PRIMARY_NAME', get_field( 'font_primary_name', 'option' ) ? get_field( 'font_primary_name', 'option' ) : '' );
define( 'GROUND_FONT_SECONDARY', get_field( 'font_secondary', 'option' ) ? get_field( 'font_secondary', 'option' ) : '' );
define( 'GROUND_FONT_SECONDARY_NAME', get_field( 'font_secondary_name', 'option' ) ? get_field( 'font_secondary_name', 'option' ) : '' );

define( 'GROUND_ROUNDED_THEME', get_field( 'rounded_theme', 'option' ) ? get_field( 'rounded_theme', 'option' ) : '' );

// THEME SETTINGS: COMPANY
define( 'GROUND_COMPANY_ADDRESS', get_field( 'company_address', 'option' ) ? get_field( 'company_address', 'option' ) : '' );
define( 'GROUND_COMPANY_ADDRESS_MAPS', get_field( 'company_address_maps', 'option' ) ? get_field( 'company_address_maps', 'option' ) : '' );
define( 'GROUND_COMPANY_PHONE_PRIMARY', get_field( 'company_phone_primary', 'option' ) ? get_field( 'company_phone_primary', 'option' ) : '' );
define( 'GROUND_COMPANY_PHONE_SECONDARY', get_field( 'company_phone_secondary', 'option' ) ? get_field( 'company_phone_secondary', 'option' ) : '' );
define( 'GROUND_COMPANY_EMAIL_PRIMARY', get_field( 'company_email_primary', 'option' ) ? get_field( 'company_email_primary', 'option' ) : '' );
define( 'GROUND_COMPANY_EMAIL_SECONDARY', get_field( 'company_email_secondary', 'option' ) ? get_field( 'company_email_secondary', 'option' ) : '' );
define( 'GROUND_COMPANY_FAX', get_field( 'company_fax', 'option' ) ? get_field( 'company_fax', 'option' ) : '' );

// THEME SETTINGS: SOCIALS
/**
 * TODO: Rename es GROUND_FACEBOOK_URL
 */
define( 'GROUND_SOCIAL_FACEBOOK', get_field( 'social_facebook', 'option' ) ? get_field( 'social_facebook', 'option' ) : '' );
define( 'GROUND_SOCIAL_TWITTER', get_field( 'social_twitter', 'option' ) ? get_field( 'social_twitter', 'option' ) : '' );
define( 'GROUND_SOCIAL_YOUTUBE', get_field( 'social_youtube', 'option' ) ? get_field( 'social_youtube', 'option' ) : '' );
define( 'GROUND_SOCIAL_FLICKR', get_field( 'social_flickr', 'option' ) ? get_field( 'social_flickr', 'option' ) : '' );
define( 'GROUND_SOCIAL_INSTAGRAM', get_field( 'social_instagram', 'option' ) ? get_field( 'social_instagram', 'option' ) : '' );
define( 'GROUND_SOCIAL_LINKEDIN', get_field( 'social_linkedin', 'option' ) ? get_field( 'social_linkedin', 'option' ) : '' );

// THEME SETTINGS: HEADER
/**
 * TODO: Rename es GROUND_LOGO_HEADER
 */
define( 'GROUND_HEADER_LOGO', get_field( 'header_logo', 'option' ) ? get_field( 'header_logo', 'option' ) : '' );

// THEME SETTINGS: FOOTER
/**
 * TODO: Rename es GROUND_LOGO_FOOTER
 */
define( 'GROUND_FOOTER_LOGO', get_field( 'footer_logo', 'option' ) ? get_field( 'footer_logo', 'option' ) : '' );
define( 'GROUND_FOOTER_COPYRIGHT', get_field( 'footer_copyright', 'option' ) ? get_field( 'footer_copyright', 'option' ) : '' );
