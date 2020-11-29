@extends('layouts.plantilla')

@section('titulo','vendedores')

@section('contenido')

  <!--Nav bar inicio-->

  <div class="container ">
    <h3>Vendedores</h3>
    <ul class="nav nav-pills">
      <li ><a href=" {{ route('inicio') }} ">Inicio</a></li>
      <li ><a href="{{route('productos.index')}}">Productos</a></li>
      <li ><a href="{{ route('ventas.index') }}">Ventas</a></li>
      <li ><a href="{{ route('tiendas.index') }}">Tienda</a></li>
      <li class="active"><a href="{{ route('vendedores.index') }}">Vendedores</a></li>
    </ul>
  </div>
  <!--Nav bar final-->
<br>
<div class="container">
  <div class="row">
<div class="col-sm-12">

  <div class="card">
    <div class="card-header">
     Listado de vendedores
    </div>
    <div class="card-body">
        <table class="table table-bordered">
           <thead>
             <th>Id</th>
             <th>Nombre</th>
             <th>Telefono</th>
             <th>Direccion</th>
           </thead>
           <tbody>
             @foreach ($vendedores as $vendedore)


             <tr>
              <td>{{ $vendedore->id }}</td>
              <td>{{ $vendedore->name }}</td>
              <td>{{ $vendedore->telefono }}</td>
              <td>{{ $vendedore->direccion }}</td>
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
