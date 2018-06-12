<?php

namespace Monokit\ConsoleApp\Entity;

use MonoKit\Component\File\Directory;
use Monokit\ConsoleApp\Manager\ControllerManager;
use Monokit\ConsoleApp\Manager\EntityManager;
use Monokit\ConsoleApp\Manager\ManagerManager;
use MonoKit\Controller\Controller;
use MonoKit\EntityManager\Entity;

Class App extends Entity
{
    /** @var Directory */
    protected $Directory;
    /** @var Directory */
    protected $ControllerDirectory;
    /** @var Directory */
    protected $EntityDirectory;
    /** @var Directory */
    protected $ManagerDirectory;
    /** @var string */
    protected $name;

    /**
     * @param Directory $Directory
     * @return App
     */
    public function setDirectory( Directory $Directory )
    {
        $this->Directory = $Directory;
        $this->ControllerDirectory  = new Directory( $Directory->getPath() . __DS__ . Controller::CONTROLLER_DIRECTORY );
        $this->EntityDirectory      = new Directory( $Directory->getPath() . __DS__ . "Entity" );
        $this->ManagerDirectory     = new Directory( $Directory->getPath() . __DS__ . "Manager" );

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
     * @param string $name
     * @return App
     */
    public function setName( $name )
    {
        $this->name = ucfirst( $name );
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        $appName = ($this->name) ? $this->name : basename( $this->get("Directory.path") );

        if ( substr( $appName , -3) != "App" )
            $appName .= "App";

        return $appName;
    }

    public function getNameSpace()
    {
        $Project = new Project();
        return $Project->getName() . "\\" . $this->getName();
    }

    /**
     * @return bool|string
     */
    public function getCreationDate()
    {
        return date( "d M Y" , filectime( $this->get("Directory.path") ) );
    }

    /**
     * @return Directory
     */
    public function getControllerDirectory()
    {
        return $this->ControllerDirectory;
    }

    /**
     * @return Directory
     */
    public function getEntityDirectory()
    {
        return $this->EntityDirectory;
    }

    /**
     * @return Directory
     */
    public function getManagerDirectory()
    {
        return $this->ManagerDirectory;
    }

    /**
     * @return ControllerManager
     */
    public function getControllerManager()
    {
        $ControllerManager = new ControllerManager();
        $ControllerManager->getListByApp( $this );

        return $ControllerManager;
    }

    /**
 * @return EntityManager
 */
    public function getEntityManager()
    {
        $EntityManager = new EntityManager();
        $EntityManager->getListByApp( $this );

        return $EntityManager;
    }

    /**
     * @return ManagerManager
     */
    public function getManagerManager()
    {
        $ManagerManager = new ManagerManager();
        $ManagerManager->getListByApp( $this );

        return $ManagerManager;
    }
}