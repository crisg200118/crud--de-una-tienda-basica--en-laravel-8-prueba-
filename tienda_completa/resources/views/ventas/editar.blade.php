@extends('layouts.plantilla')

@section('titulo','Editar Ventas')

@section('contenido')

<!--Nav bar inicio-->

<div class="container ">

  <h3>Ventas</h3>
  <ul class=" nav nav-tabs">
    <li class="nav-item" ><a class="nav-link " href="{{ route('inicio') }}">Inicio</a></li>
    <li class=" nav-item "><a class="nav-link " href="{{route('productos.index')}}">Productos</a></li>
    <li  class="nav-item" ><a class="nav-link active " href="{{ route('ventas.index') }}">Ventas</a></li>
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
					Editar Ventas
				</div>
				<div class="card-body">
					<form  action="" method="post" accept-charset="utf-8">
                      @csrf
                  <!--   <div class="form-group">
                     	<label for="descripcion">Descripcion</label>
					    <input type="text" name="descripcion" class="form-control" >

            </div>-->
                     <!-- select productos -->
                     <div class="form-group">
                      <label for="producto">Productos</label>
                        <select class="form-control" name="producto">
                            @foreach($productos as $productos)
                            <option  value="{{$productos->description}}">{{$productos->description}}</option>
                            @endforeach
                        </select>
                      </div>

                         <!-- select tienda -->
                      <div class="form-group">
                        <label for="tienda">Tiendas</label>
                         <select class="form-control" name="tienda">
                             @foreach($tiendas as $tiendas)
                             <option value="{{$tiendas->name}}">{{$tiendas->name}}</option>
                             @endforeach
                         </select>
                       </div>

                       <!-- select usuarios -->
                    <div class="form-group">
                      <label for="usuarios">Usuarios</label>
                       <select class="form-control" name="usuario">
                           @foreach($usuarios as $usuarios)
                           <option value="{{$usuarios->name}}">{{$usuarios->name}}</option>
                           @endforeach
                       </select>
                     </div>
                     <br>




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
