<?php
namespace Sandip\Website\Home\Controller;

use Sandip\Website\Application;
use Symfony\Component\HttpFoundation\Request;


class HomeController {

    public function homeAction(Request $request, Application $app) {
        return $app['twig']->render('home.html.twig', array(
            'name' => 'Samd',
        ));
    }

}