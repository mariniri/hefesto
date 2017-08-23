
<?php if (count($tareas) > 0) { ?>
    <?php
    $this->Paginator->options(array(
        'update' => '#contenedor-tareas',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
    ));
    ?>
    <div id="contenedor-tareas">
        <div class="page-header">
            <h2><?php echo __('Mis tareas'); ?></h2>
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
                        <th><?php echo $this->Paginator->sort('horaInicio'); ?></th>
                        <th><?php echo $this->Paginator->sort('horaFin'); ?></th>
                        <th><?php echo $this->Paginator->sort('total'); ?></th>
                        <th><?php echo $this->Paginator->sort('direccion'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td><?php echo h($tarea['Tarea']['id']); ?>&nbsp;</td>
                            <td><?php echo h($tarea['Tarea']['estado']); ?>&nbsp;</td>
                            <td><?php echo h($tarea['Tarea']['horaInicio']); ?>&nbsp;</td>
                            <td><?php echo h($tarea['Tarea']['horaFin']); ?>&nbsp;</td>
                            <td><?php echo h($tarea['Tarea']['total']); ?>&nbsp;</td>
                            <td><?php echo h($tarea['Tarea']['direccion']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-info')); ?><br>
                                <?php if ($tarea['Tarea']['estado'] == 'asignada') { ?>
                                    <br><?php echo $this->Html->link(__('No puedo asistir'), array('action' => 'declinar', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-warning')); ?><br>
                                    <br><?php echo $this->Html->link(__('Finalizada'), array('action' => 'finalizar', $tarea['Tarea']['id']), array('class' => 'btn btn-xs btn-success')); ?><br>
                                <?php } ?>
                            </td>
                        </tr>
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
    </div> <!-- contenedor-->
    <?php } else{ ?>
    <div class="alert alert-info" role="alert">
        <strong>No tienes tareas programadas</strong> <br>
        Parece que no tienes tareas pendientes, tómate un descanso.
    </div>
    <?php echo $this->Html->link($this->Html->image("yeah.png", array("alt" => "alt-tag")),"#", array('class' => 'some-class', 'escape' => false));?>
<?php } ?>
