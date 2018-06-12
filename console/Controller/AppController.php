<?php

namespace Monokit\ConsoleApp\Controller;

use Monokit\ConsoleApp\Manager\AppManager;
use MonoKit\Controller\Controller;

Class AppController extends Controller
{
    /**
     * @return \MonoKit\Http\Response\ResponseHtml
     */
    public function indexAction()
    {
        return $this->render( "Home/Home" );
    }

    public function viewAction( $AppName )
    {
        $AppManager = new AppManager();
        $AppManager->getByName( $AppName );

        return $this->render( "App/App" , $AppManager->getFirst() );
    }
}