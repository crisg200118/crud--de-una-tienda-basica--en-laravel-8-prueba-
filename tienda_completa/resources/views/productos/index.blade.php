@extends('layouts.plantilla')

@section('css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
@endsection

@section('titulo','Listado De Productos')


@section('contenido')


<!--Nav bar inicio-->

<div class="container ">
  <h3>Productos</h3>
  <ul class=" nav nav-tabs">
    <li class="nav-item" ><a class="nav-link " href="{{ route('inicio') }}">Inicio</a></li>
    <li class=" nav-item "><a class="nav-link active" href="{{route('productos.index')}}">Productos</a></li>
    <li  class="nav-item" ><a class="nav-link " href="{{ route('ventas.index') }}">Ventas</a></li>
    <li class="nav-item" ><a class="nav-link " href="{{ route('tiendas.index') }}">Tiendas</a></li>
    <li class="nav-item" ><a class="nav-link " href="{{ route('usuarios.index') }}">Usuarios</a></li>
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


					<table id="productos" class="table table-striped table-bordered" style="width:100%" >
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

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>


  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" >  </script>



<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>



<script >
$(document).ready(function() {
    $('#productos').DataTable();
} );
</script>


@endsection



@endsection
