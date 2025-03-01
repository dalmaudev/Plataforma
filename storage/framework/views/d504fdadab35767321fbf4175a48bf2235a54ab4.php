

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Mensajes</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <?php echo Form::open(['route' => 'mensaje.store']); ?>

            <div class="row">
                <div class="form-group col-md-2">
                  <small><?php echo Form::label('saludo', 'Saludo Cliente'); ?>  </small>
                  <?php echo Form::select('saludo', ['ES' => 'Estimado/a', 'SE' => 'Señor/a', 'DI' => 'Distinguido/a', 'UN' => 'Un cordial saludo.'], null,['class' => 'form-control mb-2']); ?>

                </div>
            </div>
            <small><?php echo Form::label('nombre', 'Nombre del Mensaje'); ?></small>
            <?php echo Form::text('nombre', null, ['class' => 'form-control mb-2']); ?>

            <hr>
            <small><?php echo Form::label('Encabezado', 'Encabezado del Mensaje'); ?></small>
            <?php echo Form::text('subject', null, ['class' => 'form-control mb-2']); ?>

            <small><?php echo Form::label('titulo', 'Titulo del Mensaje'); ?></small>
            <?php echo Form::text('titulo', null, ['class' => 'form-control mb-2']); ?>

            <small><?php echo Form::label('asunto', 'Mensaje'); ?></small>
            <?php echo Form::textarea('asunto', null, ['class' => 'form-control mb-2','rows' => '10']); ?>

            <div class="row">
                <div class="form-group col-md-2">
                  <small><?php echo Form::label('despido', 'Saludo Despedida Cliente'); ?>  </small>
                  <?php echo Form::select('despido', ['SD' => 'Se despide atentamente.', 'AT' => 'Atentamente.', 'CO' => 'Cordialmente.'], null,['class' => 'form-control mb-2']); ?>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                  <small><?php echo Form::label('especialista', 'Especialista'); ?>  </small>
                  <?php echo Form::select('especialista', $especialista, null,['class' => 'form-control mb-2']); ?>

                </div>
            </div>
            <br>
            <?php echo Form::submit('Crear Mensaje', ['class' => 'btn btn-primary float-right']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#asunto' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/mensaje/create.blade.php ENDPATH**/ ?>