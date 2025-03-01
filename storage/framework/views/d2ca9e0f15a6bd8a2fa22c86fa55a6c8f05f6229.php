

<?php $__env->startSection('title', 'Firma'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Firma Documentos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                    <td><?php echo e($cliente->nombre); ?></td>
                    <td><?php echo e($cliente->apellido); ?></td>
                    <td><?php echo e($cliente->email); ?></td>
                    <td width="10px"><a href="<?php echo e(route('signaturepad.show', $cliente)); ?>" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="fas fa-signature"></i></a></td>
                  </tr>   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  
               
                </tbody>
              </table>
        </div>
    </div> -->
    <table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px" align="center"><small>id</small> </th>
            <th><small>Nombre</small> </th>
            <th><small>Apellidos</small> </th>
            <th><small>EMAIL</small> </th>
            <th width="10px"><small></small> </th>
        
        </tr>
    </thead>
</table>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    


    <script>

      $('#proc').DataTable( {
        "ajax": "<?php echo e(route('docfirma.firma')); ?>",
        responsive: true,
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'email'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      } );
    </script>

    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/firma/index.blade.php ENDPATH**/ ?>