<?php $EntityManager = $this->data; ?>

<ul class="list-group">

    <?php

        foreach ( $EntityManager AS $Entity )
            echo $this->render( "Entity/EntityListItem" , $Entity );

    ?>

</ul>