<?php

namespace Monokit\ConsoleApp\Entity;

use MonoKit\Component\File\Directory;
use Monokit\ConsoleApp\Manager\AppManager;
use MonoKit\EntityManager\Entity;

Class Project extends Entity
{
    /** @var Directory */
    protected $Directory;
    /** @var Directory */
    protected $AppDirectory;

    public function __construct()
    {
        $this->setDirectory( new Directory( realpath("../../") ) );
        $this->setAppDirectory( new Directory( realpath("../../src/") ) );
    }

    /**
     * @param Directory $Directory
     * @return Project
     */
    public function setDirectory( Directory $Directory)
    {
        $this->Directory = $Directory;
        return $this;
    }

    /**
     * @return Directory
     */
    public function getDirectory()
    {
        return $this->Directory;
    }

    /**
     * @param Directory $AppDirectory
     * @return Project
     */
    public function setAppDirectory( Directory $AppDirectory)
    {
        $this->AppDirectory = $AppDirectory;
        return $this;
    }

    /**
     * @return Directory
     */
    public function getAppDirectory()
    {
        return $this->AppDirectory;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return ucfirst( basename( $this->get("Directory.path") ) );
    }

    /**
     * @return bool|string
     */
    public function getCreationDate()
    {
        return date( "d M Y" , filectime( $this->get("Directory.path") ) );
    }

    /**
     * @return AppManager
     */
    public function getAppManager()
    {
        $AppManager = new AppManager();
        $AppManager->getListByProject( $this );

        return $AppManager;
    }
}