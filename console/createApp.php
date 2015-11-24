<?php

    require "../vendor/autoload.php";

    print "\n\n\n\n";
    print "[MonoKit] Création d'une nouvelle application\n";
    print "---------------------------------------------\n";
    print "\n";
    print "Nom de l'application ('Enter' pour annuler) : ";

    $reponse = fgets(STDIN);

    if ( $reponse == "\n" )
        quit( "Création annulée...\n" );
    else
        generateApp( $reponse );

    exit();





function generateApp( $AppName )
{
    $namespace = ucfirst( basename( dirname( __DIR__."../" ) ) );
    $AppName = ucfirst( str_replace( "\n" , "" , $AppName ))."App";
    $AppNameSpace = $namespace . "\\" . $AppName;

    $AppRoot = __DIR__ . "/../src/" . $AppName;

    // Création des dossiers
    createDir( $AppRoot );
    createDir( "{$AppRoot}/Assets" );
    createDir( "{$AppRoot}/Config" );
    createDir( "{$AppRoot}/Controller" );
    createDir( "{$AppRoot}/Entity" );
    createDir( "{$AppRoot}/Manager" );
    createDir( "{$AppRoot}/Public" );
    createDir( "{$AppRoot}/View" );

    // Création de la classe App
    $file = fopen( "../src/{$AppName}/{$AppName}.php" , "w" );
    fwrite( $file , "<?php\r\rnamespace {$AppNameSpace};\r\ruse MonoKit\\App\\App;\r\rClass {$AppName} extends App {}" );
    fclose( $file );

    // Création du fichier Public/...htaccess
    $file = fopen( "../src/{$AppName}/Public/.htaccess" , "w" );
    fwrite( $file , "<IfModule mod_rewrite.c>\n" );
    fwrite( $file , "    RewriteEngine On\n" );
    fwrite( $file , "    RewriteCond %{REQUEST_FILENAME} !-d\n" );
    fwrite( $file , "    RewriteCond %{REQUEST_FILENAME} !-f\n" );
    fwrite( $file , "    RewriteRule (.*\.(css|js|jpg|gif|png|avi|mov|mp4|ogg|woff|woff2))$ indexAsset.php?$1 [NC]\n\n" );

    fwrite( $file , "    RewriteCond %{REQUEST_FILENAME} !-d\n" );
    fwrite( $file , "    RewriteCond %{REQUEST_FILENAME} !-f\n" );
    fwrite( $file , "    RewriteRule ^(.*)$ index.php?$1 [QSA,L]\n" );
    fwrite( $file , "</IfModule>" );
    fclose( $file );

    // Création du fichier Public/index.php
    $file = fopen( "../src/{$AppName}/Public/index.php" , "w" );
    fwrite( $file , "<?php\r\r" );
    fwrite( $file , "   require \"../../../vendor/autoload.php\";\r\r" );
    fwrite( $file , '   $App'." = new \\{$namespace}\\{$AppName}\\{$AppName}();\r" );
    fwrite( $file , '   $App'."->setAppRegistryFromIniFile( \"../Config/AppConfig.ini\" );\r" );
    fwrite( $file , '   $App'."->setAppRouterFromIniFile( \"../Config/AppRoute.ini\" );\r" );
    fwrite( $file , '   $App'."->render(\"index.view.php\");" );
    fclose( $file );

    // Création du fichier Public/indexAsset.php
    $file = fopen( "../src/{$AppName}/Public/indexAsset.php" , "w" );
    fwrite( $file , "<?php\r\r" );
    fwrite( $file , "   require \"../../../vendor/autoload.php\";\r\r" );
    fwrite( $file , '   $App'." = new \\{$namespace}\\{$AppName}\\{$AppName}();\r" );
    fwrite( $file , '   $App'."->renderAsset( ".'$App'."->getUrlRequest()->getUrl() );" );
    fclose( $file );

    // Création du fichier Controller/AppController.php
    $file = fopen( "../src/{$AppName}/Controller/AppController.php" , "w" );
    fwrite( $file , "<?php\r\rnamespace {$AppNameSpace}\\Controller;\r\ruse MonoKit\\Controller\\Controller;\r\rClass AppController extends Controller {}" );
    fclose( $file );

    // Création du fichier View/index.view.php
    $file = fopen( "../src/{$AppName}/View/index.view.php" , "w" );
    fwrite( $file , "<!DOCTYPE html>\r\r");
    fwrite( $file , "<html>\r" );
    fwrite( $file , "<head>\r" );
    fwrite( $file , "    <meta charset=\"utf-8\">\r" );
    fwrite( $file , "    <base href=\"<?php echo __ROOT__; ?>\"/>\r" );
    fwrite( $file , "    <title><?php echo \$this->AppRegistry(\"HTML.title\"); ?></title>\r\r" );
    fwrite( $file , "    <link rel=\"stylesheet\" href=\"css/stylesheet.css\">\r\r" );
    fwrite( $file , "</head>\r" );
    fwrite( $file , "<body>\r" );
    fwrite( $file , "   <?php echo HTML_CONTENT; ?>\r" );
    fwrite( $file , "</body>\r" );
    fwrite( $file , "</html>\r" );
    fclose( $file );

    // Création du fichier Config/AppConfig.ini
    $file = fopen( "../src/{$AppName}/Config/AppConfig.ini" , "w" );
    fwrite( $file , "[APPLICATION]\rname = {$AppName}\r\r[HTML]\rtitle = www.{$AppName}.com" );
    fclose( $file );

    // Création du fichier Config/AppRoute.ini
    $file = fopen( "../src/{$AppName}/Config/AppRoute.ini" , "w" );
    fwrite( $file , "[ROOT]\rpattern = /\raction = AppController:indexAction" );
    fclose( $file );

    print "---------------------------------------------\n";
    print "     L'application est maintenant générée.\n";
    print "---------------------------------------------\n";
    exit();
}

function createDir( $dirName )
{
    print "Création du dossier {$dirName}.....";
    mkdir( $dirName , 0777 , true );
    chmod( $dirName , 0777 );
    print "ok\n";
}

function quit( $message )
{
    print $message;
    exit();
}