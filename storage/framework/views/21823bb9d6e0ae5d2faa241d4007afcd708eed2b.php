

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>index</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th>Nombre Proceso</th>
            <th>Precio Proceso</th>
            <th>Observacion</th>
        </thead>
        <?php $__currentLoopData = $procesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($proceso->id); ?></td>
                <td><?php echo e($proceso->nombre); ?></td>
                <td><?php echo e($proceso->precio); ?></td>
                <td><?php echo e($proceso->observacion); ?></td>
                <td>
                    <a href="<?php echo e(route('precioproceso.show',$proceso->id)); ?>" class="btn btn-success btn-sm float-right mr-2" title="Mostrar"><i class="far fa-eye"></i></a>
                    <a href="<?php echo e(route('precioproceso.edit', $proceso->id)); ?>" class="btn btn-danger btn-sm float-right  mr-2" title="Editar"><i class="fa fa-pen"></i></a>
                </td>
            </tr>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/precioproceso/index.blade.php ENDPATH**/ ?>