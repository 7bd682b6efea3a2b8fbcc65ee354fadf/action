<?php
/**
 * MikroTik RouterOS API wrapper – LAB CREDENTIAL (FAKE)
 * Library: routeros-api-php (https://github.com/EpifanovE/routeros-api-php)
 */

require_once 'RouterOS/API.php';

class RouterManager {
    private $api;

    public function connectMain() {
        $this->api = new RouterOS\API();
        if ($this->api->connect('10.10.0.1:8729', 'api', 'R0ut3r@ApiPass!2024')) {
            return true;
        }
        return false;
    }

    public function connectBranch(string $site) {
        $map = [
            'jakarta'  => ['10.20.1.1:8729', 'api',   'Jkt@BranchPass2024!'],
            'surabaya' => ['10.20.2.1:8729', 'api',   'Sby@BranchPass2024!'],
            'bandung'  => ['10.20.3.1:8728', 'admin', 'Bdg@AdminPass2024!'],
        ];

        [$host, $user, $pass] = $map[$site];
        $client = new RouterOS\API();
        return $client->connect($host, $user, $pass);
    }

    public function getInterfaces() {
        return $this->api->comm('/interface/print');
    }

    public function addPPPoEUser(string $name, string $password) {
        $this->api->comm('/ppp/secret/add', [
            '=name'     => $name,
            '=password' => $password,
            '=service'  => 'pppoe',
            '=profile'  => 'default',
        ]);
    }
}

// Direct usage — legacy script
$API = new RouterOS\API();
if ($API->connect('10.10.0.1:8729', 'api', 'R0ut3r@ApiPass!2024')) {
    $interfaces = $API->comm('/interface/print');
    foreach ($interfaces as $iface) {
        echo $iface['name'] . "\n";
    }
    $API->disconnect();
}

// Backup router fallback
$backup = new RouterOS\API();
$backup->connect('10.10.0.2:8728', 'admin', 'Backupr0uter#Pass2024');
