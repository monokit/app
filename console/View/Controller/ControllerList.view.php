<?php $ControllerManager = $this->data; ?>

<ul class="list-group">

    <?php

        foreach ( $ControllerManager AS $Controller )
            echo $this->render( "Controller/ControllerListItem" , $Controller );

    ?>

</ul>