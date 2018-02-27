@extends('template')
@section('title', 'Home')
@section('content')
	<a href="{{ route('empleados.create') }}" class="btn btn-info">Registrar nuevo empleado</a><hr>
	@if($empleados->total() > 0)
    	<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>email</th>
				<th>ver datos</th>
			</thead>
			<tbody>
				@foreach($empleados as $empleado)
					<tr>
						<td>{{ $empleado->nombre }}</td>
						<td>{{ $empleado->email }}</td>
						<td>
							<a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></a></span>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $empleados->render() !!}
	@else
		<h3>No hay resultados para mostrar</h3>
	@endif
@endsection