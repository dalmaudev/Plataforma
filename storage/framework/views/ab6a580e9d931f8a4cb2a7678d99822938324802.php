<?php $__env->startSection('title', 'Editar Cliente'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar Cliente
        <?php if($cliente->numseguridad != ''): ?>
            (AUTONOMO) <a class="btn btn-warning btn-sm" href="<?php echo e(route('files.index', $cliente->id)); ?>"><i
                    class="fas fa-upload"></i> Subir Archivos</a>
        <?php else: ?>
            <a class="btn btn-warning btn-sm" href="<?php echo e(route('files.edit', $cliente->id)); ?>"><i class="fas fa-upload"></i>
                Subir Archivos</a>
        <?php endif; ?>

        <?php if($cliente->afiliado): ?>
        <i class="fas fa-user-check"></i> Afiliado desde (<?php echo e(\Carbon\Carbon::parse($cliente->fecafiliado)->format('d-m-Y')); ?>)
        <a class="btn btn-danger btn-sm" href="<?php echo e(route('llamada.bajaafiliado', $cliente->id)); ?>"><i class="fas fa-thumbs-down"></i>
            Dar baja afiliado</a>
        <a target="_blank" class="btn btn-success btn-sm" href="<?php echo e(route('clientepdfafi', $cliente->id)); ?>"><i class="far fa-file-pdf"></i>
                VER DOC AFI</a>
        <?php else: ?>
        <a class="btn btn-success btn-sm" href="<?php echo e(route('llamada.crearafiliado', $cliente->id)); ?>"><i class="fas fa-thumbs-up"></i>
            Dar Alta afiliado</a>
        <?php endif; ?>



        <a class="btn btn-success btn-sm float-right" href="<?php echo e(route('cliente.show', $cliente->id)); ?>"><i
                class="far fa-hand-point-left"></i> Volver</a>
    </h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php echo Form::model($cliente, ['route' => ['cliente.update', $cliente], 'method' => 'PUT', 'files' => true, 'name' => 'frm1']); ?>


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
            <?php echo Form::select('localidad_id', $localidades, null, ['id' => 'town1', 'class' => 'form-control mb-2']); ?>

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
            <small><?php echo Form::label('caducidaddoc', 'Caducidad Doc.'); ?> </small>
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
            <small><?php echo Form::label('estadocivil_id', 'Estado Civil'); ?> </small>
            <?php echo Form::select('estadocivil_id', $estadocivil, null, ['class' => 'form-control mb-2']); ?>

        </div>
        <div class="form-group col-md-2">
            <small><?php echo Form::label('profesion', 'Profesión'); ?> </small>
            <?php echo Form::text('profesion', null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
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
            <small><?php echo Form::label('firma', 'Firma'); ?> </small>
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
                    <?php echo Form::number('hijo1', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 2'); ?> </small>
                    <?php echo Form::number('hijo2', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 3'); ?> </small>
                    <?php echo Form::number('hijo3', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 4'); ?> </small>
                    <?php echo Form::number('hijo4', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 5'); ?> </small>
                    <?php echo Form::number('hijo5', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 6'); ?> </small>
                    <?php echo Form::number('hijo6', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 7'); ?> </small>
                    <?php echo Form::number('hijo7', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 8'); ?> </small>
                    <?php echo Form::number('hijo8', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 9'); ?> </small>
                    <?php echo Form::number('hijo9', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 10'); ?> </small>
                    <?php echo Form::number('hijo10', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 11'); ?> </small>
                    <?php echo Form::number('hijo11', null, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group col-md-1">
                    <small><?php echo Form::label('nombrepadre', 'Edad hijo 12'); ?> </small>
                    <?php echo Form::number('hijo12', null, ['class' => 'form-control']); ?>

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

        </div>
    </div>

    <button type="submit" class="btn btn-primary float-right">Actualizar Información</button>
    <?php echo Form::close(); ?>


    


    <form action="<?php echo e(route('cliente.destroy', $cliente->id)); ?>" method="POST" class="formulario-eliminar">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
    </form>
    </div>
<br><br><br>
<h3>Documentación Personal</h3>
    <div class="card">
        <div class="card-body">
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
                              <td><a target="_blank" href="<?php echo e(route('files.show',$file->id)); ?>"><?php echo e(substr($file->name,11,200)); ?></a></td>
                              <td >
                                <a  href="<?php echo e(route('files.show',$file->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
                              </td>
                              <td >
                                  <form action="<?php echo e(route('files.destroy',$file->id)); ?>" method="POST" class="formulario-eliminar">
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
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<script>
    $("#state").change(event => {

        $.get(`../towns1/${event.target.value}`, function(res, sta) {
            $("#town1").empty();
            res.forEach(element => {
                $("#town1").append(`<option value=${element.id}> ${element.nombre} </option>`);
                alert('hola')
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/cliente/edit.blade.php ENDPATH**/ ?>