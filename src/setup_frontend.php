<?php
$app->register(new \Sandip\Website\Home\ServicesProvider());
$app->mount('/', $app['home.frontend.controller_provider']);