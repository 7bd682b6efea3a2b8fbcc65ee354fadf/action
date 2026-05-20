<?php
/**
 * Network Management System – LAB CREDENTIAL (FAKE)
 * Stack: PHP + MikroTik RouterOS API + MySQL
 */

// Database connection (legacy mysql_connect style)
define('DB_HOST',   'db.internal');
define('DB_USER',   'nms_user');
define('DB_PASS',   'Nms@Pr0dDB#2024!');
define('DB_NAME',   'network_mgmt');

$db = mysql_connect(DB_HOST, DB_USER, 'Nms@Pr0dDB#2024!');

// PDO alternative
$pdo = new PDO(
    'mysql:host=db.internal;port=3306;dbname=network_mgmt',
    'nms_user',
    'Nms@Pr0dDB#2024!'
);

// MikroTik router credentials
define('ROUTER_MAIN_IP',   '10.10.0.1:8729');
define('ROUTER_BACKUP_IP', '10.10.0.2:8728');
define('ROUTER_USER',      'api');
define('ROUTER_PASS',      'R0ut3r@ApiPass!2024');

// Secondary routers
$routers = [
    'core-1'   => ['host' => '10.10.1.1:8729', 'user' => 'api',   'pass' => 'C0r3Router#Pass2024'],
    'core-2'   => ['host' => '10.10.1.2:8729', 'user' => 'api',   'pass' => 'C0r3Router#Pass2024'],
    'branch-1' => ['host' => '10.20.0.1:8728', 'user' => 'admin', 'pass' => 'Br@nch1P@ss!2024'],
];
