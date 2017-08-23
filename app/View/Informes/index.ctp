<?php
$this->Paginator->options(array(
    'update' => '#contenedor-informes',
    'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
));
?>
<div id="contenedor-informes">
    <div class="page-header">
        <h2><?php echo __('Informes'); ?></h2>
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
                    <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                    <th><?php echo $this->Paginator->sort('descripcion'); ?></th>
                    <th><?php echo $this->Paginator->sort('datos'); ?></th>
                    <th><?php echo $this->Paginator->sort('jornada_id'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informes as $informe): ?>
                    <tr>
                        <td><?php echo h($informe['Informe']['id']); ?>&nbsp;</td>
                        <td><?php echo h($informe['Informe']['nombre']); ?>&nbsp;</td>
                        <td><?php echo h($informe['Informe']['descripcion']); ?>&nbsp;</td>
                        <td><?php echo h($informe['Informe']['datos']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($informe['Jornada']['horaInicio'], array('controller' => 'jornadas', 'action' => 'view', $informe['Jornada']['id'])); ?>
                        </td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $informe['Informe']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php if ($current_user['role'] != 'operario') { ?>
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $informe['Informe']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $informe['Informe']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $informe['Informe']['id']), 'class' => 'btn btn-xs btn-info')); ?>
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
</div> <!-- contenedor-informes -->