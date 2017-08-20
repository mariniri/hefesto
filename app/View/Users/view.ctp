<div class="page-header">
    <?php if ($current_user['role'] == 'admin') { ?>
        <h2><?php echo __('Ver usuario'); ?></h2>
    <?php } else { ?>
        <h2><?php echo __('Ver operario'); ?></h2>
    <?php } ?>
</div>
<div class="well">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nombre'); ?></dt>
        <dd>
            <?php echo h($user['User']['nombre']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Apellidos'); ?></dt>
        <dd>
            <?php echo h($user['User']['apellidos']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Telefono'); ?></dt>
        <dd>
            <?php echo h($user['User']['telefono']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Role'); ?></dt>
        <dd>
            <?php echo h($user['User']['role']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php if ($current_user['role'] == 'admin') { ?>
    <?php echo $this->Html->link(__('Editar usuario'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-xs btn-info')); ?><br>
    <?php echo $this->Form->postLink(__('Eliminar usuario'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $user['User']['id']), 'class' => 'btn btn-xs btn-info')); ?>


    <h4><?php echo __('Jornadas asignadas'); ?></h4>
    <?php if (!empty($user['Jornada'])): ?>
        <table class="table table-bordered">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('HoraInicio'); ?></th>
                <th><?php echo __('Horafin'); ?></th>
                <th><?php echo __('Fecha'); ?></th>
                <th><?php echo __('User Id'); ?></th>
                <th><?php echo __('Central Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($user['Jornada'] as $jornada): ?>
                <tr>
                    <td><?php echo $jornada['id']; ?></td>
                    <td><?php echo $jornada['horaInicio']; ?></td>
                    <td><?php echo $jornada['horafin']; ?></td>
                    <td><?php echo $jornada['fecha']; ?></td>
                    <td><?php echo $jornada['user_id']; ?></td>
                    <td><?php echo $jornada['central_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), array('controller' => 'jornadas', 'action' => 'view', $jornada['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Html->link(__('Editar'), array('controller' => 'jornadas', 'action' => 'edit', $jornada['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'jornadas', 'action' => 'delete', $jornada['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $jornada['id']), 'class' => 'btn btn-xs btn-info')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <?php echo $this->Html->link(__('Nueva jornada'), array('controller' => 'jornadas', 'action' => 'add'), array('class' => 'btn btn-xs btn-info')); ?></ul>
    </div>
    <?php
}?>