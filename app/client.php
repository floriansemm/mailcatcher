#!/usr/bin/php
<?php

require '../vendor/autoload.php';

$message = file_get_contents("php://stdin");

$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
    'dbname' => 'mailcatcher',
    'path' => __DIR__ .'/mailcatcher.sqlite',
    'driver' => 'pdo_sqlite',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
$conn->insert('raw_mail', array('raw_mail_content' => $message));