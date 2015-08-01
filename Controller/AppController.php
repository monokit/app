<?php

namespace MyApp\Controller;

use MonoKit\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        return $this->render( "start.view.php" );
    }

    public function helloAction( $name )
    {
        return $this->render( "hello.view.php" , $name );
    }
}