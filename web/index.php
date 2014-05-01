<?php

require_once __DIR__.'/../vendor/autoload.php';

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

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

    $sentMails = $app['db']->fetchAll("SELECT sm.rowid, sm.* FROM sent_mails sm ORDER BY sent DESC");

    return $app['twig']->render('index.html.twig', array('mails' => $sentMails));

});

$app->get('/content/{id}', function (Silex\Application $app, $id) {

    $content = $app['db']->fetchAssoc("SELECT content FROM sent_mails WHERE rowid = ?", array($id));

    return $content['content'];
});

$app->run();
