

<?php $__env->startSection('title', 'Editar Precio Proceso'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Mostrar Precio Proceso: <strong><?php echo e($proceso->nombre); ?></strong> </h3><a class="btn btn-primary btn-sm float-right" href="<?php echo e(route('precioproceso.index')); ?>"><i class="far fa-hand-point-left"></i> Volver</a> 
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php echo Form::model($proceso, ['route' => ['precioproceso.update', $proceso],'method' => 'PUT']); ?>

        
        <small><?php echo Form::label('precio', 'Precio €'); ?></small>
        <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <br>
        <span class="badge badge-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php echo Form::text('precio', null, ['class' => 'form-control mb-2','autofocus']); ?>

        <small><?php echo Form::label('obs', 'Observacion'); ?></small>
        <?php echo Form::text('observacion', null, ['class' => 'form-control mb-2','autofocus']); ?>

        <?php echo Form::submit('Actualizar Precio Proceso', ['class' => 'btn btn-danger float-right']); ?>

        <?php echo Form::close(); ?>



        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/precioproceso/edit.blade.php ENDPATH**/ ?>