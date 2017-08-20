<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Central'); ?>
                <h2><?php echo __('Agregar central'); ?></h2>
            </div>
            <fieldset>

	<?php
                echo $this->Form->input('dirección', array('class' => 'form-control', 'label' => 'Dirección'));
		echo $this->Form->input('latitud', array('class' => 'form-control', 'label' => 'Latitud'));
		echo $this->Form->input('longitud', array('class' => 'form-control', 'label' => 'Longitud'));
		
	?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>