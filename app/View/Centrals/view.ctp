<div class="page-header">
    <h2><?php echo __('Ver central'); ?></h2>
</div>
<div class="well">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($central['Central']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Latitud'); ?></dt>
        <dd>
            <?php echo h($central['Central']['latitud']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Longitud'); ?></dt>
        <dd>
            <?php echo h($central['Central']['longitud']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Dirección'); ?></dt>
        <dd>
            <?php echo h($central['Central']['dirección']); ?>
            &nbsp;
        </dd>
        
    </dl>
</div>
<?php if ($current_user['role'] != 'operario') { ?>
    <?php echo $this->Html->link(__('Editar central'), array('action' => 'edit', $central['Central']['id']), array('class' => 'btn btn-xs btn-info')); ?> <br>
    <?php echo $this->Form->postLink(__('Eliminar central'), array('action' => 'delete', $central['Central']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $central['Central']['id']), 'class' => 'btn btn-xs btn-info')); ?> <br>

<h4><?php echo __('Jornadas asignadas'); ?></h4>
<?php if (!empty($central['Jornada'])): ?>
    <table class="table table-bordered">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Inicio'); ?></th>
            <th><?php echo __('Fin'); ?></th>
            <th><?php echo __('HoraInicio'); ?></th>
            <th><?php echo __('Horafin'); ?></th>
            <th><?php echo __('Total'); ?></th>
            <th><?php echo __('Fecha'); ?></th>
            <th><?php echo __('Minutoslibres'); ?></th>
            <th><?php echo __('Created'); ?></th>
            <th><?php echo __('Modified'); ?></th>
            <th><?php echo __('User Id'); ?></th>
            <th><?php echo __('Central Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($central['Jornada'] as $jornada): ?>
            <tr>
                <td><?php echo $jornada['id']; ?></td>
                <td><?php echo $jornada['inicio']; ?></td>
                <td><?php echo $jornada['fin']; ?></td>
                <td><?php echo $jornada['horaInicio']; ?></td>
                <td><?php echo $jornada['horafin']; ?></td>
                <td><?php echo $jornada['total']; ?></td>
                <td><?php echo $jornada['fecha']; ?></td>
                <td><?php echo $jornada['minutoslibres']; ?></td>
                <td><?php echo $jornada['created']; ?></td>
                <td><?php echo $jornada['modified']; ?></td>
                <td><?php echo $jornada['user_id']; ?></td>
                <td><?php echo $jornada['central_id']; ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('controller' => 'jornadas', 'action' => 'view', $jornada['id']), array('class' => 'btn btn-xs btn-info')); ?>
                    <?php echo $this->Html->link(__('Editar'), array('controller' => 'jornadas', 'action' => 'edit', $jornada['id']), array('class' => 'btn btn-xs btn-info')); ?>
                    <?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'jornadas', 'action' => 'delete', $jornada['id']), array('confirm' => __('Are you sure you want to delete # %s?', $jornada['id']), 'class' => 'btn btn-xs btn-info')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<div class="actions">
    <?php echo $this->Html->link(__('Nueva jornada'), array('controller' => 'jornadas', 'action' => 'add'), array('class' => 'btn btn-xs btn-info')); ?></ul>
</div>
<?php } ?>
