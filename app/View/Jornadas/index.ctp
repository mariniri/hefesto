<?php
$this->Paginator->options(array(
    'update' => '#contenedor-jornadas',
    'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
));
?>
<div id="contenedor-jornadas">
    <div class="page-header">
        <h2><?php echo __('Jornadas'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('horaInicio'); ?></th>
			<th><?php echo $this->Paginator->sort('horafin'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
                        <th><?php echo $this->Paginator->sort('minutos libres'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('central_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($jornadas as $jornada): ?>
	<tr>
		<td><?php echo h($jornada['Jornada']['id']); ?>&nbsp;</td>
		<td><?php echo h($jornada['Jornada']['horaInicio']); ?>&nbsp;</td>
		<td><?php echo h($jornada['Jornada']['horafin']); ?>&nbsp;</td>
		<td><?php echo h($jornada['Jornada']['fecha']); ?>&nbsp;</td>
                <td><?php echo h($jornada['Jornada']['minutoslibres']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jornada['User']['apellidos'], array('controller' => 'users', 'action' => 'view', $jornada['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jornada['Central']['dirección'], array('controller' => 'centrals', 'action' => 'view', $jornada['Central']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $jornada['Jornada']['id']),array('class'=>'btn btn-xs btn-info')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $jornada['Jornada']['id']),array('class'=>'btn btn-xs btn-info')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $jornada['Jornada']['id']), array('confirm' => __('Seguro quieres eliminar a # %s?', $jornada['Jornada']['id']),'class'=>'btn btn-xs btn-info')); ?>
		</td>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <ul class="pagination">
        <li> <?php echo $this->Paginator->prev('< ' . __('Anterior'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
        <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
        <li> <?php echo $this->Paginator->next(__('Siguiente') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
    </ul>
    <?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-jornadas -->