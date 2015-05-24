<?php
namespace Sandip\Website;

class Application extends \Silex\Application {

    protected $basePath;

    public function __construct($basePath){
        parent::__construct();
        $this->basePath = $basePath;
        $this->loadConfig();
        $this->initServiceProviders();
    }

    public function loadConfig(){

    }

    public function initServiceProviders(){
        $app = $this;
        $app['service_container'] = $app;
        $app['app_base_path'] = $this->basePath;
        $app['debug'] = true;

        $app->register(new \Silex\Provider\UrlGeneratorServiceProvider());
        $app->register(new \Silex\Provider\ServiceControllerServiceProvider());

        $app->register(new \Silex\Provider\TwigServiceProvider(), array(
            'twig.options' => array(
                'cache' => $this->basePath . '/cache/twig',
                'auto_reload' => $this['debug'],
                'strict_variables' => true,
            ),
            'twig.path' => array($this->basePath . '/src/views'),
        ));


    }

}