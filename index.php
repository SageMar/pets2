<?php
// 328/pets/index.php
// this file holds the controller for Fat-Free

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// instantiate the F3 framework Base class
$f3 = Base::instance();

// define a default route
$f3->route('GET /', function () {
    // add a views for the page
    // first create a template
    $view = new Template();
    //direct views to that template
    echo $view->render('views/home.html');

});

$f3->route('GET /order', function () {
    // add a views for the page
    // first create a template
    $view = new Template();
    //direct views to that template
    echo $view->render('views/pet-order.html');

});

// Run fat-free
$f3->run();

?>