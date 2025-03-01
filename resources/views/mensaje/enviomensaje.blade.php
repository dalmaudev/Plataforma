@component('mail::message')
#Hola
<br>
<p>Has recibido un mensaje de nuestro departamento de informatica</p>
<p>
    Motivo del mensaje: {{$textsubject}}
</p>
<p>
    {{$textmensaje}}
</p>
@endcomponent