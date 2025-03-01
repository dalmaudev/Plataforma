

<?php $__env->startSection('title', 'Nuevo Cliente'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Nuevo Cliente</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open(['route' => 'cliente.store', 'files' => true, 'name' => 'frm1']); ?>

    <?php echo Form::hidden('user_id', auth()->id()); ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <small><?php echo Form::label('nombre', 'Nombre Completo'); ?> <span class="text-danger"><strong>*</strong></span></small>
            <?php echo Form::text('nombre', null, ['class' => 'form-control', 'autofocus']); ?>

            <?php $__errorArgs = ['nombre'];
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
        <div class="form-group col-md-6">
            <small><?php echo Form::label('apellido', 'Apellido Completo'); ?> <span class="text-danger"><strong>*</strong></span></small>
            <?php echo Form::text('apellido', null, ['class' => 'form-control']); ?>

            <?php $__errorArgs = ['apellido'];
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
    <div class="form-group">
        <?php echo Form::label('direccion', 'Dirección'); ?>

        <?php echo Form::text('direccion', null, ['class' => 'form-control']); ?>

    </div>

    <input type="hidden" value="1" name="cliente">

    <div class="form-row">
        <div class="form-group col-md-2">
            <small><?php echo Form::label('provicia_id', 'Provincia'); ?> <span class="text-danger"><strong>*</strong></span></small>
            <?php echo Form::select('provincia_id', $provincia, null, ['id' => 'state', 'class' => 'form-control mb-2']); ?>

            <?php $__errorArgs = ['provincia_id'];
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
        <div class="form-group col-md-2">
          <small><?php echo Form::label('localidad', 'Localidad'); ?> <span class="text-danger"><strong>*</strong></span></small>
            <?php echo Form::select('localidad_id', ['placeholder' => 'Selecciona Localidad'], null, ['id' => 'town', 'class' => 'form-control mb-2']); ?>

            <?php $__errorArgs = ['localidad_id'];
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
        <div class="form-group col-md-2">
            <?php echo Form::label('cp', 'C.P.'); ?>

            <?php echo Form::text('cp', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('documento', 'Tipo Documento'); ?> </small>
            <?php echo Form::select('documento_id', $documentos, null, ['class' => 'form-control mb-2']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('documento', 'Nº Documento'); ?> <span class="text-danger"><strong>*</strong></span></small>
              <?php echo Form::text('documento', null, ['class' => 'form-control']); ?>

              <?php $__errorArgs = ['documento'];
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
          <div class="form-group col-md-2">
            <small><?php echo Form::label('caducidaddoc', 'Fecha Caducidad Documento'); ?> </small>
            <?php echo Form::date('caducidaddoc', null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="form-row">

        
        
        <div class="form-group col-md-2">
            <small><?php echo Form::label('fecingresoespaña', 'Fecha Ingreso España'); ?> </small>
            <?php echo Form::date('fecingresoespaña', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('sexo', 'Sexo'); ?> </small><br>
            <?php echo Form::select('sexo_id', $sexo, null, ['class' => 'form-control mb-2']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('pais_id', 'Nacionalidad'); ?> </small>
            <?php echo Form::select('pais_id', $paises, null, ['class' => 'form-control mb-2']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('telefono', 'Telefono'); ?> </small>
            <?php echo Form::text('telefono', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('movil', 'Movil'); ?> </small>
            <?php echo Form::text('movil', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('estadocivil_id', 'Estado Civil'); ?> </small>
            <?php echo Form::select('estadocivil_id', $estadocivil, null, ['class' => 'form-control mb-2']); ?>

        </div>
        
    </div>
    <div class="form-row">
    <div class="form-group col-md-2">
            <small><?php echo Form::label('profesion', 'Profesión'); ?> </small>
            <?php echo Form::text('profesion', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('email', 'Correo Electronico'); ?> </small>
            <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('nombrepadre', 'Nombre del Padre'); ?> </small>
            <?php echo Form::text('nombrepadre', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('nombremadre', 'Nombre de la Madre'); ?> </small>
            <?php echo Form::text('nombremadre', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('nacimiento', 'Fecha de Nacimiento'); ?> </small>
            <?php echo Form::date('fecnac', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('conocio', '¿Cómo nos has conocido?'); ?> </small>
            <?php echo Form::text('conocio', null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <small><?php echo Form::label('hijo', 'Hijos'); ?> </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse1" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Edad
            </a>
        </div>
        <div class="form-group col-md-1">
            <small><?php echo Form::label('auto', 'Autonomo'); ?> </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Auto
            </a>
        </div>
        <div class="form-group col-md-1">
            <small><?php echo Form::label('firma', 'Firma Doc.'); ?> </small>
            <?php echo Form::select('firma', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']); ?>

        </div>
        
        <div class="form-group col-md-9">
            <small><?php echo Form::label('observaciones', 'Observaciones'); ?></small>
            <?php echo Form::text('observaciones', null, ['class' => 'form-control']); ?>

        </div>
        
    </div>


    

    <div class="collapse" id="collapse1">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 1'); ?> </small>
                    <?php echo Form::number('hijo1', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 2'); ?> </small>
                    <?php echo Form::number('hijo2', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 3'); ?> </small>
                    <?php echo Form::number('hijo3', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 4'); ?> </small>
                    <?php echo Form::number('hijo4', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 5'); ?> </small>
                    <?php echo Form::number('hijo5', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 6'); ?> </small>
                    <?php echo Form::number('hijo6', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 7'); ?> </small>
                    <?php echo Form::number('hijo7', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 8'); ?> </small>
                    <?php echo Form::number('hijo8', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 9'); ?> </small>
                    <?php echo Form::number('hijo9', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 10'); ?> </small>
                    <?php echo Form::number('hijo10', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 11'); ?> </small>
                    <?php echo Form::number('hijo11', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 12'); ?> </small>
                    <?php echo Form::number('hijo12', null, ['class' => 'form-control','min' => 0,'max' => 99]); ?>

                </div>
            </div>

        </div>
    </div>
    
    <div class="collapse" id="collapse2">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('certdigital', 'Certificado Digital'); ?> </small>
                    <?php echo Form::select('certdigital', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']); ?>

                </div>
                <div class="form-group col-md-3">
                    <small><?php echo Form::label('domifiscal', 'Domicilio Fiscal'); ?> </small>
                    <?php echo Form::text('domifiscal', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('altaautonomo', 'Alta Autonomo'); ?> </small>
                    <?php echo Form::date('altaautonomo', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('numseguridad', 'Nº Seguridad Social'); ?> </small>
                    <?php echo Form::text('numseguridad', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('cuentabanco', 'Cuenta Bancaria'); ?> </small>
                    <?php echo Form::text('cuentabanco', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('titularbanco', 'Titular Cuenta Bancaria'); ?> </small>
                    <?php echo Form::text('titularbanco', null, ['class' => 'form-control']); ?>

                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('autoactivo', 'Autonomo Activo'); ?> </small>
                    <?php echo Form::select('autoactivo', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']); ?>

                </div>
                <div class="form-group col-md-2">
                    <small><?php echo Form::label('estadoauto', 'Autonomo Estado'); ?> </small>
                    <?php echo Form::select('estadoauto', ['BAJA' => 'BAJA', 'ALTA' => 'ALTA'], null, ['class' => 'form-control mb-2']); ?>

                </div>
    
                
            </div>

        </div>
    </div>


    

    <button type="submit" class="btn btn-primary float-right">Grabar Información</button>
    <?php echo Form::close(); ?>

    <br><br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        console.log('Hi!');

    </script>
    <script>
        $("#state").change(event => {
            $.get(`../towns/${event.target.value}`, function(res, sta) {
                $("#town").empty();
                res.forEach(element => {
                    $("#town").append(`<option value=${element.id}> ${element.nombre} </option>`);
                });
            });
        });

        function sumar() {
            var a = parseInt(document.getElementById("precio").value) || 0;
            var b = parseInt(document.getElementById("abono").value) || 0;
            total = (parseInt(a) - parseInt(b));
            document.getElementById('pendiente').value = total;
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/cliente/create.blade.php ENDPATH**/ ?>