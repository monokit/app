<?php

    require "../../../vendor/autoload.php";

    $App = new Azulis\DemoApp\DemoApp();
    $App->renderAsset( $App->getUrlRequest()->getUrl() );