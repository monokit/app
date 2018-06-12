<?php

namespace Monokit\ConsoleApp\Manager;

use Monokit\ConsoleApp\Entity\App;
use Monokit\ConsoleApp\Entity\Entity;

Class EntityManager extends \MonoKit\EntityManager\EntityManager
{
    /**
     * @param App $app
     * @return ControllerManager
     */
    public function getListByApp( App $app )
    {
        $this->removeAll();

        foreach ( $app->getEntityDirectory()->getFileList() AS $AppEntityFile )
        {
            $Entity = new Entity();
            $Entity->setFile( $AppEntityFile );

            $this->add( $Entity );
        }

        return $this;
    }
}