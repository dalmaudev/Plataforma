

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Enviar Correos Electronicos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div id="events">
     
  </div>
  
  <?php echo Form::open(['route' => 'enviosend']); ?>

    <small><?php echo Form::label('nombre', 'Seleccione Mensaje'); ?></small>
    <?php echo Form::select('mensaje', $msj, null,['class' => 'form-control mb-2']); ?>

    <small><?php echo Form::label('nombre', 'Seleccion Id Cliente'); ?></small>
    <?php echo Form::text('caja', null, ['class' => 'form-control mb-2','id' => 'caja_valor', 'readonly']); ?>

    <?php echo Form::submit('Enviar Mensaje', ['class' => 'btn btn-primary btn-sm float-right mb-3']); ?>

    <?php echo Form::close(); ?>

    
    <table id="example" class="display nowrap" width="100%">
        
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Email</th>
      </thead>


      <tbody>
          <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                <td><?php echo e($cliente->id); ?></td>
                <td><?php echo e($cliente->nombre); ?></td>
                <td><?php echo e($cliente->apellido); ?></td>
                <td><?php echo e($cliente->telefono); ?></td>
                <td><?php echo e($cliente->email); ?></td>
            </tr> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
   
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="https://nightly.datatables.net/select/css/select.dataTables.css?_=766c9ac11eda67c01f759bab53b4774d.css" rel="stylesheet" type="text/css" />
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=a271844a59b9e8a38259cc2846e81108.css" rel="stylesheet" type="text/css" />
    <style>
        body {
  font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready( function () {
    var events = $('#events');
        var matriz;
    var table = $('#example').DataTable( {
        dom: 'Bfrtip',
        select: true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        buttons: [
            {
                
                text: 'Seleccion Clientes',
                action: function () {
                    var data = table.rows( { selected: true } ).data().pluck(0).toArray();
 
                    // events.prepend( '<div>'+data+'</div>' );
                    document.getElementById("caja_valor").value = data;
                   
                    
                }
            }
        ]
    } );
} );

    </script>

   

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="https://nightly.datatables.net/select/js/dataTables.select.js?_=766c9ac11eda67c01f759bab53b4774d"></script>
<script src="https://nightly.datatables.net/buttons/js/dataTables.buttons.js?_=a271844a59b9e8a38259cc2846e81108"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/emails/index.blade.php ENDPATH**/ ?>