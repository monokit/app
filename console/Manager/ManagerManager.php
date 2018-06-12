<?php

namespace Monokit\ConsoleApp\Manager;

use Monokit\ConsoleApp\Entity\App;
use Monokit\ConsoleApp\Entity\Manager;

Class ManagerManager extends EntityManager
{
    /**
     * @param App $app
     * @return ControllerManager
     */
    public function getListByApp( App $app )
    {
        $this->removeAll();

        foreach ( $app->getManagerDirectory()->getFileList() AS $AppManagerFile )
        {
            $Manager = new Manager();
            $Manager->setFile( $AppManagerFile );

            $this->add( $Manager );
        }

        return $this;
    }
}