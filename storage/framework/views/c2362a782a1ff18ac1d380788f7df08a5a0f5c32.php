

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">


    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DOCUMENTACIÓN PROCESO <?php echo e($proceso->proceso->nombre); ?> : <?php echo e($cliente->nombre); ?> <?php echo e($cliente->apellido); ?></h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php echo e(Form::open(array('route' => 'docuproceso.store', 'files' => true))); ?>

                <?php echo Form::hidden('usuario', $cliente->id); ?>

                <?php echo Form::hidden('proceso', $proceso->id); ?>

                <?php echo Form::file('archivoproceso[]', ['multiple' => true]); ?>

                <?php echo Form::submit('Subir Archivo',['class' => 'btn btn-primary btn-sm', 'float-right']); ?>

              <?php echo Form::close(); ?> 
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                          <th width='1px'>#</th>
                          <th ><small>Nombre del Archivo</small> </th>
                          <th width='1px'><small>Ver</small> </th>
                          <th width='1px'><small>Eliminar</small> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <th ><?php echo e($file->id); ?></th>
                              <td><?php echo e($file->name); ?></td>
                              <td >
                                <a target="_blank" href="<?php echo e(route('docuproceso.edit',$file->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
                              </td>
                              <td >
                                  <form action="<?php echo e(route('docuproceso.destroy',$file->id)); ?>" method="POST" class="formulario-eliminar">
                                    <?php echo method_field('DELETE'); ?>
                                      <?php echo csrf_field(); ?>
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
                                  </form>
                              </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/docuproceso/create.blade.php ENDPATH**/ ?>