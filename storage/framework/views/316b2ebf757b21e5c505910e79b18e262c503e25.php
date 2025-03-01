

<?php $__env->startSection('title', 'Asesoria | Crear Proceso Cliente'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Crear Proceso Cliente</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">

            <?php echo Form::open(['route' => 'procesocliente.store']); ?>

            <div class="form-row">
                <div class="form-group col-md-4">
                  <small><?php echo Form::label('tipoproceso_id', 'Tipo Proceso'); ?></small> 
                  <?php echo Form::select('tipoproceso_id', $tipoprocesos, null,['class' => 'form-control mb-2']); ?>

                </div>
               
                  <?php echo Form::hidden('cliente_id', $cliente, ['class' => 'form-control mb-2']); ?>

              
                <div class="form-group col-md-4">
                  <small><?php echo Form::label('tipoproceso', 'Tipo de Proceso'); ?></small> 
                  <?php echo Form::select('proceso_id', $procesos, null,['class' => 'form-control mb-2']); ?>

                </div>
                <div class="form-group col-md-4">
                  <small><?php echo Form::label('fecpresentado', 'Fecha Presentacion Proceso'); ?> </small>
                  <?php echo Form::date('fecpresentado', null, ['class' => 'form-control mb-2']); ?>

              </div>
            </div>

            <div class="form-row">
              
              <div class="form-group col-md-4">
                  <small><?php echo Form::label('desicion_id', 'Tipo de Proceso'); ?></small> 
                  <?php echo Form::select('desicion_id', $desicion, null,['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-4">
                  <small><?php echo Form::label('fecdesicion', 'Fecha Desicion Proceso'); ?></small> 
                  <?php echo Form::date('fecdesicion', null, ['class' => 'form-control mb-2']); ?>

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <small><?php echo Form::label('user_id', 'Especialista'); ?></small> 
                <?php echo Form::select('user_id', $especialista, null,['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-4">
                <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small> 
                <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI'], null,['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-4">
                <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small> 
                <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI'], null,['class' => 'form-control mb-2']); ?>

              </div>
              
              <div class="form-group col-md-4">
                <small><?php echo Form::label('precioproceso', 'Precio Proceso'); ?></small> 
                <?php echo Form::text('precioproceso', null, ['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-4">
                <small><?php echo Form::label('abono', 'Abono'); ?></small> 
                <?php echo Form::text('abono', null, ['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-4">
                <small><?php echo Form::label('pendiente', 'pendiente'); ?></small> 
                <?php echo Form::text('pendiente', null, ['class' => 'form-control mb-2']); ?>

              </div>
              <div class="form-group col-md-12">
                <small><?php echo Form::label('observacion', 'Observacion'); ?></small> 
                <?php echo Form::text('observacion', null, ['class' => 'form-control mb-2']); ?>

              </div>
            </div>



            

            <?php echo Form::submit('Crear Proceso Cliente', ['class' => 'btn btn-primary float-right']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>

    <script>
      function sumar() {
          var a = parseInt(document.getElementById("precio").value) || 0;
          var b = parseInt(document.getElementById("abono").value) || 0;
          total = (parseInt(a) - parseInt(b));
          document.getElementById('pendiente').value = total;
      }

  </script>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/procesocliente/create.blade.php ENDPATH**/ ?>