<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../app/mailcatcher.sqlite',
    ),
));

$app->get('/', function() use ($app) {

    $sentMails = $app['db']->fetchAll("SELECT * FROM sent_mails");

    return $app['twig']->render('index.html.twig', array('mails' => $sentMails));

});

$app->run();
