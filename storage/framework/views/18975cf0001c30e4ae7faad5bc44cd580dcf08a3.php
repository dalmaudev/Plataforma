<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::open(['route' => 'alerta.store']); ?>

<div class="card">
    <div class="card-body row">
      <div class="col-5 text-center d-flex align-items-center justify-content-center">
        <div class="">
          <h2><strong>Alerta</strong></h2>
          <p class="lead mb-5"><?php echo e($nombre->nombre); ?> <?php echo e($nombre->apellido); ?><br>
            Teléfono: <?php echo e($nombre->telefono); ?>

          </p>
        </div>
      </div>

      <div class="col-7">
        <div class="form-group">
          <small><?php echo Form::label('titulo', 'Titulo de la Alerta'); ?> <span class="text-danger"><strong>*</strong></span></small>
          <?php echo Form::text('titulo', null, ['class' => 'form-control form-control-sm', 'autofocus']); ?>

          <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><strong><small><?php echo e($message); ?></small></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <?php echo Form::hidden('cliente_id', $cliente, ['class' => 'form-control form-control-sm mb-2']); ?>

        <div class="form-group">
            <small><?php echo Form::label('cuerpo', 'Mensaje'); ?> <span class="text-danger"><strong>*</strong></span></small>
            <?php echo Form::text('cuerpo', null, ['class' => 'form-control form-control-sm']); ?>

            
    </div>

        <div class="form-group">
            <small><?php echo Form::label('fecha', 'Fecha de Cumplimiento'); ?> </small>
            <?php echo Form::date('fecalert', \Carbon\Carbon::now() , ['class' => 'form-control form-control-sm']); ?>

        </div>
<input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="deuser_id">
        <div class="form-group">
            <small><?php echo Form::label('parauser_id', 'Para Especialista'); ?> </small>
            <?php echo Form::select('parauser_id', $list, null, ['class' => 'form-control form-control-sm']); ?>

        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Crear Alerta">
        </div>
      </div>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/alerta/create.blade.php ENDPATH**/ ?>