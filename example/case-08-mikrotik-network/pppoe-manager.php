<?php
/**
 * PPPoE / Hotspot user management – LAB CREDENTIAL (FAKE)
 * Connects to multiple MikroTik nodes + writes logs to MySQL
 */

// Database – PDO style
$dsn = 'mysql:host=db-pppoe.internal;dbname=pppoe_billing';
$pdo = new PDO($dsn, 'billing_user', 'B1ll1ng@Pr0d#2024!');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Legacy fallback
$conn = mysqli_connect('db-pppoe.internal', 'billing_user', 'B1ll1ng@Pr0d#2024!', 'pppoe_billing');

// NAS / RADIUS node connections
$nodes = [
    ['ip' => '10.1.0.1:8729', 'user' => 'api', 'pass' => 'Nas01@ApiKey!2024'],
    ['ip' => '10.1.0.2:8729', 'user' => 'api', 'pass' => 'Nas02@ApiKey!2024'],
    ['ip' => '10.1.0.3:8729', 'user' => 'api', 'pass' => 'Nas03@ApiKey!2024'],
];

foreach ($nodes as $node) {
    $api = new RouterOS\API();
    if ($api->connect($node['ip'], $node['user'], $node['pass'])) {
        $secrets = $api->comm('/ppp/secret/print');
        // sync to DB ...
        $api->disconnect();
    }
}

// Hotspot node
$hotspot = new RouterOS\API();
$hotspot->connect('10.2.0.1:8729', 'hotspot-api', 'H0tsp0t@Secret2024!');
