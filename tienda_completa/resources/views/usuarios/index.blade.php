@extends('layouts.plantilla')

@section('titulo','Listado de Usuarios')

@section('contenido')

  <!--Nav bar inicio-->

  <div class="container ">
    <h3>Usuarios</h3>
    <ul class="nav nav-pills">
      <li ><a href=" {{ route('inicio') }} ">Inicio</a></li>
      <li ><a href="{{route('productos.index')}}">Productos</a></li>
      <li ><a href="{{ route('ventas.index') }}">Ventas</a></li>
      <li ><a href="{{ route('tiendas.index') }}">Tienda</a></li>
      <li class="active"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
    </ul>
  </div>
  <!--Nav bar final-->
<br>
<div class="container">
  <div class="row">
<div class="col-sm-12">

  <div class="card">
    <div class="card-header">
     Listado de Usuarios
     <a  class="btn btn-success float-right"  href="{{ route('usuarios.crear') }}">Crear Usuarios</a>
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
             <th>Id</th>
             <th>Nombre</th>
             <th>Correo</th>
             <th>Contraseña</th>
             <th>Acciones</th>
           </thead>
           <tbody>
             @foreach ($usuarios as $usuarios )
               <tr>
                 <td>{{ $usuarios->id }}</td>
                 <td>{{ $usuarios->name }}</td>
                 <td>{{ $usuarios->email }}</td>
                 <td>{{ $usuarios->password }}</td>
                 <td>
                   <a class="btn btn-warning" href="{{ route('usuarios.editar',$usuarios->id ) }}">Editar</a>

                  <a class="btn btn-danger" href="javascript: document.getElementById('eliminar_{{ $usuarios->id }}').submit()">Eliminar</a>
                  <form id="eliminar_{{ $usuarios->id }}" action="{{ route('usuarios.eliminar',$usuarios->id) }}" method="post">
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
