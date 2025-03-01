

<?php $__env->startSection('title', 'Asesoria | Mostrar Pais'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Ver Proceso Cliente <a class="btn btn-success btn-sm float-right" href="<?php echo e(route('procesocliente.index')); ?>"><i class="far fa-hand-point-left"></i> Volver</a></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::model($procesocliente, ['route' => ['procesocliente.update', $procesocliente],'method' => 'PUT']); ?>




<?php if($cliente->numseguridad == ''): ?>
<div class="form-row">
  <div class="form-group col-md-3">
    <small><?php echo Form::label('tipoproceso_id', 'Proceso'); ?></small> 
    <?php echo Form::select('tipoproceso_id', $tipoprocesos, null,['class' => 'form-control mb-2', 'readonly']); ?>

  </div>
  <div class="form-group col-md-3">
    <small><?php echo Form::label('tipoproceso', 'Tipo de Proceso'); ?></small> 
    <?php echo Form::select('proceso_id', $procesos, null,['class' => 'form-control mb-2', 'readonly']); ?>

  </div>
  <div class="form-group col-md-3">
    <small><?php echo Form::label('fecpresentado', 'Fecha Presentacion Proceso'); ?> </small>
    <?php echo Form::date('fecpresentado', null, ['class' => 'form-control mb-2', 'readonly']); ?>

  </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    <small><?php echo Form::label('desicion_id', 'Tipo de Proceso'); ?></small> 
    <?php echo Form::select('desicion_id', $desicion, null,['class' => 'form-control mb-2', 'readonly']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('fecdesicion', 'Fecha Desicion Proceso'); ?></small> 
    <?php echo Form::date('fecdesicion', null, ['class' => 'form-control mb-2', 'readonly']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('user_id', 'Especialista'); ?></small> 
    <?php echo Form::select('user_id', $especialista, null,['class' => 'form-control mb-2', 'readonly']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small> 
    <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null,['class' => 'form-control mb-2', 'readonly']); ?>

    </div>
    <div class="form-group col-md-1">
    <small><?php echo Form::label('precioproceso', 'Valor Proceso'); ?></small> 
    <?php echo Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio' , 'readonly']); ?>

    </div>
    <div class="form-group col-md-1">
      <small><?php echo Form::label('abono', 'Abono'); ?></small>
      <?php echo Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono','onkeyup'=>'sumar()', 'readonly' ]); ?>

    </div>
    <div class="form-group col-md-1">
      <small><?php echo Form::label('pendiente', 'Pendiente'); ?></small>
      <?php echo Form::text('pendiente', null, ['class' => 'form-control','id' => 'pendiente', 'readonly', 'readonly' ]); ?>

    </div>
    <div class="form-group col-md-9">
      <small><?php echo Form::label('observacion', 'Observaciones'); ?></small>
      <?php echo Form::text('observacion', null, ['class' => 'form-control', 'readonly' ]); ?>

    </div>
    </div>

<?php else: ?>
<div class="form-row">
  <div class="form-group col-md-3">
    <small><?php echo Form::label('tipoproceso_id', 'Proceso'); ?></small> 
    <?php echo Form::select('tipoproceso_id', $tipoprocesos, null,['class' => 'form-control mb-2']); ?>

  </div>
  <div class="form-group col-md-3">
    <small><?php echo Form::label('tipoproceso', 'Tipo de Proceso'); ?></small> 
    <?php echo Form::select('proceso_id', $procesos, null,['class' => 'form-control mb-2']); ?>

  </div>
  <div class="form-group col-md-3">
    <small><?php echo Form::label('fecpresentado', 'Fecha Presentacion Proceso'); ?> </small>
    <?php echo Form::date('fecpresentado', null, ['class' => 'form-control mb-2']); ?>

  </div>
  <div class="form-group col-md-3">
  <small><?php echo Form::label('auto', 'Autonomo'); ?>  </small><br>
  <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
    Autonomo
  </a>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    <small><?php echo Form::label('desicion_id', 'Tipo de Proceso'); ?></small> 
    <?php echo Form::select('desicion_id', $desicion, null,['class' => 'form-control mb-2']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('fecdesicion', 'Fecha Desicion Proceso'); ?></small> 
    <?php echo Form::date('fecdesicion', null, ['class' => 'form-control mb-2']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('user_id', 'Especialista'); ?></small> 
    <?php echo Form::select('user_id', $especialista, null,['class' => 'form-control mb-2']); ?>

    </div>
    <div class="form-group col-md-3">
    <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small> 
    <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null,['class' => 'form-control mb-2']); ?>

    </div>
    <div class="form-group col-md-1">
    <small><?php echo Form::label('precioproceso', 'Valor Proceso'); ?></small> 
    <?php echo Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio' ]); ?>

    </div>
    <div class="form-group col-md-1">
      <small><?php echo Form::label('abono', 'Abono'); ?></small>
      <?php echo Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono','onkeyup'=>'sumar()' ]); ?>

    </div>
    <div class="form-group col-md-1">
      <small><?php echo Form::label('pendiente', 'Pendiente'); ?></small>
      <?php echo Form::text('pendiente', null, ['class' => 'form-control','id' => 'pendiente', 'readonly' ]); ?>

    </div>
    <div class="form-group col-md-9">
      <small><?php echo Form::label('observaciones', 'Observaciones'); ?></small>
      <?php echo Form::text('observacion', null, ['class' => 'form-control' ]); ?>

    </div>
    </div>

<?php endif; ?>



  
  <div class="collapse" id="collapse2">
    <div class="card card-body">
      <div class="row">
        <div class="form-group col-md-1">
          <small><?php echo Form::label('certdigital', 'Certificado Digital'); ?>  </small>
          <?php echo Form::text('certdigital',$cliente->certdigital ,['class' => 'form-control mb-2', 'readonly']); ?>

        </div>
        <div class="form-group col-md-3">
          <small><?php echo Form::label('domifiscal', 'Domicilio Fiscal'); ?>  </small>
          <?php echo Form::text('domifiscal', $cliente->domifiscal, ['class' => 'form-control', 'readonly' ]); ?>

        </div>
        <div class="form-group col-md-2">
          <small><?php echo Form::label('altaautonomo', 'Alta Autonomo'); ?>  </small>
          <?php echo Form::date('altaautonomo', $cliente->altaautonomo, ['class' => 'form-control', 'readonly' ]); ?>

        </div>
        <div class="form-group col-md-2">
          <small><?php echo Form::label('numseguridad', 'Nº Seguridad Social'); ?>  </small>
          <?php echo Form::text('numseguridad', $cliente->numseguridad, ['class' => 'form-control', 'readonly' ]); ?>

        </div>
        <div class="form-group col-md-2">
          <small><?php echo Form::label('cuentabanco', 'Cuenta Bancaria'); ?>  </small>
          <?php echo Form::text('cuentabanco', $cliente->cuentabanco, ['class' => 'form-control' , 'readonly']); ?>

        </div>
        <div class="form-group col-md-2">
          <small><?php echo Form::label('titularbanco', 'Titular Cuenta Bancaria'); ?>  </small>
          <?php echo Form::text('titularbanco', $cliente->titularbanco, ['class' => 'form-control', 'readonly' ]); ?>

        </div>
      </div>
      
    </div>
  </div>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/procesocliente/show.blade.php ENDPATH**/ ?>