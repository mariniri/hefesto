<div class="page-header">
    <h2><?php echo __('Ver Informe'); ?></h2>
</div>
<div class="well">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($informe['Informe']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nombre'); ?></dt>
        <dd>
            <?php echo h($informe['Informe']['nombre']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Descripción'); ?></dt>
        <dd>
            <?php echo h($informe['Informe']['descripcion']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Datos'); ?></dt>
        <dd>
            <?php echo h($informe['Informe']['datos']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Jornada'); ?></dt>
        <dd>
            <?php echo $this->Html->link($informe['Jornada']['horaInicio'], array('controller' => 'jornadas', 'action' => 'view', $informe['Jornada']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php if ($current_user['role'] != 'operario') { ?>
    <?php echo $this->Html->link(__('Editar informe'), array('action' => 'edit', $informe['Informe']['id']), array('class' => 'btn btn-xs btn-info')); ?> <br>
    <?php echo $this->Form->postLink(__('Eliminar informe'), array('action' => 'delete', $informe['Informe']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $informe['Informe']['id']), 'class' => 'btn btn-xs btn-info')); ?> <br>
<?php } ?>