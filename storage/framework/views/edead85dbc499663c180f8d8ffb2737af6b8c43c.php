


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Login Asesoria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    html,
body {
  max-width: 100%;
  overflow-x: hidden;
}

.login__body {
  min-height: 100vh;
}

.login__image {
  -o-object-fit: contain;
     object-fit: contain;
}

.login__container,
.login__row {
  min-height: 100vh;
}

.login__card {
  background-color: #f6f6f6;
}
/*# sourceMappingURL=main.css.map */    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
     <div class="container login__container my-1">
        <div class="row login__row">
            <div class="col-md-6 d-flex">
                <img class="login__imagek align-self-center" src="<?php echo e(asset('/archivo/logo.jpg')); ?>"
                    width="70%" alt="" />
            </div>
            <div class="col-md-5 d-flex">
                <div class="align-self-center card login__card shadow-sm w-100">
                    <div class="card-body">
                        <form action="">
                            <h4 class="text-muted text-center">ASESORIAS & EXTRANJERIA
                                EVATERRUM, S.L
                                </h4>

                            
                            

                            <div class="">
                                <?php if(Route::has('login')): ?>
                                    <div>
                                <?php if(auth()->guard()->check()): ?>
                                        <div class="dropdown-divider my-4"></div>
                                            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary btn-lg btn-block my-3"> Dashboard</a>
                                <?php else: ?>
                                        <div class="form-group">
                                            <div class="dropdown-divider my-4"></div>
                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg btn-block my-3"> Ingresar</a>
                                        </div>
                                <?php endif; ?>
                                    </div>
                                <?php endif; ?>               

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</body>
</html><?php /**PATH F:\xampp\htdocs\Plataforma\resources\views/welcome.blade.php ENDPATH**/ ?>