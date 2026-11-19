<?php
/**
 * LeadHunter PRO - start page (login + app)
 * Made by Tony Djurberg Consulting
 */
require __DIR__ . '/core/lh.php';
$lhConfig = require __DIR__ . '/config.php';
try {
    LH::boot($lhConfig);
} catch (Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    echo '<!doctype html><body style="font-family:Arial;background:#06142b;color:#fff;padding:40px">';
    echo '<h2>LeadHunter PRO – setup problem</h2><p>' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p>Check that the <b>data</b> folder exists and is writable (permissions 755), and that PHP 7.4 or newer is selected in cPanel.</p></body>';
    exit;
}
LH_Shell::render(array('api' => 'api.php', 'assets' => 'assets/'));
