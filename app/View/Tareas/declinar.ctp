<?php if ($tarea['Tarea']['estado'] == 'asignada') { ?>

    <div class="page-header">
        <div class="alert alert-warning" role="alert">
            <strong>Tu tarea ha sido reubicada</strong><br>
            Esta es la nueva información de tu tarea.
        </div>
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

    <?php
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        <strong>No hemos podido reubicar tu tarea</strong><br>
        Tu tarea queda como 'declinada' hasta que un supervisor decida qué hacer.
    </div>
    <?php
}
