

<?php $__env->startSection('title', 'Asesoria | Mostrar Pais'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Ver Pais <a class="btn btn-success btn-sm float-right" href="<?php echo e(route('pais.index')); ?>"><i class="far fa-hand-point-left"></i> Volver</a></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre Pais</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="10px"><?php echo e($pai->id); ?></td>
                    <td><?php echo e($pai->nombre); ?></td>
                  </tr>
                 
                </tbody>
              </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/pais/show.blade.php ENDPATH**/ ?>