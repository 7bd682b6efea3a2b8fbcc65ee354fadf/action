<?php
/**
 * Drupal 10 settings.php – LAB CREDENTIAL (FAKE)
 */

$databases['default']['default'] = [
    'database' => 'drupal_prod',
    'username' => 'drupal_user',
    'password' => 'Drup4l@Pr0d#2024!Secure',
    'host'     => 'db-prod.internal',
    'port'     => '3306',
    'driver'   => 'mysql',
    'prefix'   => 'drpl_',
];

$settings['hash_salt'] = 'LabDrupalHashS4lt2024XYZabcdefghijklmnopqrstuvwxyz0123456789AB';

$settings['redis.connection']['host']     = 'redis-prod.internal';
$settings['redis.connection']['password'] = 'R3d!sDrup4lK3y2024';
$settings['redis.connection']['port']     = 6379;

// AWS S3FS module
$settings['s3fs.access_key'] = 'AKIAJ4RLAB0RATORY01X';
$settings['s3fs.secret_key'] = 'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET';
$settings['s3fs.bucket']     = 'mydrupal-prod-files';
$settings['s3fs.region']     = 'ap-southeast-1';

$config['sendgrid_integration.settings']['apikey'] = 'SG.LabDemoSendGridKeyForLabTraining.ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmn';

$settings['trusted_host_patterns'] = ['^corporate\.internal$'];
$settings['file_private_path']      = '/var/www/private';
