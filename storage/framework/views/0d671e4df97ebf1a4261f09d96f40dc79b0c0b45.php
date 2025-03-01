

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Control de Llamadas (Historial) <strong><?php echo e(ucfirst(trans($llamada->nombre))); ?>

                            <?php echo e(ucfirst(trans($llamada->apellido))); ?> / <?php echo e($llamada->telefono); ?></strong>
                          
                            <?php if($llamada->afiliado): ?>
                            <i class="fas fa-user-check"></i> Afiliado desde (<?php echo e(\Carbon\Carbon::parse($llamada->fecafiliado)->format('d-m-Y')); ?>)
                            <?php endif; ?>
                          
                          
                          </h3>
                    <a href="<?php echo e(route('llamada.crearllamada', $llamada->id)); ?>"
                        class="btn btn-sm btn-info float-right ml-2">Crear Nueva Consulta</a>
                    <?php if($llamada->cliente == 1): ?>
                        <a href="<?php echo e(route('cliente.edit', $llamada->id)); ?>" class="btn btn-sm btn-success float-right"><i
                                class="fas fa-check"></i> Ver ficha cliente</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('llamada.crear', $llamada->id)); ?>" class="btn btn-sm btn-warning float-right">Crear
                            ficha cliente</a>
                    <?php endif; ?>

                    <?php if($llamada->afiliado == 1): ?>
                        <a href="<?php echo e(route('llamada.crearafiliado', $llamada->id)); ?>"
                            class="btn btn-sm btn-success float-right mr-2"><i
                            class="fas fa-check"></i> Ver ficha Afiliado (<?php echo e(\Carbon\Carbon::parse($llamada->fecafiliado)->format('d-m-Y')); ?>)</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('llamada.crearafiliado', $llamada->id)); ?>"
                            class="btn btn-sm btn-warning float-right mr-2">Crear ficha Afiliado</a>
                    <?php endif; ?>


                </div>
                <div class="card-body ">
                    <table class="table table-striped table-sm">
                        <thead>
                            <th>#</th>
                            <th>Consulta</th>
                            <td></td>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $llam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <?php $__errorArgs = ['consulta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <td><?php echo e($item->consulta); ?></td>

                                    
                                    <?php $__errorArgs = ['fecllam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <td><?php echo e(\Carbon\Carbon::parse($item->fecllam)->format('d-m-Y')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('llamada.ver', $item->id)); ?>"
                                            class="btn btn-success btn-sm float-right mr-2" title="Mostrar"><i
                                                class="far fa-eye"></i></a>
                                        <a href="<?php echo e(route('llamada.edit', $item->id)); ?>"
                                            class="btn btn-danger btn-sm float-right  mr-2" title="Editar"><i
                                                class="fa fa-pen"></i></a>
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
            <script>
                console.log('Hi!');
            </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/llamada/show.blade.php ENDPATH**/ ?>