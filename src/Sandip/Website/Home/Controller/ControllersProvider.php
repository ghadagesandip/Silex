<?php
namespace Sandip\Website\Home\Controller;

use Silex\ControllerCollection;
use Silex\Application;
use Silex\ControllerProviderInterface;

class ControllersProvider implements ControllerProviderInterface {

    public function connect(Application $app) {

        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'home.frontend.controller:homeAction');

        return $controllers;
    }
}
