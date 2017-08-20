<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <?php echo $this->Form->create('Jornada'); ?>
                <h2><?php echo __('Agregar jornada'); ?></h2>
            </div>
            <fieldset>
                <?php
                //echo $this->Form->input('inicio', array('class' => 'form-control', 'label' => 'inicio'));
                //echo $this->Form->input('fin', array('class' => 'form-control', 'label' => 'Fin'));
                echo $this->Form->input('horaInicio', array('class' => 'form-control', 'label' => 'Hora inicio'));
                echo $this->Form->input('horafin', array('class' => 'form-control', 'label' => 'Hora fin'));
                // echo $this->Form->input('total', array('class' => 'form-control', 'label' => 'Total minutos'));
                echo $this->Form->input('fecha', array('class' => 'form-control', 'label' => 'Fecha'));
                // echo $this->Form->input('minutoslibres', array('class' => 'form-control', 'label' => 'Minutos libres'));
                echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Usuario'));
                echo $this->Form->input('central_id', array('class' => 'form-control', 'label' => 'Central'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Crear jornada', 'class' => 'btn btn-s btn-info')); ?>
        </div>
    </div>
</div>