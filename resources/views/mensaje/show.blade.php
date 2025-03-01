<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{$mensaje->titulo}}</title> --}}
    <style>
        img {
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{asset('/archivo/logo.jpg')}}" width="70px" alt="logo"><br>
        {{-- <h1 align="center">{{$mensaje->titulo}}</h1> --}}
        <p>Estimada Maria Victoria Dominguez Bosch</p><br>
        <p>{{ $detalle}}</p>
        <br><br>
        <p>Cordialmente</p>
        <address>
            <strong>ASESORIAS & EXTRANJERIA EVATERRUM, S.L</strong><br>
            Paseo de las delicias 20, 2ª <br>
            Madrid 28045<br>
            <abbr >Tel:</abbr> 912305907/658592584
          </address>
    </div>
    
</body>
</html>