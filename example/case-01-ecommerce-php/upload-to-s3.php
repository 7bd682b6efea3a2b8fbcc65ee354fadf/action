<?php
/**
 * Legacy upload script – LAB: hardcoded AWS credential in source (gitleaks target)
 * Common pattern: developer hardcoded creds before dotenv was adopted
 */

// TODO: move to env vars (never done)
$s3Client = new Aws\S3\S3Client([
    'version'     => 'latest',
    'region'      => 'ap-southeast-1',
    'credentials' => [
        'key'    => 'AKIAJ4RLAB0RATORY01X',
        'secret' => 'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET',
    ],
]);

$db = new mysqli('db-prod.internal', 'toko_user', 'Pr0d@T0k0#S3cur3!2024', 'tokoonline_prod');
