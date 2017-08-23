<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            //<?php echo $this->Html->link('Hefesto', array('controller' => 'welcome', 'action' => 'index'), array('class' => 'navbar-brand')) ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if ($current_user['role'] == 'admin') { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar usuarios', array('controller' => 'users', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nuevo usuario', array('controller' => 'users', 'action' => 'add')); ?></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jornadas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar jornadas', array('controller' => 'jornadas', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva jornada', array('controller' => 'jornadas', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tareas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar tareas', array('controller' => 'tareas', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva tarea', array('controller' => 'tareas', 'action' => 'add')); ?></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar informes', array('controller' => 'informes', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nuevo informe', array('controller' => 'informes', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Centrales <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar centrales', array('controller' => 'centrals', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva central ', array('controller' => 'centrals', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($current_user['role'] == 'supervisor') { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar operarios', array('controller' => 'users', 'action' => 'viewOperarios')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jornadas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar jornadas', array('controller' => 'jornadas', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva jornada', array('controller' => 'jornadas', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tareas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar tareas', array('controller' => 'tareas', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva tarea', array('controller' => 'tareas', 'action' => 'add')); ?></li> 
                            <li class="divider"></li>
                            <li class="dropdown-header">Gestionar tareas</li>
                            <li><?php echo $this->Html->link('Tareas pendientes', array('controller' => 'tareas', 'action' => 'tareasPendientes')); ?></li>
                            <li><?php echo $this->Html->link('Tareas asignadas', array('controller' => 'tareas', 'action' => 'tareasAsignadas')); ?></li>
                            <li><?php echo $this->Html->link('Tareas atendidas', array('controller' => 'tareas', 'action' => 'tareasAtendidas')); ?></li>  
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar informes', array('controller' => 'informes', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nuevo informe', array('controller' => 'informes', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Centrales <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar centrales', array('controller' => 'centrals', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Nueva central ', array('controller' => 'centrals', 'action' => 'add')); ?></li>
                        </ul>
                    </li>
                    <li>
                    <?php echo $this->Html->link('Planificador', array('controller' => 'tareas', 'action' => 'buscar')); ?>
                    </li>
                <?php } ?>
                <?php if ($current_user['role'] == 'operario') { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mis jornadas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar jornadas', array('controller' => 'jornadas', 'action' => 'misJornadas')); ?></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mis tareas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar tareas', array('controller' => 'tareas', 'action' => 'misTareas')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mis informes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Listar informes', array('controller' => 'informes', 'action' => 'misInformes')); ?></li>
                        </ul>
                    </li>
                <?php } ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>
                    </li>
                </ul>  
        </div><!--/.nav-collapse -->
    </div>
</div>
