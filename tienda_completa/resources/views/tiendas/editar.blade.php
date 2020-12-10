@extends('layouts.plantilla')

@section('titulo','Editar Tiendas')


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

<!--contenido inicio-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
					Editar tiendas
				</div>
				<div class="card-body">
					<form  action="{{ route('tiendas.actualizar', $tienda->id ) }}" method="post" accept-charset="utf-8">
                      @csrf
                      @method('put')
                     <div class="form-group">
                     	<label for="name">Nombre</label>
					            <input type="text" name="name" class="form-control" value="{{ $tienda->name }}" >

                     </div>

                     <div class="form-group">
                     	<label for="direccion">Direccion</label>
					            <input type="text" name="direccion" class="form-control" value="{{ $tienda->direccion }}">
                     </div>

                     <div class="form-group">
                     	<label for="telefono">Telefono</label>
					            <input type="number" name="telefono" class="form-control" value="{{ $tienda->telefono }}">
                     </div>

                     <div class="form-group">
                     	<label for="dueño">Dueño</label>
					            <input type="text" name="dueño" class="form-control" value="{{ $tienda->dueño }}">
                     </div>
                     <br>



					<button type="submit" class="btn btn-primary">Guardar</button>

					<a href="{{ route('tiendas.index') }}" class="btn btn-danger">cancelar</a>

					</form>


				</div>

			</div>

		</div>
	</div>
</div>

<!--final contenido-->
@endsection
