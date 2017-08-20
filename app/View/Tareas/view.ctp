<div class="page-header">
    <h2><?php echo __('Ver tarea'); ?></h2>
</div>
<div class="well">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Estado'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['estado']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Hora inicio'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['horaInicio']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Hora fin'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['horaFin']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['total']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Longitud'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['longitud']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Latitud'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['latitud']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fecha'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['fecha']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Direccion'); ?></dt>
        <dd>
            <?php echo h($tarea['Tarea']['direccion']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Jornada'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tarea['Jornada']['horaInicio'], array('controller' => 'jornadas', 'action' => 'view', $tarea['Jornada']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php if ($current_user['role'] != 'operario') { ?>
    <?php echo $this->Html->link(__('Editar tarea'), array('action' => 'edit', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-info')); ?><br>
    <?php echo $this->Form->postLink(__('Eliminar tarea'), array('action' => 'delete', $tarea['Tarea']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $tarea['Tarea']['id']), 'class' => 'btn btn-xs btn-info')); ?>


<?php } ?>