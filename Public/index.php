<?php

    require "../vendor/autoload.php";

    use MonoKit\MonoKitApplication;

    $Application = new MonoKitApplication();
    $Application->AppRegistry()->setFromIniFile( "../Config/AppConfig.ini" );
    $Application->AppRouter()->setFromIniFile( "../Config/AppRoute.ini" );
    $Application->render( "index.view.php" );

?>
