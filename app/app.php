<?php

require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

//twig
use Silex\Provider\TwigServiceProvider;

$app = new Silex\Application();

$app->register(new TwigServiceProvider(), array('twig.path'=>__DIR__.'/views'));

$app->get('/', function() {
    return new Response('Welcome to my new Silex');
});


$blogPosts = array(
    1 => array(
        'date'      => '2011-03-29',
        'author'    => 'igorw',
        'title'     => 'Using Silex',
        'body'      => '...',
    ),
);

$app->get('/blog', function () use ($blogPosts) {
    $output = '';
    foreach ($blogPosts as $post) {
        $output .= $post['title'];
        $output .= '<br />';
    }

    return $output;
});

$app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogPosts) {
    if (!isset($blogPosts[$id])) {
        $app->abort(404, "Post $id does not exist.");
    }

    $post = $blogPosts[$id];

    return  "<h1>{$post['title']}</h1>".
        "<p>{$post['body']}</p>";
});


$app->post('/feedback', function (Request $request) {
    echo $message = $request->get('message');exit;
    mail('feedback@yoursite.com', '[YourSite] Feedback', $message);

    return new Response('Thank you for your feedback!', 201);
});

$app->get('/hello-twig/{name}', function($name) use ($app){
    return $app['twig']->render('hello.twig', array('name'=>$name));
});


return $app;