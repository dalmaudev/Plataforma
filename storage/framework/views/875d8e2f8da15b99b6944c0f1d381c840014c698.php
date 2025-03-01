

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::open(['route' => 'consulta.store']); ?>

<div class="card">
    <div class="row">
<div class="col-3">
    <div class="form-group ml-4">
      <small><?php echo Form::label('fecalert', 'Fecha de la Consulta'); ?> </small>
      <?php echo Form::date('fecalert', \Carbon\Carbon::now() , ['class' => 'form-control']); ?>

      <?php $__errorArgs = ['fecalert'];
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
</div>
<div class="col-8">
    <div class="form-group">
        <small><?php echo Form::label('consulta', 'Detalles de la Consulta'); ?> <span class="text-danger"><strong>*</strong></span></small>
        <?php echo Form::text('consulta', null, ['class' => 'form-control', 'autofocus']); ?>

        <?php $__errorArgs = ['consulta'];
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
</div>
</div>

</div>
<?php echo Form::hidden('cliente_id', $ide, ['class' => 'form-control mb-2']); ?>

<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Crear Consulta">
  </div>
<?php echo Form::close(); ?>


<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="8%">Consulta</th>
                                <th width="90%"></th>
                                <th width="1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $numconsul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td>
        
                                        <a  href="<?php echo e(route('consulta.edit', $file->id)); ?>"
                                            class="btn btn-sm"><?php echo e($file->fecalert); ?></a>
                                    </td>
                                    <td>
        
                                        <a  href="<?php echo e(route('consulta.edit', $file->id)); ?>"
                                            class="btn btn-sm"><?php echo e($file->consulta); ?></a>
                                    </td>
                                    <td>
                                        <a  href="<?php echo e(route('consulta.edit', $file->id)); ?>"
                                            class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
        
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('consulta.destroy', $file->id)); ?>" method="POST"
                                            class="formulario-eliminar">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/consulta/create.blade.php ENDPATH**/ ?>