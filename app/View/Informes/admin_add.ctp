<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Informe'); ?>
                <h2><?php echo __('Agregar informe'); ?></h2>
            </div>
            <fieldset>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('datos');
		echo $this->Form->input('jornada_id');
	?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear Informe', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>