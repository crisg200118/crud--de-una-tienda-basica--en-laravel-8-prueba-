@extends('layouts.plantilla')

@section('titulo','Crear Producto')

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
<!-- contenido inicio-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
					Crear Productos
				</div>
				<div class="card-body">
					<form  action="{{ route('productos.guardar') }}" method="post" accept-charset="utf-8">
                      @csrf
                     <div class="form-group">
                     	<label for="descripcion">Descripcion</label>
					    <input type="text" name="descripcion" class="form-control">

                     </div>

                     <div class="form-group">
                     	<label for="precio">Precio</label>
					    <input type="number" name="precio" class="form-control">
                     </div>



					<button type="submit" class="btn btn-primary">Guardar</button>

					<a href="{{ route('productos.index') }}" class="btn btn-danger">cancelar</a>

					</form>


				</div>

			</div>

		</div>
	</div>
</div>

<!--final contenido-->

@endsection
