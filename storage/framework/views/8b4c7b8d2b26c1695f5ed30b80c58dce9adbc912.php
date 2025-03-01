

<?php $__env->startSection('title', 'Asesoria | Desicion'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Listado de Estado Civil 
      <?php if(Auth::user()->hasRole('Admin')): ?>
        <a class="btn btn-dark btn-sm float-right" href="<?php echo e(route('estadocivil.create')); ?>">Crear Estado Civil</a>
        <?php endif; ?>
      </h1>

    <hr>
    <?php if(session('info')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Enhorabuena!</strong> <?php echo e(session('info')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table id="proc" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th width="3px">id</th>
            <th>Nombre del Estado Civil</th>
            <th width="70px"></th>
        </tr>
    </thead>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>

      $('#proc').DataTable( {
        "ajax": "<?php echo e(route('estadocivil.data')); ?>",
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      } );
    </script>

    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/estadocivil/index.blade.php ENDPATH**/ ?>