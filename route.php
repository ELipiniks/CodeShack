<?php

$router = new Framework\Router;

$router->post('/product/store', function() {
    echo 'Saving product';
});

$router->get('/Galvena', function() {
    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('main/index.php');
});

$router->get('/Weirdizer', function() {
    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('Weirdizer/index.php');
});
$router->get('/music', function() {
    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('dashboard/index.php');
});
$router->get('/music', function() {
    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('music/index.php');
});
$router->post('/Weirdized', function() {

    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('Weirdizer/index.php');
});
$router->get('', function() {
    $template = new Framework\Template;
    $template->with(['Hello']);
    $template->render('main/index.php');
});
$router->get('/product/edit', function() {
    echo 'Edit product #1';
});


$router->dispatch();
