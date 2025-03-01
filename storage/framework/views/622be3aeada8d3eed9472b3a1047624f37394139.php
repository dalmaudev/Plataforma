

<?php $__env->startSection('title', 'Asesoria | Editar Especialista'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar Especialista<a class="btn btn-success btn-sm float-right" href="<?php echo e(route('users.index')); ?>"><i
                class="far fa-hand-point-left"></i> Volver</a></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <?php echo Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']); ?>

            <?php echo Form::label('nombre', 'Nombre completo de Especialista'); ?>

            <?php echo Form::text('name', null, ['class' => 'form-control mb-3', 'autofocus']); ?>

            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php echo Form::label('email', 'Email'); ?>

            <?php echo Form::email('email', null, ['class' => 'form-control mb-3']); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php echo Form::label('contraseña', 'Contraseña'); ?>

            <?php echo Form::password('password', ['class' => 'form-control mb-2']); ?>

            <?php echo Form::hidden('estado', 1); ?>

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <hr>
            <small><?php echo Form::label('contraseña', 'Listado de Roles'); ?></small>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <label>
                        <?php echo Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']); ?>

                        <?php echo e($role->name); ?>

                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr>
            <?php echo Form::submit('Actualizar Especialista', ['class' => 'btn btn-primary float-right']); ?>

            <?php echo Form::close(); ?>


            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="formulario-eliminar">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
            </form>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/users/edit.blade.php ENDPATH**/ ?>