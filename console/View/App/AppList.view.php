<?php $AppManager = $this->data; ?>

<ul class="list-group">
    <?php

        foreach ( $AppManager AS $App )
            echo $this->render( "App/AppListItem" , $App );

    ?>
</ul>
