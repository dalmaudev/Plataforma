<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>


    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-ui/jquery-ui.min.css')); ?>">

    <style>
        .filtro {
            background-color: #F0F0F1;
        }

        .filtro .nav-item>a {
            background-color: white;
            margin-right: 10px;
            color: #636bf;
        }

        .filtro i {
            margin-right: 5px;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->


    <section class="content">
        
        <div class="row">
            <div class="col-8">
                <h6>Buscador</h6>
                <form action=""></form>
                
                <div class="input-group">
                    <input type="text" class="form-control" id="search">
                    <div class="input-group-append">
                        <button type="button" onclick="submitform()" class="btn btn-success"><i
                                class="fas fa-search"></i></button>
                        
                        
                    </div>
                </div>
                </form>
                <br><br>
            </div>

            <div class="col-4">
                <h6>Alertas</h6>
                <div class="col-12" id="accordion">


                    <?php $__currentLoopData = $alertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alerta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php

                            $ver = 5;

                           $a = $alerta->fecalert;
                          $b = date('Y-m-d');

                            $date1 = new DateTime($a);
                            $date2 = new DateTime($b);
                            $diff = $date1->diff($date2);
                             $dias = $diff->days;

                            if ($a > $b) {
                                
                                switch ($dias) {
                                    case 1:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 2:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 3:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 4:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 5:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 6:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 7:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 8:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 9:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 10:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                }
                            } elseif ($a == $b) {
                                $ver = 1;
                                $color = 'card-success';
                            } else {
                                switch ($dias) {
                                    case 1:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 2:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 3:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 4:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 5:
                                   
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 6:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 7:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                }
                            }

                        ?>

                        <?php if($ver == 1): ?>
                            <div class="card <?php echo e($color); ?> card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse<?php echo e($alerta->id); ?>">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <?php echo e($alerta->titulo); ?>

                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse<?php echo e($alerta->id); ?>" class="collapse" data-parent="#accordion">
                                    <a href="<?php echo e(route('cliente.show', $alerta->cliente_id)); ?>">
                                        <div class="card-body">
                                            <?php echo \Carbon\Carbon::parse($alerta->fecalert)->format('d-m-Y'); ?> - <?php echo e($alerta->cuerpo); ?>

                                        </div>
                                    </a>
                                </div>

                                <div>
                                    <?php if($alerta->deuser != null): ?>
                                        <div class="d-flex justify-content-between container">
                                            <div>
                                                <small><small>De: <?php echo e($alerta->deuser->name); ?></small></small>
                                            </div>

                                            <div>
                                                <small><small>Cread@: <?php echo \Carbon\Carbon::parse($alerta->created_at)->format('d-m-Y'); ?> </small></small>
                                            </div>

                                        </div>
                                    <?php else: ?>
                                        <small></small>
                                    <?php endif; ?>

                                </div>
                                <div>
                                    <?php if($alerta->parauser != null): ?>
                                    <div class="d-flex justify-content-between container">
                                        <div>
                                            <small><small>Para: <strong><?php echo e($alerta->parauser->name); ?></strong> </small></small>
                                        </div>
                                        <div>

                                        </div>
                                    </div>

                                    <?php else: ?>
                                        <small></small>
                                    <?php endif; ?>

                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
            </div>



        </div>
        
    <?php $__env->stopSection(); ?>



    <?php $__env->startSection('js'); ?>


        <script src="<?php echo e(asset('vendor/jquery-ui/jquery-ui.min.js')); ?>"></script>


        <script>
            $('#search').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo e(route('search.cursos')); ?>",
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data)

                        }
                    });
                }
            });



            function submitform() {
                var operation = document.getElementById("search").value
                var id = operation.split(" ");
                var id = id[0];
                let url = "<?php echo e(route('cliente.show', ':id')); ?>";
                url = url.replace(':id', id);
                document.location.href = url;
            }
        </script>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/dashboard.blade.php ENDPATH**/ ?>