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
            $color = $_POST['color'];
            $type = $_POST['type'];
            $petType = $_POST['typeOfPet'];

            // validate
            if (!isset($pet) && !isset($color)) {
                // if we don't have BOTH picked
                echo "Please check you have entered your chosen pet and color.";
            } else {
                //if statement to route to proper page.
                if($petType == "RoboticPet") {
                    // create pet object and assign to session
                    $pet = new RoboticPet($color, $type);
                    $f3->set('SESSION.pet', $pet);
                    $f3->reroute("roboticpet");
                }
                else if($petType == "StuffedPet") {
                    // create pet type and assign to session
                    $pet = new StuffedPet($color, $type);
                    $f3->set('SESSION.pet', $pet);
                    $f3->reroute("stuffedpet");
                }
                // don't reroute to anything else
                // if the user hasn't selected stuffed or robotic we don't want to
                // show them the summary

                }
        }
        // add a views for the page
        // first create a template
        $view = new Template();
        //direct views to that template
        echo $view->render('views/pet-order.html');
    });


$f3->route('GET|POST /roboticpet', function($f3){
    var_dump($_SESSION);
    var_dump($_POST);

    if(!empty($_POST['size']) && !empty($_POST['accessory'])) {
        $size = $_POST['size'];
        $accessory = $_POST['accessory'];


        // set those items to the object
        $f3->get('SESSION.pet')->setAccessories($accessory);
        $f3->get('SESSION.pet')->setSize($size);

        $f3->reroute("summary");
    }





    $view = new Template();
    echo $view->render('views/roboticpet.html');
});


$f3->route('GET|POST /stuffedpet', function($f3){



    if(isset($_POST['stuffedSize']) && isset($_POST['material']) && isset($_POST['stuffing'])) {
        $sizeStuffed = $_POST['stuffedSize'];
        $material = $_POST['material'];
        $stuffing = $_POST['stuffing'];

        $f3->get('SESSION.pet')->setSize($sizeStuffed);
        $f3->get('SESSION.pet')->setStuffingType($stuffing);
        $f3->get('SESSION.pet')->setMateril($material);

        $f3->reroute("summary");
    }


    $view = new Template();
    echo $view->render('views/stuffedpet.html');
});


$f3->route('GET /summary', function($f3){
    var_dump($f3->get('SESSION'));
    $view = new Template();
    echo $view->render('views/summary.html');
});

    // Run fat-free
    $f3->run();

    ?>