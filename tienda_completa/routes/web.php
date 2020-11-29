<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\vendedor;
use App\Models\tienda;
use App\Models\ventas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('inicio');
})->name('inicio');


//route de productos/////

route::get('productos',function(){
	$productos=Product::all();
	return view('productos.index',compact('productos'));
})->name('productos.index');


route::get('productos/crear',function(){
	return view('productos.crear');
})->name('productos.crear');

route::post('productos',function(Request $datos){
    $producto = new Product;
    $producto->description = $datos->input('descripcion');
    $producto->price = $datos->input('precio');
    $producto->save();
   return redirect()->route('productos.index')->with('info_g','Se ha guardado correctamente') ;
})->name('productos.guardar');


route::delete('productos/{id}',function($id){
	$productos= Product::FindOrFail($id);
	 $productos->delete();

	return redirect()->route('productos.index')->with('info_e','Se ha Eliminado Correctamente') ;

})->name('productos.eliminar');


route::get('productos/{id}/editar',function($id){
	$productos = Product::FindOrFail($id);
     return view('productos.editar',compact('productos'));

})->name('productos.editar');

route::put('productos/{id}',function(Request $datos, $id ){
 $productos = Product::FindOrFail($id);
 $productos->description = $datos->input('descripcion');
 $productos->price = $datos->input('precio');
 $productos->save();

 return redirect()->route('productos.index')->with('info_a','Se ha Actualizado Correctamente');
})->name('productos.actualizar');
///fin de route de productos///






///////route de vendedores//////

route::get('vendedores',function(){
 $vendedores =vendedor::all();
  return view('vendedores.index',compact('vendedores'));
})->name('vendedores.index');



/////// fin route de vendedores//////








///////route de ventas//////


route::get('ventas',function(){
  $ventas =ventas::all();
 $products = ventas::with('products')->get();
 $tiendas = ventas::with('tiendas')->get();
 $vendedor = ventas::with('vendedores')->get();
  return view('ventas.index',compact('products','tiendas','vendedor','ventas'));
})->name('ventas.index');


route::get('ventas/crear',function(){
  $productos=Product::all();
  $tiendas=tienda::all();
  //$vendedor=vendedor::all();,'vendedor'
  return view('ventas.crear',compact('productos','tiendas'));
})->name('ventas.crear');



/////// fin route de ventas//////









/// route de tiendas///


route::get('tiendas',function(){
  $tienda =tienda::all();
  return view('tiendas.index',compact('tienda'));
})->name('tiendas.index');


route::get('tiendas/crear',function(){
  return view('tiendas.crear');
})->name('tiendas.crear');

route::post('tiendas',function(Request $datos){
  $tienda = new tienda;
  $tienda->name = $datos->input('name');
  $tienda->direccion = $datos->input('direccion');
  $tienda->telefono = $datos->input('telefono');
  $tienda->dueño = $datos->input('dueño');
  $tienda->save();
   return redirect()->route('tiendas.index')->with('info_g', 'Tienda guardada con exito');

})->name('tiendas.guardar');

route::get('tiendas/editar/{id}',function($id){
  $tienda = tienda::FindOrFail($id);
  return view('tiendas.editar',compact('tienda'));
})->name('tiendas.editar');

route::put('tiendas{id}', function(Request $datos ,$id){
  $tienda = tienda::FindOrFail($id);
  $tienda->name = $datos->input('name');
  $tienda->direccion =$datos->input('direccion');
  $tienda->telefono = $datos->input('telefono');
  $tienda->dueño = $datos->input('dueño');
  $tienda->save();
  return redirect()->route('tiendas.index')->with('info_a', 'Se ha editado correctamente');
})->name('tiendas.actualizar');

route::delete('tiendas/{id}',function( $id){
  $tienda = tienda::FindOrFail($id);
  $tienda->delete();
  return redirect()->route('tiendas.index')->with('info_e', 'Se ha eliminado la tienda con exito');
})->name('tiendas.eliminar');



/////// fin route de tiendas//////





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
