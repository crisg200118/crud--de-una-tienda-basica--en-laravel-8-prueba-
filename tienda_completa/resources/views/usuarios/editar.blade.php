@extends('layouts.plantilla')

@section('titulo','Editar Usuarios')


@section('contenido')


<!--Nav bar inicio-->

<div class="container ">
  <h3>Tienda</h3>
  <ul class="nav nav-pills">
    <li  ><a href=" {{ route('inicio') }} ">Inicio</a></li>
    <li ><a href="{{route('productos.index')}}">Productos</a></li>
    <li ><a href="{{ route('ventas.index') }}">Ventas</a></li>
    <li ><a href="{{ route('tiendas.index') }}">Tienda</a></li>
    <li class="active" ><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
  </ul>
</div>
<!--Nav bar final-->

<!--contenido inicio-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
				Actualizar Usuarios
				</div>
				<div class="card-body">
					<form  action="{{ route('usuarios.actualizar', $usuarios->id ) }}" method="post" accept-charset="utf-8">
                      @csrf
                      @method('put')
                     <div class="form-group">
                     	<label for="name">Nombre</label>
					            <input type="text" name="name" class="form-control" value="{{ $usuarios->name }}" >

                     </div>

                     <div class="form-group">
                     	<label for="email">Correo</label>
					            <input type="email" name="email" class="form-control" value="{{ $usuarios->email }}">
                     </div>

                     <div class="form-group">
                     	<label for="password">Contraseña</label>
					            <input type="text" name="password" class="form-control" value="{{ $usuarios->password }}">
                     </div>





					<button type="submit" class="btn btn-primary">Guardar</button>

					<a href="{{ route('usuarios.index') }}" class="btn btn-danger">cancelar</a>

					</form>


				</div>

			</div>

		</div>
	</div>
</div>

<!--final contenido-->
@endsection
