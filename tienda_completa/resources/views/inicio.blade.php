@extends('layouts.plantilla')

@section('titulo','Inicio')

@section('contenido')

@endsection
<!--Nav bar inicio-->

<div class="container ">
  <h3>Inicio</h3>
  <ul class="nav nav-pills">
    <li class="active" ><a href=" {{ route('inicio') }} ">Inicio</a></li>
    <li ><a href="{{route('productos.index')}}">Productos</a></li>
    <li ><a href="{{ route('ventas.index') }}">Ventas</a></li>
    <li><a href="{{ route('tiendas.index') }}">Tiendas</a></li>
    <li ><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
  </ul>
</div>
<!--Nav bar final-->
<!--
$table->id();
$table->unsignedBigInteger('id_producto')->unsigned();
$table->unsignedBigInteger('id_vendedor')->unsigned();
$table->unsignedBigInteger('id_tienda')->unsigned();

///llaves foranea///
$table->foreign('id_producto')->references('id')->on('products');
$table->foreign('id_vendedor')->references('id')->on('vendedores');
$table->foreign('id_tienda')->references('id')->on('tiendas');


$table->timestamps();*/
-->
