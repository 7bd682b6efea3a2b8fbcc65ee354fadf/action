<?php
/**
 * Hotspot + Bandwidth sync – LAB CREDENTIAL (FAKE)
 * All credentials hardcoded inline — worst-case pattern for scanner demo
 */

// Direct mysql_connect (all literal args)
$db = mysql_connect('db-hotspot.internal', 'hotspot_rw', 'H0tsp0t@DbPass2024!');
mysql_select_db('hotspot_db', $db);

// Direct mysqli (all literal args)
$mysqli = new mysqli('db-hotspot.internal', 'hotspot_rw', 'H0tsp0t@DbPass2024!', 'hotspot_db');

// Direct mysqli_connect
$conn = mysqli_connect('db-hotspot.internal', 'hotspot_rw', 'H0tsp0t@DbPass2024!', 'hotspot_db');

// PDO with full DSN literal
$pdo = new PDO('mysql:host=db-hotspot.internal;dbname=hotspot_db', 'hotspot_rw', 'H0tsp0t@DbPass2024!');

// PDO PostgreSQL (RADIUS backend)
$radius = new PDO('pgsql:host=radius.internal;dbname=radius', 'radius_user', 'Rad1us@PgPass2024!');

// MikroTik Hotspot nodes
$hs1 = new RouterOS\API();
$hs1->connect('10.3.0.1:8729', 'hotspot-api', 'Hs01@ApiSecret2024!');

$hs2 = new RouterOS\API();
$hs2->connect('10.3.0.2:8729', 'hotspot-api', 'Hs02@ApiSecret2024!');

// Backup management router
$mgmt = new RouterOS\API();
$mgmt->connect('10.0.0.254:8728', 'netadmin', 'Mgmt@NetAdmin#2024!');

// Queue tree sync
foreach (['10.3.1.1:8729', '10.3.1.2:8729', '10.3.1.3:8729'] as $host) {
    $node = new RouterOS\API();
    // Note: mixed literal + variable not in real scope, this shows literal host
    $node->connect($host, 'bw-api', 'BwSync@ApiPass2024!');
    $queues = $node->comm('/queue/simple/print');
    $node->disconnect();
}
