<?php

    require "../vendor/autoload.php";

    use MonoKit\MonoKitApplication;

    $Application = new MonoKitApplication();
    $Application->AppRegistry()->setFromIniFile( "../Config/AppConfig.ini" );
    $Application->AppRoute()->setFromIniFile( "../Config/AppRoute.ini" );
    $Application->render( "index.view.php" );

?>