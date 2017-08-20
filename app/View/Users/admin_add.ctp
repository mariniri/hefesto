<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('User'); ?>
                <h2><?php echo __('Agregar usuario'); ?></h2>
            </div>
            <fieldset>
                <?php
                echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
                echo $this->Form->input('apellidos', array('class' => 'form-control', 'label' => 'Apellido'));
                echo $this->Form->input('telefono', array('class' => 'form-control', 'label' => 'Telefono'));
                echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email'));
                echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña'));
                echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Contraseña'));
                echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Role', 'type' => 'select', 'options' => array('operario' => 'Operario', 'supervisor' => 'Supervisor')));
                ?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear usuario', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>