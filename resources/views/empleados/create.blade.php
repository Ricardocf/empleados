@extends('template')

@section('title','Agregar Empleado')

@section('content')

    {!! Form::open(['route' => 'empleados.store', 'id' => 'regForm','method' => 'POST']) !!}
    
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del empleado', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email del empleado', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio') !!}
        {!! Form::text('domicilio', null, ['class' => 'form-control', 'placeholder' => 'Domicilio del empleado', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('puesto', 'Puesto') !!}
        {!! Form::text('puesto', null, ['class' => 'form-control', 'placeholder' => 'Puesto del empleado', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('f_nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::date('f_nacimiento', null, ['class' => 'form-control', 'placeholder' => 'fecha de nacimiento del empleado', 'required']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('skill', 'Skill') !!}
        {!! Form::text('skills[]', null, ['class' => 'form-control', 'placeholder' => 'skill del empleado', 'required']) !!}
        {!! Form::label('skill_exp', 'Experiencia') !!}
        {!! Form::number('skills_exp[]', null, ['class' => 'form-control', 'placeholder' => 'experiencia de skill del empleado', 'min' => '1', 'max' => '5','required']) !!}
    </div>
    <div id="more_skills"></div>
    <div class="form-group">
        <a href="#" class="addSkill">Agregar otro skill</a><br>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Registrar">
    </div>
    {!! Form::close() !!}

@endsection

@section('js')
	<script>
        jQuery.validator.addMethod("letters_pattern", function(value, element) {
            return this.optional(element) || /^[A-Za-zÁÉÍÓÚÜáéíóúü ]+$/.test(value);
        });
        jQuery.validator.addMethod("onlyLetters_pattern", function(value, element) {
            return this.optional(element) || /^[A-Za-z0-9_]+$/.test(value);
        });
        $("#regForm").validate({
            rules: {
                nombre: {
                    required: true,
                    letters_pattern: true
                },
                email: {
                    required: true,
                    email: true
                },
                domicilio: {
                    required: true
                },
                puesto: {
                    required: true
                },
                f_nacimiento: {
                    required: true,
                    date:true
                },
                'skills[]': {
                    required: true
                },
                'skills_exp[]': {
                    required: true,
                    digits: true,
                    min:1,
                    max:5
                }
            },
            messages: {
                nombre: {
                    required: "Por favor ingresa el nombre",
                    letters_pattern: "Por favor ingresa sólo letras"
                },
                email: {
                    required: "Por favor ingresa el email",
                    email : "Por favor ingresa un email válido"
                },
                domicilio: {
                    required: "Por favor ingresa el domicilio"
                },
                puesto: {
                    required: "Por favor ingresa un puesto"
                },
                f_nacimiento: {
                    required: "Por favor ingresa una fecha",
                    date: "Por favor ingresa una fecha válida"
                },
                'skills[]': {
                    required: "Por favor ingresa el skill"
                },
                'skills_exp[]': {
                    required: "Por favor ingresa la experiencia",
                    digits: "Sólo se aceptan números enteros positivos",
                    min: "Ingrese un número mayor o igual a 1",
                    max: "Ingrese un número maenor o igual a 5",

                }
            },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        $(".addSkill").click(function(){
            var html = '<div class="form-group">'+
                            '<label for="skill">Skill</label>'+
                            '<input class="form-control" placeholder="skill del empleado" required="required" name="skills[]" type="text">'+
                            '<label for="skill_exp">Experiencia</label>'+
                            '<input class="form-control" placeholder="experiencia de skill del empleado" min="1" max="5" required="required" name="skills_exp[]" type="number">'+
                        '</div>';

            $("#more_skills").append(html); 
        });
	</script>
@endsection