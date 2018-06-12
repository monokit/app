<?php

namespace Monokit\ConsoleApp\Controller;

use MonoKit\Component\File\Directory;
use Monokit\ConsoleApp\Entity\App;
use Monokit\ConsoleApp\Entity\Project;

Class ProjectController extends AppController
{
    public function generateAppAction()
    {
        $Project = new Project();

        $App = new App();
        $App->setName( $this->getUrlRequest()->getParam("APP_NAME") );
        $App->setDirectory( new Directory( $Project->getAppDirectory()->getPath() . __DS__ . $App->getName() ) );

        $Project->getAppManager()->generate( $App );

        $this->redirect( __ROOT__ . "/Apps/" . $App->getName() );
    }
}