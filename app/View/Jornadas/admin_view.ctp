<div class="page-header">
    <h2><?php echo __('Ver Jornada'); ?></h2>
</div>
<div class="well">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Inicio'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['inicio']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fin'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['fin']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('HoraInicio'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['horaInicio']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Horafin'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['horafin']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['total']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fecha'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['fecha']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Minutoslibres'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['minutoslibres']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($jornada['Jornada']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($jornada['User']['apellidos'], array('controller' => 'users', 'action' => 'view', $jornada['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Central'); ?></dt>
        <dd>
            <?php echo $this->Html->link($jornada['Central']['dirección'], array('controller' => 'centrals', 'action' => 'view', $jornada['Central']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
    <?php echo $this->Html->link(__('Editar jornada'), array('action' => 'edit', $jornada['Jornada']['id']), array('class' => 'btn btn-xs btn-info')); ?> <br>
    <?php echo $this->Form->postLink(__('Eliminar jornada'), array('action' => 'delete', $jornada['Jornada']['id']), array('confirm' => __('Seguro quieres eliminar a # %s?', $jornada['Jornada']['id']), 'class' => 'btn btn-xs btn-info')); ?> <br>


    <h4><?php echo __('Informes asignados'); ?></h4>
    <?php if (!empty($jornada['Informe'])): ?>
        <table class="table table-bordered">

            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Descripcion'); ?></th>
                <th><?php echo __('Datos'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Jornada Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($jornada['Informe'] as $informe): ?>
                <tr>
                    <td><?php echo $informe['id']; ?></td>
                    <td><?php echo $informe['nombre']; ?></td>
                    <td><?php echo $informe['descripcion']; ?></td>
                    <td><?php echo $informe['datos']; ?></td>
                    <td><?php echo $informe['created']; ?></td>
                    <td><?php echo $informe['modified']; ?></td>
                    <td><?php echo $informe['jornada_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), array('controller' => 'informes', 'action' => 'view', $informe['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Html->link(__('Editar'), array('controller' => 'informes', 'action' => 'edit', $informe['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'informes', 'action' => 'delete', $informe['id']), array('confirm' => __('Seguro quieres eliminar a # %s?', $informe['id']), 'class' => 'btn btn-xs btn-info')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <?php echo $this->Html->link(__('Nuevo informe'), array('controller' => 'informes', 'action' => 'add'), array('class' => 'btn btn-xs btn-info')); ?> </li>

    </div>

    <h4><?php echo __('Tareas asignadas'); ?></h4>
    <?php if (!empty($jornada['Tarea'])): ?>
        <table class="table table-bordered">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Estado'); ?></th>
                <th><?php echo __('Inicio'); ?></th>
                <th><?php echo __('Fin'); ?></th>
                <th><?php echo __('HoraInicio'); ?></th>
                <th><?php echo __('HoraFin'); ?></th>
                <th><?php echo __('Total'); ?></th>
                <th><?php echo __('Longitud'); ?></th>
                <th><?php echo __('Latitud'); ?></th>
                <th><?php echo __('DistanciaCentral'); ?></th>
                <th><?php echo __('Fecha'); ?></th>
                <th><?php echo __('Direccion'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Jornada Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($jornada['Tarea'] as $tarea): ?>
                <tr>
                    <td><?php echo $tarea['id']; ?></td>
                    <td><?php echo $tarea['estado']; ?></td>
                    <td><?php echo $tarea['inicio']; ?></td>
                    <td><?php echo $tarea['fin']; ?></td>
                    <td><?php echo $tarea['horaInicio']; ?></td>
                    <td><?php echo $tarea['horaFin']; ?></td>
                    <td><?php echo $tarea['total']; ?></td>
                    <td><?php echo $tarea['longitud']; ?></td>
                    <td><?php echo $tarea['latitud']; ?></td>
                    <td><?php echo $tarea['distanciaCentral']; ?></td>
                    <td><?php echo $tarea['fecha']; ?></td>
                    <td><?php echo $tarea['direccion']; ?></td>
                    <td><?php echo $tarea['created']; ?></td>
                    <td><?php echo $tarea['modified']; ?></td>
                    <td><?php echo $tarea['jornada_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), array('controller' => 'tareas', 'action' => 'view', $tarea['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Html->link(__('Editar'), array('controller' => 'tareas', 'action' => 'edit', $tarea['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'tareas', 'action' => 'delete', $tarea['id']), array('confirm' => __('Seguro quieres eliminar # %s?', $tarea['id']), 'class' => 'btn btn-xs btn-info')); ?>
                    </td>
                </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<div class="actions">
    <?php echo $this->Html->link(__('Nueva tarea'), array('controller' => 'tareas', 'action' => 'add'), array('class' => 'btn btn-xs btn-info')); ?></ul>
</div>
