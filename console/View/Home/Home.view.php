<section class="Page">
    <div class="PageContainer">
        <div class="Intro">
            <h1 class="Title"> Bienvenue sur Monokit/Console! </h1>
            <p class="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eros ante, gravida eu rhoncus non, sagittis eu est.</p>
        </div>

        <?php

            $Project = new \Monokit\ConsoleApp\Entity\Project();
            echo $this->render( "Project/Project" , $Project );

        ?>

    </div>
</section>