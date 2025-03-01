

<?php $__env->startSection('title', 'Asesoria | Editar Pais'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar Proceso Cliente : <?php echo e($cliente->nombre); ?> <?php echo e($cliente->apellido); ?><a
            class="btn btn-success btn-sm float-right" href="<?php echo e(route('procesocliente.index')); ?>"><i
                class="far fa-hand-point-left"></i> Volver</a></h1>
    <hr>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($procesocliente, ['route' => ['procesocliente.update', $procesocliente], 'method' => 'PUT']); ?>




    <?php if($cliente->numseguridad == ''): ?>
        <div class="form-row">
            <div class="form-group col-md-3">
                <small><?php echo Form::label('tipoproceso_id', 'Proceso'); ?></small>
                <?php echo Form::select('tipoproceso_id', $tipoprocesos, null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['tipoproceso_id'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('tipoproceso', 'Tipo de Proceso'); ?></small>
                <?php echo Form::select('proceso_id', $procesos, null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['proceso_id'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('fecpresentado', 'Fecha Presentacion Proceso'); ?> </small>
                <?php echo Form::date('fecpresentado', null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['fecpresentado'];
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
        <div class="form-row">
            <div class="form-group col-md-3">
                <small><?php echo Form::label('desicion_id', 'Tipo de Proceso'); ?></small>
                <?php echo Form::select('desicion_id', $desicion, null, ['class' => 'form-control mb-2']); ?>

            </div>
            <div class="form-group col-md-3">
                <small><?php echo Form::label('fecdesicion', 'Fecha Desicion Proceso'); ?></small>
                <?php echo Form::date('fecdesicion', null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['fecdesicion'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('user_id', 'Especialista'); ?></small>
                <?php echo Form::select('user_id', $especialista, null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['user_id'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small>
                <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['pagoconsulta'];
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
            <div class="form-group col-md-1">
                <small><?php echo Form::label('precioproceso', 'Valor Proceso'); ?></small>
                <?php echo Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio']); ?>

                <?php $__errorArgs = ['precioproceso'];
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
            <div class="form-group col-md-1">
                <small><?php echo Form::label('abono', 'Abono'); ?></small>
                <?php echo Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono', 'onkeyup' => 'sumar()']); ?>

                <?php $__errorArgs = ['abono'];
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
            <div class="form-group col-md-1">
                <small><?php echo Form::label('pendiente', 'Pendiente'); ?></small>
                <?php echo Form::text('pendiente', null, ['class' => 'form-control', 'id' => 'pendiente', 'readonly']); ?>

                <?php $__errorArgs = ['pendiente'];
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
            <div class="form-group col-md-9">
                <small><?php echo Form::label('observacion', 'Observaciones'); ?></small>
                <?php echo Form::text('observacion', null, ['class' => 'form-control']); ?>

                <?php $__errorArgs = ['observacion'];
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

    <?php else: ?>
        <div class="form-row">
            <div class="form-group col-md-3">
                <small><?php echo Form::label('tipoproceso_id', 'Proceso'); ?></small>
                <?php echo Form::select('tipoproceso_id', $tipoprocesos, null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['tipoproceso_id'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('tipoproceso', 'Tipo de Proceso'); ?></small>
                <?php echo Form::select('proceso_id', $procesos, null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['proceso_id'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('fecpresentado', 'Fecha Presentacion Proceso'); ?> </small>
                <?php echo Form::date('fecpresentado', null, ['class' => 'form-control mb-2']); ?>

                <?php $__errorArgs = ['fecpresentado'];
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
            <div class="form-group col-md-3">
                <small><?php echo Form::label('auto', 'Autonomo'); ?> </small><br>
                <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Autonomo
                </a>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <small><?php echo Form::label('desicion_id', 'Tipo de Proceso'); ?></small>
                <?php echo Form::select('desicion_id', $desicion, null, ['class' => 'form-control mb-2']); ?>

            </div>
            <div class="form-group col-md-3">
                <small><?php echo Form::label('fecdesicion', 'Fecha Desicion Proceso'); ?></small>
                <?php echo Form::date('fecdesicion', null, ['class' => 'form-control mb-2']); ?>

            </div>
            <div class="form-group col-md-3">
                <small><?php echo Form::label('user_id', 'Especialista'); ?></small>
                <?php echo Form::select('user_id', $especialista, null, ['class' => 'form-control mb-2']); ?>

            </div>
            <div class="form-group col-md-3">
                <small><?php echo Form::label('pagoconsulta', 'Pago de la Consulta'); ?></small>
                <?php echo Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null, ['class' => 'form-control mb-2']); ?>

            </div>
            <div class="form-group col-md-1">
                <small><?php echo Form::label('precioproceso', 'Valor Proceso'); ?></small>
                <?php echo Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio']); ?>

            </div>
            <div class="form-group col-md-1">
                <small><?php echo Form::label('abono', 'Abono'); ?></small>
                <?php echo Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono', 'onkeyup' => 'sumar()']); ?>

            </div>
            <div class="form-group col-md-1">
                <small><?php echo Form::label('pendiente', 'Pendiente'); ?></small>
                <?php echo Form::text('pendiente', null, ['class' => 'form-control', 'id' => 'pendiente', 'readonly']); ?>

            </div>
            <div class="form-group col-md-9">
                <small><?php echo Form::label('observaciones', 'Observaciones'); ?></small>
                <?php echo Form::text('observacion', null, ['class' => 'form-control']); ?>

            </div>
        </div>

    <?php endif; ?>



    
    <div class="collapse" id="collapse2">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('certdigital', 'Certificado Digital'); ?> </small>
                    <?php echo Form::text('certdigital', $cliente->certdigital, ['class' => 'form-control mb-2', 'readonly']); ?>

                </div>
                <div class="form-group col-md-3">
                    <small><?php echo Form::label('domifiscal', 'Domicilio Fiscal'); ?> </small>
                    <?php echo Form::text('domifiscal', $cliente->domifiscal, ['class' => 'form-control', 'readonly']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('altaautonomo', 'Alta Autonomo'); ?> </small>
                    <?php echo Form::date('altaautonomo', $cliente->altaautonomo, ['class' => 'form-control', 'readonly']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('numseguridad', 'Nº Seguridad Social'); ?> </small>
                    <?php echo Form::text('numseguridad', $cliente->numseguridad, ['class' => 'form-control', 'readonly']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('cuentabanco', 'Cuenta Bancaria'); ?> </small>
                    <?php echo Form::text('cuentabanco', $cliente->cuentabanco, ['class' => 'form-control', 'readonly']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('titularbanco', 'Titular Cuenta Bancaria'); ?> </small>
                    <?php echo Form::text('titularbanco', $cliente->titularbanco, ['class' => 'form-control', 'readonly']); ?>

                </div>
            </div>

        </div>
    </div>

    



    <button type="submit" class="btn btn-primary float-right">Grabar Información</button>
    <?php echo Form::close(); ?>


    

    <form action="<?php echo e(route('procesocliente.destroy', $procesocliente->id)); ?>" method="POST" class="formulario-eliminar">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        console.log('Hi!');

    </script>
    <script>
        function sumar() {
            var a = parseInt(document.getElementById("precio").value) || 0;
            var b = parseInt(document.getElementById("abono").value) || 0;
            total = (parseInt(a) - parseInt(b));
            document.getElementById('pendiente').value = total;
        }

    </script>


    <?php if(session('eliminar') == 'ok'): ?>
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )

        </script>
    <?php endif; ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas segur@!',
                text: "Este Archivo se Eliminara!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/procesocliente/edit.blade.php ENDPATH**/ ?>