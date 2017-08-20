<div class="page-header">
    <?php echo $this->Form->create('Jornada'); ?>
    <h2><?php echo __('Editar jornada'); ?></h2>
</div>
<fieldset>
	<?php
		echo $this->Form->input('id', array('class' => 'form-control', 'label' => 'Id'));
		//echo $this->Form->input('inicio', array('class' => 'form-control', 'label' => 'Inicio'));
		//echo $this->Form->input('fin', array('class' => 'form-control', 'label' => 'Fin'));
		echo $this->Form->input('horaInicio', array('class' => 'form-control', 'label' => 'Hora inicio'));
		echo $this->Form->input('horafin', array('class' => 'form-control', 'label' => 'Hora fin'));
		//echo $this->Form->input('total', array('class' => 'form-control', 'label' => 'Duracion'));
		echo $this->Form->input('fecha', array('class' => 'form-control', 'label' => 'Fecha'));
		//echo $this->Form->input('minutoslibres', array('class' => 'form-control', 'label' => 'Minutos libres'));
		echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Usuario'));
		echo $this->Form->input('central_id', array('class' => 'form-control', 'label' => 'Central'));
	?>
</fieldset>
<?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-s btn-info')); ?>

