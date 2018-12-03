<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 26/11/18
 * Time: 13:30
 */

define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => 'play_realtime'
]);

require_once __DIR__ . '/Source/Crud/Conn.php';
require_once __DIR__ . '/Source/Crud/Read.php';