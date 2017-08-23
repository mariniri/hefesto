<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Tarea'); ?>
                <h2><?php echo __('Agregar tarea'); ?></h2>
            </div>
            <fieldset>
                <?php
                //echo $this->Form->input('estado', array('class' => 'form-control', 'label' => 'Estado','type' => 'select', 'options' => array( 'pendiente' => 'Pendiente','planificada' => 'Planificada','asignada' => 'Asignada')));
                //echo $this->Form->input('inicio', array('class' => 'form-control', 'label' => 'Inicio'));
                //echo $this->Form->input('fin', array('class' => 'form-control', 'label' => 'Fin'));
                //echo $this->Form->input('horaInicio', array('class' => 'form-control', 'label' => 'Hora inicio'));
                //echo $this->Form->input('horaFin', array('class' => 'form-control', 'label' => 'Hora fin'));
                echo $this->Form->input('total', array('class' => 'form-control', 'label' => 'Duración estimada'));
                echo $this->Form->input('latitud', array('class' => 'form-control', 'label' => 'Latitud'));
                echo $this->Form->input('longitud', array('class' => 'form-control', 'label' => 'Longitud'));
                //echo $this->Form->input('distanciaCentral', array('class' => 'form-control', 'label' => 'Distancia a la central'));
                echo $this->Form->input('fecha', array('class' => 'form-control', 'label' => 'Fecha'));
                echo $this->Form->input('direccion', array('class' => 'form-control', 'label' => 'Dirección'));
                //echo $this->Form->input('jornada_id', array('class' => 'form-control', 'label' => 'Jornada'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear tarea', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>