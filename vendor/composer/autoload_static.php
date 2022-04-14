<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06ef10d7858b7c538880ca8e3014b021
{
    public static $classMap = array (
        'ComposerAutoloaderInit06ef10d7858b7c538880ca8e3014b021' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit06ef10d7858b7c538880ca8e3014b021' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'Flight' => __DIR__ . '/../..' . '/models/flight.class.php',
        'FlightController' => __DIR__ . '/../..' . '/controllers/flight_controller.class.php',
        'FlightCreate' => __DIR__ . '/../..' . '/views/flight/create/flight_create.class.php',
        'FlightDetail' => __DIR__ . '/../..' . '/views/flight/detail/flight_detail.class.php',
        'FlightIndex' => __DIR__ . '/../..' . '/views/flight/index/flight_index.class.php',
        'FlightIndexView' => __DIR__ . '/../..' . '/views/flight/flight_index_view.class.php',
        'FlightModel' => __DIR__ . '/../..' . '/models/flight_model.class.php',
        'FlightSearch' => __DIR__ . '/../..' . '/views/flight/search/flight_search.class.php',
        'FlightUser' => __DIR__ . '/../..' . '/views/flight/user/flight_user.php',
        'HomeController' => __DIR__ . '/../..' . '/controllers/home_controller.class.php',
        'HomeIndex' => __DIR__ . '/../..' . '/views/home/home_index.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.php',
        'User' => __DIR__ . '/../..' . '/models/user.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserCreate' => __DIR__ . '/../..' . '/views/user/create/user_create.class.php',
        'UserDetail' => __DIR__ . '/../..' . '/views/user/detail/user_detail.class.php',
        'UserEdit' => __DIR__ . '/../..' . '/views/user/edit/user_edit.class.php',
        'UserLogin' => __DIR__ . '/../..' . '/views/user/login/user_login.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit06ef10d7858b7c538880ca8e3014b021::$classMap;

        }, null, ClassLoader::class);
    }
}
