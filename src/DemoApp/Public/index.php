<?php

    require "../../../vendor/autoload.php";

    $App = new \Azulis\DemoApp\DemoApp();
    $App->setAppRegistryFromIniFile( "../Config/AppConfig.ini" );
    $App->setAppRouterFromIniFile( "../Config/AppRoute.ini" );
    $App->render( "index.view.php" );
