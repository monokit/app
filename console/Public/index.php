<?php

    require "../../vendor/autoload.php";

    $App = new \Monokit\ConsoleApp\ConsoleApp( \Monokit\ConsoleApp\ConsoleApp::MODE_DEV );
    $App->setRouteManagerFromIniFilePath( "../Config/AppRoute.ini" );
    $App->render( "index" );