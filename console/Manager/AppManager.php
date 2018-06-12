<?php

namespace Monokit\ConsoleApp\Manager;

use MonoKit\Component\File\Directory;
use MonoKit\Component\File\File;
use MonoKit\Component\File\FileManager;
use Monokit\ConsoleApp\ConsoleApp;
use Monokit\ConsoleApp\Entity\App;
use Monokit\ConsoleApp\Entity\Project;
use MonoKit\EntityManager\EntityManager;

Class AppManager extends EntityManager
{
    public function getByName( $name )
    {
        $App = new App();
        $App->setName( $name );
        $App->setDirectory( new Directory( __SRC__ . __DOT__ . "/" . $name ) );

        $this->add( $App );

        return $this;
    }

    /**
     * @param Project $project
     * @return AppManager
     */
    public function getListByProject( Project $project )
    {
        foreach( $project->getAppDirectory()->getDirectoryList() AS $AppDirectory )
        {
            $App = new App();
            $App->setDirectory( $AppDirectory );

            $this->add( $App ) ;
        }

        return $this;
    }

    public function generate( App $app )
    {
        $FileManager = new FileManager();

        // Création du répertoire [App]
        $app->getDirectory()->create("/");

        $AppTemplateDirectory = new Directory( realpath("../" . ConsoleApp::TEMPLATE_DIRECTORY) );

        // Création de la classe [App]
        $AppClassFile = new File( $app->get("Directory.path") . "/" . $app->getName() . ".php" );
        $AppClassTemplateFile = new File( $AppTemplateDirectory->getPath() . __DS__ . "App.php.template" );
        $FileManager->duplicateFile( $AppClassTemplateFile , $AppClassFile->getFilePath() );

        // Remplacements;
        $this->replaceFileContent( $AppClassFile , $app );

        foreach ( $AppTemplateDirectory->getDirectoryList() AS $TemplateDirectory )
        {
            $Directory = new Directory( $app->get("Directory.path") . __DS__ . basename( $TemplateDirectory->getPath() ) );
            $Directory->create("/");

            foreach ( $TemplateDirectory->getFileList() AS $TemplateFile )
            {
                $AppFile = new File( $Directory->getPath() . __DS__ . substr( $TemplateFile->getName(), 0 , -9) );

                //Exception .htaccess & htpasswd
                if ( $AppFile->getShortName() == "htaccess" || $AppFile->getShortName() == "htpasswd" )
                    $AppFile->setFilePath( $Directory->getPath() . __DS__ . __DOT__ . $AppFile->getShortName() );

                $FileManager->duplicateFile( $TemplateFile , $AppFile->getFilePath() );

                // Remplacements;
                $this->replaceFileContent( $AppFile , $app );
            }
        }

    }

    private function replaceFileContent( File $file , App $app )
    {
        file_put_contents( $file->getFilePath() , str_replace('{{NAME}}', $app->getName() , file_get_contents($file->getFilePath()) ));
        file_put_contents( $file->getFilePath() , str_replace('{{NAMESPACE}}', $app->getNameSpace() , file_get_contents($file->getFilePath()) ));
    }
}