<?php
$this->Paginator->options(array(
    'update' => '#contenedor-tareas',
    'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
));
?>
<div id="contenedor-tareas">
    <div class="page-header">
        <h2><?php echo __('Tareas'); ?></h2>
    </div>
    <div class ="col-md-12">
        <div class="progress oculto" id="procesando">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">100% Complete</span>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('fin'); ?></th>
			<th><?php echo $this->Paginator->sort('horaInicio'); ?></th>
			<th><?php echo $this->Paginator->sort('horaFin'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('longitud'); ?></th>
			<th><?php echo $this->Paginator->sort('latitud'); ?></th>
			<th><?php echo $this->Paginator->sort('distanciaCentral'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('jornada_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tareas as $tarea): ?>
	<tr>
		<td><?php echo h($tarea['Tarea']['id']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['estado']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['inicio']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['fin']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['horaInicio']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['horaFin']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['total']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['longitud']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['latitud']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['distanciaCentral']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['created']); ?>&nbsp;</td>
		<td><?php echo h($tarea['Tarea']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tarea['Jornada']['horaInicio'], array('controller' => 'jornadas', 'action' => 'view', $tarea['Jornada']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $tarea['Tarea']['id']),array('class'=>'btn btn-xs btn-info')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tarea['Tarea']['id']),array('class'=>'btn btn-xs btn-info')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $tarea['Tarea']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tarea['Tarea']['id']),'class'=>'btn btn-xs btn-info')); ?>
		</td>
	</tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <ul class="pagination">
        <li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
        <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
        <li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
    </ul>
    <?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-->
