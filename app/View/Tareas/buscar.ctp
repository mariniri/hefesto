<?php if ($ajax != 1): ?>

    <h1>Buscar tareas</h1>
    <br>
    <div class="row">
        <?php echo $this->Form->create('Tarea', array('type' => 'GET')); ?>

        <div class="col-sm-4">
            <?php echo $this->Form->input('search', array('label' => false, 'type' => 'date', 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
        </div>

        <?php echo $this->Form->end(); ?>

    </div>
    <br><br>
<?php endif; ?>

<?php if (!empty($search)): ?>

    <?php if (!empty($tareas)): ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('estado'); ?></th>
                    <th><?php echo $this->Paginator->sort('total'); ?></th>
                    <th><?php echo $this->Paginator->sort('longitud'); ?></th>
                    <th><?php echo $this->Paginator->sort('latitud'); ?></th>
                    <th><?php echo $this->Paginator->sort('fecha'); ?></th>
                    <th><?php echo $this->Paginator->sort('direccion'); ?></th>

                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?php echo h($tarea['Tarea']['id']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['estado']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['total']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['longitud']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['latitud']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['fecha']); ?>&nbsp;</td>
                        <td><?php echo h($tarea['Tarea']['direccion']); ?>&nbsp;</td>

                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php if ($current_user['role'] != 'operario') { ?>
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $tarea['Tarea']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $tarea['Tarea']['id']), 'class' => 'btn btn-xs btn-info')); ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <h3>No se encontraron tareas</h3>

    <?php endif; ?>


    <?php if (!empty($jornadas)): ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('horaInicio'); ?></th>
                    <th><?php echo $this->Paginator->sort('horafin'); ?></th>
                    <th><?php echo $this->Paginator->sort('fecha'); ?></th>
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
                        <td>
                            <?php echo $this->Html->link($jornada['User']['apellidos'], array('controller' => 'users', 'action' => 'view', $jornada['User']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($jornada['Central']['dirección'], array('controller' => 'centrals', 'action' => 'view', $jornada['Central']['id'])); ?>
                        </td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $jornada['Jornada']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $jornada['Jornada']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $jornada['Jornada']['id']), array('confirm' => __('Seguro quieres eliminar a # %s?', $jornada['Jornada']['id']), 'class' => 'btn btn-xs btn-info')); ?>
                        </td>
                    <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <h3>No se encontraron jornadas</h3>

    <?php endif; ?>
<?php endif; ?>
