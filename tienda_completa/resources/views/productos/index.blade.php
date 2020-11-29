@extends('layouts.plantilla')

@section('titulo','Listado De Productos')


@section('contenido')


<!--Nav bar inicio-->

<div class="container ">
  <h3>Productos</h3>
  <ul class="nav nav-pills">
    <li ><a href="{{ route('inicio') }}">Inicio</a></li>
    <li class="active"><a href="{{route('productos.index')}}">Productos</a></li>
    <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
    <li ><a href="{{ route('tiendas.index') }}">Tienda</a></li>
    <li><a href="{{ route('vendedores.index') }}">Vendedores</a></li>
  </ul>
</div>
<!--Nav bar final-->
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
					Listado De Productos
					<a class="btn btn-success float-right" href="{{ route('productos.crear') }}" >Crear Productos</a>
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
								<th>Descripcion</th>
								<th>Precio</th>
						        <th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($productos as $producto)
							<tr>
								<td>{{ $producto->id }}</td>
								<td>{{ $producto->description }}</td>
								<td>{{ $producto->price }}</td>
								<td>

									<a href="{{ route('productos.editar',$producto->id) }}" class="btn btn-warning">Editar</a>


									<a href="javascript: document.getElementById('eliminar_{{ $producto->id }}').submit()" class="btn btn-danger">Eliminar</a>

									<form id="eliminar_{{ $producto->id }}" action="{{ route('productos.eliminar',$producto->id) }}" method="post">
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
