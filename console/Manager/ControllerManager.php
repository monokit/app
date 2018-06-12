<?php

namespace Monokit\ConsoleApp\Manager;

use Monokit\ConsoleApp\Entity\App;
use Monokit\ConsoleApp\Entity\Controller;
use MonoKit\EntityManager\EntityManager;

Class ControllerManager extends EntityManager
{
    /**
     * @param App $app
     * @return ControllerManager
     */
    public function getListByApp( App $app )
    {
        $this->removeAll();

        foreach ( $app->getControllerDirectory()->getFileList() AS $AppControllerFile )
        {
            $Controller = new Controller();
            $Controller->setFile( $AppControllerFile );

            $this->add( $Controller );
        }

        return $this;
    }
}