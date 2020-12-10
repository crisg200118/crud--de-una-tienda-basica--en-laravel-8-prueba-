@extends('layouts.plantilla')

@section('titulo','Crear de Usuarios')

@section('contenido')

  <!--Nav bar inicio-->

  <div class="container ">

    <h3>Usuarios</h3>
    <ul class=" nav nav-tabs">
      <li class="nav-item" ><a class="nav-link " href="{{ route('inicio') }}">Inicio</a></li>
      <li class=" nav-item "><a class="nav-link " href="{{route('productos.index')}}">Productos</a></li>
      <li  class="nav-item" ><a class="nav-link " href="{{ route('ventas.index') }}">Ventas</a></li>
      <li class="nav-item" ><a class="nav-link " href="{{ route('tiendas.index') }}">Tiendas</a></li>
      <li class="nav-item" ><a class="nav-link active" href="{{ route('usuarios.index') }}">Usuarios</a></li>
    </ul>
  </div>

  <!--Nav bar final-->
<br>
<div class="container">
  <div class="row">
   <div class="col-sm-12">

  <div class="card">
    <div class="card-header">
     Crear de Usuarios
    </div>
    <div class="card-body">

        <form action="{{ route('usuarios.guardar') }}" method="post" accept-charset="utf-8">
          @csrf
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" >
          </div>

          <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">
          </div>
          <br>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a  class="btn btn-danger" href="{{ route('usuarios.index') }}">Cancelar</a>



      </form>


    </div>
  </div>
</div>
</div>

</div>
@endsection
