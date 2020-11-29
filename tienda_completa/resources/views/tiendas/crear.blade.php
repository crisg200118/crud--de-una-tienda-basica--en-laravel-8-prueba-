@extends('layouts.plantilla')

@section('titulo','Listado De Tiendas')


@section('contenido')


<!--Nav bar inicio-->

<div class="container ">
  <h3>Tienda</h3>
  <ul class="nav nav-pills">
    <li  ><a href=" {{ route('inicio') }} ">Inicio</a></li>
    <li ><a href="{{route('productos.index')}}">Productos</a></li>
    <li ><a href="#">Ventas</a></li>
    <li class="active"><a href="{{ route('tiendas.index') }}">Tienda</a></li>
    <li ><a href="{{ route('vendedores.index') }}">Vendedores</a></li>
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
					<form  action="{{ route('tiendas.guardar') }}" method="post" accept-charset="utf-8">
                      @csrf
                     <div class="form-group">
                     	<label for="name">Nombre</label>
					            <input type="text" name="name" class="form-control">

                     </div>

                     <div class="form-group">
                     	<label for="direccion">Direccion</label>
					            <input type="text" name="direccion" class="form-control">
                     </div>

                     <div class="form-group">
                     	<label for="telefono">Telefono</label>
					            <input type="number" name="telefono" class="form-control">
                     </div>

                     <div class="form-group">
                     	<label for="dueño">Dueño</label>
					            <input type="text" name="dueño" class="form-control">
                     </div>



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
