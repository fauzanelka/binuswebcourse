<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 */

if ($_GET['file'] === 'robots.txt') {
    header('Content-type: text/plain');
    echo require __DIR__ . '/robots.txt';
    exit(0);
} else if ($_GET['file'] === 'favicon.ico') {
    header('Content-type: image/x-icon');
    echo require __DIR__ . '/favicon.ico';
    exit(0);
}

if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    echo require __DIR__ . '/assets/css/' . basename($_GET['file']);
    exit(0);
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    echo require __DIR__ . '/assets/js/' . basename($_GET['file']);
    exit(0);
}
