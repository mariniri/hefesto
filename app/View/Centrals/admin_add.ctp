<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Central'); ?>
                <h2><?php echo __('Agregar centrales'); ?></h2>
            </div>
            <fieldset>

	<?php
		echo $this->Form->input('latitud');
		echo $this->Form->input('longitud');
		echo $this->Form->input('dirección');
	?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear central', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>