<div class="page-header">
    <?php echo $this->Form->create('Jornada'); ?>
    <h2><?php echo __('Editar jornada'); ?></h2>
</div>
<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('inicio');
		echo $this->Form->input('fin');
		echo $this->Form->input('horaInicio');
		echo $this->Form->input('horafin');
		echo $this->Form->input('total');
		echo $this->Form->input('fecha');
		echo $this->Form->input('minutoslibres');
		echo $this->Form->input('user_id');
		echo $this->Form->input('central_id');
	?>
</fieldset>
<?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-s btn-info')); ?>

