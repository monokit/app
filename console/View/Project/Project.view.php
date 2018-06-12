<?php

    $Project = $this->data;
    $AppManager = $Project->getAppManager();

?>

<div class="Card">
    <div class="CardBlock">

        <header class="TitleBlock">
            <h1 class="Title">{{name}}</h1>
            <p class="TitleDescription"><?php echo $AppManager->count(); ?> application(s) disponible(s) <a href="../../" target="_blank">dans ce projet</a></p>
        </header>

        <main>

            <form class="card p-2" action="Apps" method="POST">
                <div class="input-group">
                    <input type="text" name="App.name" class="form-control" autocomplete="off" placeholder="Nom de la nouvelle application">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Générer une nouvelle Application</button>
                    </div>
                </div>
            </form>

            <?php echo $this->render("App/AppList" , $Project->getAppManager() ); ?>

        </main>

    </div>
</div>
