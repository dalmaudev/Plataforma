<?php $__env->startSection('title', 'Asesoria | Cliente'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Listado Clientes<a class="btn btn-dark btn-sm float-right" href="<?php echo e(route('cliente.create')); ?>">Crear Nuevo Cliente</a></h1>
    <hr>
    <?php if(session('info')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Enhorabuena!</strong> <?php echo e(session('info')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
    <?php if(session('dele')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> <?php echo e(session('dele')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <style>
        td {
            font-size: 12px;

            }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px" align="center"><small>id</small> </th>
            <th><small>Nombre</small> </th>
            <th><small>Apellidos</small> </th>
            <th><small>DNI/NIE/PASAPORTE</small> </th>
            <th><small>CORREO ELECTRONICO</small> </th>
            <th><small>INGRESO</small> </th>
            <th width="70px">Accion</th>
        </tr>
    </thead>
</table>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>



    <script>

      $('#proc').DataTable( {
        "ajax": "<?php echo e(route('doccliente.clients')); ?>",
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'documento'},
            {data: 'email'},
            {data: 'created_at'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        responsive: true,
        dom: 'Bfrtilp',
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
      } );
    </script>

    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/cliente/client.blade.php ENDPATH**/ ?>