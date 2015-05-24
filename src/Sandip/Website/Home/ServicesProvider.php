<?php
namespace Sandip\Website\Home;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ServicesProvider implements  ServiceProviderInterface {

    public function register(Application $app) {

        $app['home.frontend.controller_provider'] = $app->share(function ($app) {
            return new Controller\ControllersProvider();
        });

        $app['home.frontend.controller'] = $app->share(function () {
            return new Controller\HomeController();
        });
    }

    public function boot(Application $app) {
        $app['twig.loader.filesystem']->addPath(__DIR__ . '/Resources/views/');
    }
}