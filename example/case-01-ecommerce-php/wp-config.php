<?php
/**
 * WordPress + WooCommerce – LAB CREDENTIAL (FAKE)
 * Setup: WP Offload Media (S3) + WooCommerce Stripe + Mailchimp
 */

define( 'DB_NAME',     'wordpress_prod' );
define( 'DB_USER',     'wp_dbuser' );
define( 'DB_PASSWORD', 'Wp@Pr0dDB#2024!Secure' );
define( 'DB_HOST',     'db-prod.internal:3306' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

define( 'AUTH_KEY',         'tr!N@xQ2#mP8vL5kJ7wY1oD4fH6gA9sZ3cE0bU' );
define( 'SECURE_AUTH_KEY',  'kL9mN2pQ5rT8vX1yA4dF7hJ0wB3eC6gI5jK2nM' );
define( 'LOGGED_IN_KEY',    'xY3zA6bD9eG2hJ5kM8nP1qS4tV7wY0zA3bC6dE' );
define( 'NONCE_KEY',        'pQ2sT5vX8yA1dF4gI7jL0nO3rU6wZ9bE2hK5mN' );
define( 'AUTH_SALT',        'gH4jL7mO0pR3sV6wY9zA2bE5hK8nQ1tW4xA7dF' );
define( 'SECURE_AUTH_SALT', 'dF1gI4jM7nP0qT3vX6yB9eH2kN5pS8uW1zA4cG' );
define( 'LOGGED_IN_SALT',   'bC9eH2kM5nQ8rT1vX4yA7dG0jL3pS6uW9zA2bE' );
define( 'NONCE_SALT',       'zA3bE6hK9mP2sV5wX8yD1gJ4nO7rU0xA3cF6iL' );

$table_prefix = 'wp_x7k2_';

// WP Offload Media – S3
define( 'AS3CF_SETTINGS', serialize( [
    'provider'          => 'aws',
    'access-key-id'     => 'AKIAJ4RLAB0RATORY01X',
    'secret-access-key' => 'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET',
    'bucket'            => 'mywordpress-prod-uploads',
    'region'            => 'ap-southeast-1',
] ) );

// WooCommerce Stripe
define( 'WC_STRIPE_SECRET_KEY',      'sk_live_LabDemoCredential2024XYZ' );
define( 'WC_STRIPE_PUBLISHABLE_KEY', 'pk_live_51LabDemoPublicKeyForLabTrain9X' );
define( 'WC_STRIPE_WEBHOOK_SECRET',  'whsec_LabDemoWebhookSecret1234ABCD' );

// WooCommerce Midtrans
define( 'MIDTRANS_SERVER_KEY', 'SB-Mid-server-LabDemoMidtransServerKey2024' );
define( 'MIDTRANS_CLIENT_KEY', 'SB-Mid-client-LabDemoMidtransClientKey24' );

// Mailchimp
define( 'MAILCHIMP_API_KEY', 'a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6-us21' );

define( 'WP_DEBUG', false );
define( 'DISALLOW_FILE_EDIT', true );
define( 'FORCE_SSL_ADMIN', true );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
