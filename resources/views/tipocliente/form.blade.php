<div class="box box-info padding-1">
    <div class="row">

        <div class="form-group col-md-12">
            <Small>{{ Form::label('Nombre') }}</Small>
            {{ Form::text('nombre', $tipocliente->nombre, ['class' => 'form-control form-control-sm' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

</div>
