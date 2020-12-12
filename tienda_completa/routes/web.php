<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\tienda;
use App\Models\ventas;
use App\Models\User;

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





///////route de usuarios//////

route::get('usuarios',function(){
 $usuarios = User::all();
  return view('usuarios.index',compact('usuarios'));
})->name('usuarios.index');



route::get('usuarios/crear',function(){
  return view('usuarios.crear');

})->name('usuarios.crear');



route::post('usuarios',function(Request $datos){
  $usuarios = new User;
  $usuarios->name = $datos->input('name');
  $usuarios->email = $datos->input('email');
  $usuarios->password = $datos->input('password');
  $usuarios->save();
  return Redirect()->route('usuarios.index')->with('info_g', 'Se ha guardado correctamente');
})->name('usuarios.guardar');


route::delete('usuarios/{id}',function($id){
$usuarios = User::FindOrFail($id);
$usuarios->delete();
return  redirect()->route('usuarios.index')->with('info_e', 'Se ha eliminado correctamente');
})->name('usuarios.eliminar');



route::get('usuarios/editar/{id}',function($id){
  $usuarios = User::FindOrFail($id);
  return view('usuarios.editar',compact('usuarios'));
})->name('usuarios.editar');


route::put('usuarios/{id}',function(Request $datos,$id){
  $usuarios = User::FindOrFail($id);
  $usuarios->name = $datos->input('name');
  $usuarios->email = $datos->input('email');
  $usuarios->password = $datos->input('password');
  $usuarios->save();
  return redirect()->route('usuarios.index')->with('info_a', 'Se ha Actualizado correctamente');
})->name('usuarios.actualizar');

/////// fin route de usuarios//////








///////route de ventas//////


route::get('ventas',function(){
 $ventas =ventas::all();
//$products = ventas::with('products')->get();'products','tiendas','usuarios',
 //$tiendas = ventas::with('tiendas')->get();
  //$usuarios = ventas::with('User')->get();
  $data = DB::table('ventas')
            ->join('products','products.id','=','ventas.producto_id')
            ->join('users','users.id','=','ventas.vendedor_id')
            ->join('tiendas','tiendas.id','=','ventas.tienda_id')
            ->select('ventas.*','products.description','products.price','tiendas.name as tienda','tiendas.direccion','users.name')
            ->get();
  return view('ventas.index',compact('ventas','data'));
})->name('ventas.index');


route::get('ventas/crear',function(){
  $productos=Product::all();
  $tiendas=tienda::all();
  $usuarios = User::all();
  return view('ventas.crear',compact('productos','tiendas','usuarios'));
})->name('ventas.crear');


route::post('ventas',function(Request $datos){
  $ventas =  new ventas;
  $ventas->producto_id = $datos->get('producto');
  $ventas->vendedor_id = $datos->get('usuario');
  $ventas->tienda_id = $datos->get('tienda');
  $ventas->save();
  return redirect()->route('ventas.index')->with('info_g', 'Se ha hecho la venta correctamente');
})->name('ventas.guardar');

route::get('ventas/editar/{id}',function($id){
  $productos = DB::table('ventas')
            ->join('products','products.id','=','ventas.producto_id')
            ->join('users','users.id','=','ventas.vendedor_id')
            ->join('tiendas','tiendas.id','=','ventas.tienda_id')
            ->select('ventas.*','products.description','products.price','tiendas.name as tienda','tiendas.direccion','users.name')
            ->where('products.id','=', $id)
            ->get();
  $tiendas = DB::table('ventas')
            ->join('products','products.id','=','ventas.producto_id')
            ->join('users','users.id','=','ventas.vendedor_id')
            ->join('tiendas','tiendas.id','=','ventas.tienda_id')
            ->select('ventas.*','products.description','products.price','tiendas.name as tienda','tiendas.direccion','users.name')
            ->get();
$usuarios = DB::table('ventas')
            ->join('products','products.id','=','ventas.producto_id')
            ->join('users','users.id','=','ventas.vendedor_id')
            ->join('tiendas','tiendas.id','=','ventas.tienda_id')
            ->select('ventas.*','products.description','products.price','tiendas.name as tienda','tiendas.direccion','users.name')
            ->get();

  $ventas = ventas::FindOrFail($id);
  return view('ventas.editar',compact('ventas','productos','tiendas','usuarios'));
})->name('ventas.editar');



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
