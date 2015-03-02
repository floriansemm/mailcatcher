#!/usr/bin/php
<?php

require __DIR__ . '/../vendor/autoload.php';

$message = file_get_contents("php://stdin");

$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
    'dbname' => 'mailcatcher',
    'path' => __DIR__ .'/mailcatcher.sqlite',
    'driver' => 'pdo_sqlite',
);

$parser = new PlancakeEmailParser($message);


$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$conn->insert('sent_mails', array(
    'sender'    => 'localhost',
    'recipient' => implode(', ', $parser->getTo()),
    'subject'   => $parser->getSubject(),
    'content'   => $parser->getHTMLBody(),
    'sent'      => time()
));
