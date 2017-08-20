<div class="page-header">
    <?php echo $this->Form->create('Central'); ?>
    <h2><?php echo __('Editar central'); ?></h2>
</div>
	<fieldset>
	<?php
		echo $this->Form->input('id', array('class' => 'form-control', 'label' => 'Id'));
		echo $this->Form->input('latitud', array('class' => 'form-control', 'label' => 'Latitud'));
		echo $this->Form->input('longitud', array('class' => 'form-control', 'label' => 'Longitud'));
		echo $this->Form->input('dirección', array('class' => 'form-control', 'label' => 'Dirección'));
	?>
</fieldset>
<?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-s btn-info')); ?>

