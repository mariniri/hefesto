<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Informe'); ?>
                <h2><?php echo __('Agregar informe'); ?></h2>
            </div>
            <fieldset>
	<?php
		echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
		echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripción'));
		echo $this->Form->input('datos', array('class' => 'form-control', 'label' => 'Datos'));
		echo $this->Form->input('jornada_id', array('class' => 'form-control', 'label' => 'Jornada'));
	?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>