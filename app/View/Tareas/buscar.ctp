<?php if ($ajax != 1): ?>

    <h1>Buscar tareas</h1>
    <br>
    <div class="row">
        <?php echo $this->Form->create('Tarea', array('type' => 'GET')); ?>

        <div class="col-sm-6">
            <?php echo $this->Form->input('search', array('label' => 'Fecha planificación', 'type' => 'date', 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
    </div>
    <div class="row">
        <?php if (!empty($central)) { ?>
            <div class="col-sm-6">
                <?php echo $this->Form->input('central', array('class' => 'form-control', 'label' => 'Central', 'type' => 'select', 'options' => $centrals, 'default' => $central)); ?>
            </div>
        <?php } else { ?>
            <div class="col-sm-6">
                <?php echo $this->Form->input('central', array('class' => 'form-control', 'label' => 'Central', 'type' => 'select', 'options' => $centrals)); ?>
            </div>
        <?php } ?>
    </div><br>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
    <br><br>
<?php endif; ?>

<?php if (!empty($search)): ?>
    <?php if (!empty($tareas)): ?>
    
        <h3>Tareas disponibles</h3>
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


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <h5>No se encontraron tareas</h5>

    <?php endif; ?>


    <?php if (!empty($jornadas)): ?>
        <h3>Jornadas disponibles</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('horaInicio'); ?></th>
                    <th><?php echo $this->Paginator->sort('horafin'); ?></th>
                    <th><?php echo $this->Paginator->sort('fecha'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($jornadas as $jornada): ?>
                    <tr>
                        <td><?php echo h($jornada['Jornada']['id']); ?>&nbsp;</td>
                        <td><?php echo h($jornada['Jornada']['horaInicio']); ?>&nbsp;</td>
                        <td><?php echo h($jornada['Jornada']['horafin']); ?>&nbsp;</td>
                        <td><?php echo h($jornada['Jornada']['fecha']); ?>&nbsp;</td>

                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h5>No se encontraron jornadas</h5>
    <?php endif; ?>
    <?php
endif;
if (!empty($jornadas) && !empty($tareas) && !empty($central)) {
    echo $this->Html->link(__('Iniciar planificador'), array('action' => 'planificar'), array('class' => 'btn btn-success'));
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        Para iniciar el planificador es necesario disponer de tareas y jornadas para la fecha seleccionada.
    </div>
    <?php
}
?>