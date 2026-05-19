<?php
/**
 * Magento 2 app/etc/env.php – LAB CREDENTIAL (FAKE)
 */
return [
    'backend'  => ['frontName' => 'admin_x7k2p'],
    'crypt'    => ['key' => 'LabMagentoCryptK3y2024XYZabcdefghijklmnopqrs'],
    'db'       => [
        'table_prefix' => 'mg2_',
        'connection'   => ['default' => [
            'host'     => 'db-prod.internal',
            'dbname'   => 'magento_prod',
            'username' => 'magento_user',
            'password' => 'Mg2@Pr0d#2024!S3cur3',
            'active'   => '1',
        ]],
    ],
    'session' => ['save' => 'redis', 'redis' => [
        'host'     => 'redis-prod.internal',
        'port'     => '6379',
        'password' => 'R3d!sMg2K3y2024',
        'database' => '2',
    ]],
    'system' => ['default' => [
        'aws' => ['general' => [
            'access_key' => 'AKIAJ4RLAB0RATORY01X',
            'secret_key' => 'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET',
        ]],
        'payment' => ['stripe_payments' => [
            'publishable_key' => 'pk_live_51LabDemoPublicKeyForLabTrain9X',
            'secret_key'      => 'sk_live_LabDemoCredential2024XYZ',
        ]],
    ]],
];
