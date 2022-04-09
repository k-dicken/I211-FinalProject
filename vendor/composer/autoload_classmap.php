<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ComposerAutoloaderInit06ef10d7858b7c538880ca8e3014b021' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInit06ef10d7858b7c538880ca8e3014b021' => $vendorDir . '/composer/autoload_static.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Database' => $baseDir . '/application/database.class.php',
    'Dispatcher' => $baseDir . '/application/dispatcher.class.php',
    'Flight' => $baseDir . '/models/flight.class.php',
    'FlightController' => $baseDir . '/controllers/flight_controller.class.php',
    'FlightDetail' => $baseDir . '/views/flight/detail/flight_detail.class.php',
    'FlightIndex' => $baseDir . '/views/flight/index/flight_index.class.php',
    'FlightIndexView' => $baseDir . '/views/flight/flight_index_view.class.php',
    'FlightModel' => $baseDir . '/models/flight_model.class.php',
    'FlightSearch' => $baseDir . '/views/flight/search/flight_search.class.php',
    'HomeController' => $baseDir . '/controllers/home_controller.class.php',
    'HomeIndex' => $baseDir . '/views/home/home_index.class.php',
    'IndexView' => $baseDir . '/views/index_view.php',
    'UserController' => $baseDir . '/controllers/user_controller.class.php',
    'UserIndex' => $baseDir . '/views/user/index/user_index.class.php',
    'UserLogin' => $baseDir . '/views/user/login/user_login.class.php',
    'UserModel' => $baseDir . '/models/user_model.class.php',
    'UserVerify' => $baseDir . '/views/user/verify/user_verify.php',
);
