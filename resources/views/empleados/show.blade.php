@extends('template')

@section('title','Mostrar Empleado')

@section('content')
    
    <label for="nombre">Nombre: </label>
    <span>{{ $empleado->nombre }}</span><br>
    <label for="email">Email: </label>
    <span>{{ $empleado->email }}</span><br>
    <label for="puesto">Puesto: </label>
    <span>{{ $empleado->puesto }}</span><br>
    <label for="f_nacimiento">Fecha de nacimiento: </label>
    <span>{{ $empleado->f_nacimiento }}</span><br>
    <label for="skills">Skills: </label><br>
    @foreach ($skills as $skill)
        <span>{{ $skill->nombre }} : {{ $skill->experiencia }}</span><br>
    @endforeach
    <label for="domicilio">Domicilio: </label>
    <span>{{ $empleado->domicilio }}</span><br>
        <input type="hidden" value="{{ $empleado->domicilio }}" name="domicilio" id="domicilio"><br>
        <iframe id="mapa" width="600" height="450" frameborder="0" style="border:0" src="" allowfullscreen align="center"></iframe>
    </div>
@endsection
@section('js')
	<script>
        $(document).ready(function(){
            var domicilio = $("#domicilio").val();
            var URL_API = 'https://maps.googleapis.com/maps/api/geocode/json?address='+domicilio+'&key=AIzaSyCbGbwzDSf7Ox6Z7y9POGca6ZP5nGdlwU4';
            $.getJSON(URL_API, function(datos){
                //console.log(datos.results[0].geometry.location);
                var latitud = parseFloat(datos.results[0].geometry.location.lat);
                var longitud = parseFloat(datos.results[0].geometry.location.lng);
                $("#mapa").attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyCbGbwzDSf7Ox6Z7y9POGca6ZP5nGdlwU4&q='+latitud+','+longitud);
            });
        });
        
        $(".addSkill").click(function(){
            var html = '<div class="form-group">'+
                            '<label for="skill">Skill</label>'+
                            '<input class="form-control" placeholder="skill del empleado" required="required" name="skills[]" type="text">'+
                            '<label for="skill_exp">Experiencia</label>'+
                            '<input class="form-control" placeholder="experiencia de skill del empleado" required="required" name="skills_exp[]" type="number">'+
                        '</div>';
            $("#more_skills").append(html); 
        });
	</script>
@endsection