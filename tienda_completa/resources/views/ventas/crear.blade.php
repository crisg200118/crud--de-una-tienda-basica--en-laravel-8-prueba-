@extends('layouts.plantilla')

@section('titulo','Crear Ventas')

@section('contenido')

<!--Nav bar inicio-->

<div class="container ">
  <h3>Ventas</h3>
  <ul class="nav nav-pills">
    <li ><a href=" {{ route('inicio') }} ">Inicio</a></li>
    <li ><a href="{{route('productos.index')}}">Productos</a></li>
    <li class="active"><a href="{{ route('ventas.index') }}">Ventas</a></li>
    <li ><a href="{{ route('tiendas.index') }}">Tienda</a></li>
    <li><a href="{{ route('vendedores.index') }}">Vendedores</a></li>
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
					Crear Ventas
				</div>
				<div class="card-body">
					<form  action="" method="post" accept-charset="utf-8">
                      @csrf
                     <div class="form-group">
                     	<label for="descripcion">Descripcion</label>
					    <input type="text" name="descripcion" class="form-control">

                     </div>
                     <!-- select productos -->
                     <div class="form-group">
                      <label for="producto">Productos</label>
                        <select class="form-control">
                            @foreach($productos as $productos)
                            <option value="{{$productos->description}}">{{$productos->description}}</option>
                            @endforeach
                        </select>
                      </div>

                         <!-- select tienda -->
                      <div class="form-group">
                        <label for="tienda">Tiendas</label>
                         <select class="form-control">
                             @foreach($tiendas as $tiendas)
                             <option value="{{$tiendas->name}}">{{$tiendas->name}}</option>
                             @endforeach
                         </select>
                       </div>



                     <div class="form-group">
                     	<label for="precio">Precio</label>
					    <input type="number" name="precio" class="form-control">
                     </div>



					<button type="submit" class="btn btn-primary">Guardar</button>

					<a href="{{ route('ventas.index') }}" class="btn btn-danger">cancelar</a>

					</form>


				</div>

			</div>

		</div>
	</div>
</div>

<!--final contenido-->

@endsection
