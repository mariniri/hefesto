<?php
$this->Paginator->options(array(
    'update' => '#contenedor-centrals',
    'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
));
?>
<div id="contenedor-centrals">
    <div class="page-header">
        <h2><?php echo __('Centrales'); ?></h2>
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
                <th><?php echo $this->Paginator->sort('latitud'); ?></th>
                <th><?php echo $this->Paginator->sort('longitud'); ?></th>
                <th><?php echo $this->Paginator->sort('dirección'); ?></th>

                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($centrals as $central): ?>
                <tr>
                    <td><?php echo h($central['Central']['id']); ?>&nbsp;</td>
                    <td><?php echo h($central['Central']['latitud']); ?>&nbsp;</td>
                    <td><?php echo h($central['Central']['longitud']); ?>&nbsp;</td>
                    <td><?php echo h($central['Central']['dirección']); ?>&nbsp;</td>

                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $central['Central']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php if ($current_user['role'] != 'operario') { ?>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $central['Central']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $central['Central']['id']), array('confirm' => __('Seguro que quieres eliminar a # %s?', $central['Central']['id']), 'class' => 'btn btn-xs btn-info')); ?>
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
</div> <!-- contene-->