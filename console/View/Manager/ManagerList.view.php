<?php $ManagerManager = $this->data; ?>

<ul class="list-group">

    <?php

        foreach ( $ManagerManager AS $Manager )
            echo $this->render( "Manager/ManagerListItem" , $Manager );

    ?>

</ul>