<?php

namespace Monokit\ConsoleApp\Entity;

use MonoKit\Component\File\File;
use MonoKit\EntityManager\Entity;

Class Controller extends Entity
{
    /** @var File */
    protected $File;

    /**
     * @param File $File
     * @return Controller
     */
    public function setFile( File $File )
    {
        $this->File = $File;
        return $this;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->File;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->File->getShortName();
    }
}