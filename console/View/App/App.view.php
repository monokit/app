<?php $App = $this->data; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{name}}</li>
    </ol>
</nav>

<section class="Page">
    <div class="PageContainer">


        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Controllers</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Entities</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Managers</a>
            </div>
        </nav>
        <div class="Card">
            <div class="CardBlock">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php echo $this->render( "Controller/ControllerList" , $App->getControllerManager() ); ?></div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->render( "Entity/EntityList" , $App->getEntityManager() ); ?></div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><?php echo $this->render( "Manager/ManagerList" , $App->getManagerManager() ); ?></div>
                </div>

            </div>
        </div>
    </div>
</section>






