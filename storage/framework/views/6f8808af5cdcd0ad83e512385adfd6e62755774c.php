<?php $__env->startSection('title', 'Filtro'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>
        Filtro</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-gray-400">


        <table id="example" class="table table-striped table-bordered " style="width:80%">
            <thead>
                <tr>
                    <th class="text-xs">Nombre</th>
                    <th class="text-xs">Apellido</th>
                    <th class="text-xs">Fec-Nac</th>
                    <th class="text-xs">Pais</th>
                    <th class="text-xs">Nie</th>
                    <th class="text-xs">ID/No. Expte</th>
                    <th class="text-xs">Delegac. Gobierno</th>
                    <th class="text-xs">Abogada</th>
                    <th class="text-xs">Tramite Presentado</th>
                    <th class="text-xs">Fecha Present</th>
                    <th class="text-xs">Term</th>
                    <th class="text-xs">Decisión</th>
                    <th class="text-xs">Fecha Resolucion</th>
                    <th class="text-xs">Observaciones</th>
                    <th class="text-xs">Silencio positivo</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $procesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if ($proceso->cliente->fecnac) {
                        $fecha = Carbon::parse($proceso->cliente->fecnac);
                        $afecha = $fecha->year;
                    }
                        
                    ?>
                    <tr>
                        <td class="text-xs"><small><?php echo e($proceso->cliente->nombre); ?></small></td>
                        <td class="text-xs"><small><?php echo e($proceso->cliente->apellido); ?></small> </td>
                        <td class="text-xs"><small><?php echo e($afecha); ?></small> </td>
                        <td class="text-xs"><small><?php echo e($proceso->cliente->pais->nombre); ?></small></td>
                        <td class="text-xs"><small><?php echo e($proceso->cliente->documento); ?></small></td>
                        <td class="text-xs"><small><?php echo e($proceso->numexpediente); ?></small></td>
                        <td class="text-xs">
                            <?php if($proceso->delegacion != ''): ?>
                                <small><?php echo e($proceso->delegacion->nombre); ?></small>
                            <?php endif; ?>
                        </td>
                        <td class="text-xs"><small><?php echo e($proceso->user->name); ?></small></td>
                        <?php
                            $fechapre = Carbon::parse($proceso->fecpresentado);
                            $fechapre = $fechapre->year;
                        ?>
                        <td class="text-xs">
                            <?php if($proceso->proceso != ''): ?>
                                <small><?php echo e($proceso->proceso->nombre); ?></small>
                            <?php endif; ?>
                        </td>
                        <td class="text-xs">
                            <?php if($proceso->fecpresentado != ''): ?>
                                <small><?php echo \Carbon\Carbon::parse($proceso->fecpresentado)->format('d-m-Y'); ?></small>
                            <?php endif; ?>
                        </td>
                        <td class="text-xs">
                            <?php if($proceso->fecdesicion == ''): ?>
                                <?php
                                    $date = $proceso->fecpresentado;
                                    $datework = Carbon::createFromDate($date);
                                    $now = Carbon::now();
                                    $testdate = $datework->diffInDays($now);
                                ?>
                            <?php else: ?>
                                <?php
                                    $date = $proceso->fecpresentado;
                                    $datework = Carbon::createFromDate($date);
                                    $now = $proceso->fecdesicion;
                                    $testdate = $datework->diffInDays($now);
                                ?>
                            <?php endif; ?>
                            <small><?php echo e($testdate); ?></small>
                        </td>
                        <td class="text-xs"><small><?php echo e($proceso->desicion->nombre); ?></small></td>
                        <td class="text-xs">
                            <?php if($proceso->fecdesicion != ''): ?>
                                <small><?php echo \Carbon\Carbon::parse($proceso->fecdesicion)->format('d-m-Y'); ?></small>
                            <?php endif; ?>
                        </td>
                        <td class="text-xs"><small><?php echo e($proceso->observacion); ?></small></td>
                        <td class="text-xs text-red-600">
                            <?php if($proceso->proceso->alerta < $testdate): ?>
                                <?php echo e($proceso->proceso->comentario); ?>

                            <?php endif; ?>
                            <a href="<?php echo e(route('procesocliente.edit', $proceso)); ?>"><i
                                    class="fas fa-binoculars float-right"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable(

                orderCellsTop: true,
                fixedHeader: true
            );
        });
    </script>

    <script>
        let temp = $("#btn1").clone();
        $("#btn1").click(function() {
            $("#btn1").after(temp);
        });

        $(document).ready(function() {
            var table = $('#example').DataTable({

                orderCellsTop: true,
                fixedHeader: true
            });

            //Creamos una fila en el head de la tabla y lo clonamos para cada columna
            $('#example thead tr').clone(true).appendTo('#example thead');

            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text(); //es el nombre de la columna
                $(this).html('<input type="text" placeholder="Search...' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/filter/index.blade.php ENDPATH**/ ?>