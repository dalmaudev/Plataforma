

<?php $__env->startSection('title', 'Consulta LLamada'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Datos Consulta de LLamadas</h3>
      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <span class="badge badge-success">Cliente id: <?php echo e($cliente->id); ?></span>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <tbody>
              <tr class="table-warning" >
                <th width="10%">Nombre Cliente</th>
                <td><?php echo e(ucfirst(trans($cliente->nombre))); ?> <?php echo e(ucfirst(trans($cliente->apellido))); ?></td>
              </tr>
              <tr>
                <th class="table-success">Telefono</th>
                <td class="table-success"><?php echo e($cliente->telefono); ?></td>
              </tr>
              <tr>
                <th class="table-primary">Fecha Llamada</th>
                <td class="table-primary"><?php echo e($llamada->fecllam); ?></td>
              </tr>
              <tr>
                <th  class="table-success">Consulta</th>
                <td  class="table-success"><?php echo e(ucfirst(trans($llamada->consulta))); ?></td>
                
              </tr>
            </tbody>
          </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <a href="<?php echo e(route('llamada.show', $cliente->id)); ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->



  <div>
    
  </div>

  
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/llamada/ver.blade.php ENDPATH**/ ?>