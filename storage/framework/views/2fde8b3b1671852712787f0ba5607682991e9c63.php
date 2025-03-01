

<?php $__env->startSection('title', 'Asesoria | Crear Nueva Nota'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Crear Nueva Nota<a class="btn btn-success btn-sm float-right" href="<?php echo e(route('notas.index')); ?>"><i class="far fa-hand-point-left"></i> Volver</a></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <?php echo Form::open(['route' => 'notas.store']); ?>

            <small> <?php echo Form::label('nota', 'Titulo de nota'); ?></small>
            <?php echo Form::text('titulo', null, ['class' => 'form-control form-control-sm  mb-3']); ?>

            <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger font-weight-bold text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <small><?php echo Form::label('nota', 'Descripción de la nota'); ?></small>
            <?php echo Form::text('cuerpo', null, ['class' => 'form-control form-control-sm mb-3']); ?>


            <small><?php echo Form::label('nota', 'Tipo de Nota'); ?></small>
            <?php echo Form::select('alert', ['danger' => 'Urgente', 'info' => 'Información', 'warning' => 'Precaución', 'success' => 'Informativa'],null,['class' => 'form-control form-control-sm mb-3']); ?>

            
            <small><?php echo Form::label('parauser_id', 'Para Especialista'); ?></small>
            <?php echo Form::select('parauser_id', $users, null, ['class' => 'form-control form-control-sm mb-3']); ?>


            <small><?php echo Form::label('activo', 'Activo'); ?></small>
            <?php echo Form::checkbox('activo', 1, null, ['class' => 'mr-1'  ]); ?>

            

            <?php echo Form::hidden('deuser_id', auth()->user()->id , ['class' => 'form-control form-control-sm mb-3']); ?>

            <?php echo Form::submit('Crear Nueva Nota', ['class' => 'btn btn-primary float-right']); ?>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/nota/create.blade.php ENDPATH**/ ?>