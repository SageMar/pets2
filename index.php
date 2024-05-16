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

    $f3->route('GET|POST /order', function ($f3) {
        // check if form submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // save the variables
            // var_dump($_POST);
            $pet = $_POST['type'];
            $color = $_POST['color'];
            $petType = $_POST['typeOfPet'];

            // validate
            if (!isset($pet) && !isset($color)) {
                // if we don't have BOTH picked
                echo "Please check you have entered your chosen pet and color.";
            } else {
                // if both ARE set
                $f3->set('SESSION.pet', $pet);
                $f3->set('SESSION.color', $color);

                // show summary of the order

                if($petType == "RoboticPet") {
                    $f3->reroute("roboticpet");
                }
                if($petType == "StuffedPet") {
                    $f3->reroute("stuffedpet");
                }
                }
        }
        // add a views for the page
        // first create a template
        $view = new Template();
        //direct views to that template
        echo $view->render('views/pet-order.html');
    });


$f3->route('GET|POST /roboticpet', function($f3){

    if(isset($_POST['size']) && isset($_POST['accessory']) && isset($_POST['color'])) {
        $size = $_POST['size'];
        $accessory = $_POST['accessory'];
        $color = $_POST['color'];

    }





    $view = new Template();
    echo $view->render('views/roboticpet.html');
});


$f3->route('GET|POST /stuffedpet', function($f3){



    if(isset($_POST['stuffedSize']) && isset($_POST['material']) && isset($_POST['stuffing'])) {
        $sizeStuffed = $_POST['stuffedSize'];
        $material = $_POST['material'];
        $stuffing = $_POST['stuffing'];

    }


    $view = new Template();
    echo $view->render('views/stuffedpet.html');
});


$f3->route('GET /summary', function($f3){
    $view = new Template();
    echo $view->render('views/summary.html');
});

    // Run fat-free
    $f3->run();

    ?>