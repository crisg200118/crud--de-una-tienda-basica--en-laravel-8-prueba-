@extends('layouts.plantilla')

@section('titulo','Listado De Tiendas')


@section('contenido')


<!--Nav bar inicio-->

<div class="container ">
  <h3>Tienda</h3>
  <ul class="nav nav-pills">
    <li  ><a href=" {{ route('inicio') }} ">Inicio</a></li>
    <li ><a href="{{route('productos.index')}}">Productos</a></li>
    <li ><a href="{{ route('ventas.index') }}">Ventas</a></li>
    <li class="active"><a href="{{ route('tiendas.index') }}">Tienda</a></li>
    <li ><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
  </ul>
</div>
<!--Nav bar final-->

<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
					Listado De Tiendas
					<a class="btn btn-success float-right" href="{{ route('tiendas.crear') }}" >Crear Tienda</a>
				</div>
				<div class="card-body">

					@if(session('info_g'))
					<div class="alert alert-success">
						 {{ session('info_g') }}
					</div>

					@endif


					@if(session('info_e'))
					<div class="alert alert-danger">
						 {{ session('info_e') }}
					</div>

					@endif

					@if(session('info_a'))
					<div class="alert alert-primary">
						 {{ session('info_a') }}
					</div>

					@endif


					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre de la tienda</th>
								<th>Direccion</th>
						    <th>Telefono</th>
                <th>Dueño</th>
                <th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tienda as $tienda)
							<tr>
								<td>{{ $tienda->id }}</td>
								<td>{{ $tienda->name }}</td>
								<td>{{ $tienda->direccion }}</td>
              	<td>{{ $tienda->telefono }}</td>
              	<td>{{ $tienda->dueño }}</td>
								<td>

									<a href="{{ route('tiendas.editar',$tienda->id) }}" class="btn btn-warning">Editar</a>


									<a href="javascript: document.getElementById('eliminar_{{ $tienda->id }}').submit()" class="btn btn-danger">Eliminar</a>

									<form id="eliminar_{{ $tienda->id }}" action="{{ route('tiendas.eliminar',$tienda->id ) }}" method="post">
									    @method('delete')
										@csrf


									 </form>

								 </td>
							</tr>

							@endforeach
						</tbody>
					</table>


				</div>

			</div>

		</div>
	</div>
</div>




@endsection
