<div class="page-header">
    <?php echo $this->Form->create('Informe'); ?>
    <h2><?php echo __('Editar informe'); ?></h2>
</div>
<fieldset>
    <?php
    echo $this->Form->input('id', array('class' => 'form-control', 'label' => 'id'));
    echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
    echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripción'));
    echo $this->Form->input('datos', array('class' => 'form-control', 'label' => 'Datos'));
    echo $this->Form->input('jornada_id', array('class' => 'form-control', 'label' => 'Jornada'));
    ?>
</fieldset>
<?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-s btn-info')); ?>

