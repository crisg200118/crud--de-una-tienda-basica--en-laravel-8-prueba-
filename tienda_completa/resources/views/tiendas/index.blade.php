@extends('layouts.plantilla')

@section('css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
@endsection

@section('titulo','Listado De Tiendas')


@section('contenido')


<!--Nav bar inicio-->
<div class="container ">

  <h3>Tiendas</h3>
  <ul class=" nav nav-tabs">
    <li class="nav-item" ><a class="nav-link " href="{{ route('inicio') }}">Inicio</a></li>
    <li class=" nav-item "><a class="nav-link " href="{{route('productos.index')}}">Productos</a></li>
    <li  class="nav-item" ><a class="nav-link  " href="{{ route('ventas.index') }}">Ventas</a></li>
    <li class="nav-item" ><a class="nav-link active" href="{{ route('tiendas.index') }}">Tiendas</a></li>
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


					<table id="tiendas" class="table table-bordered ">
						<thead >
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
@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>


  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" >  </script>



  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>



  <script >
  $(document).ready(function() {
    $('#tiendas').DataTable();
  } );
  </script>



@endsection




@endsection
