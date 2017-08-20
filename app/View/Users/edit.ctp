<div class="page-header">
    <?php echo $this->Form->create('User'); ?>
    <h2><?php echo __('Editar usuario'); ?></h2>
</div>
<fieldset>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
    echo $this->Form->input('apellidos', array('class' => 'form-control', 'label' => 'Apellidos'));
    echo $this->Form->input('telefono', array('class' => 'form-control', 'label' => 'Telefono'));
    echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'E-mail'));
    echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Username')); 
    echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Role', 'type' => 'select', 'options' => array('operario' => 'Operario', 'supervisor' => 'Supervisor')));
    ?>
</fieldset>
<?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-s btn-info')); ?>

