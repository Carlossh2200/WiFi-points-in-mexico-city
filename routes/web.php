<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\YourController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/faqs', function () {
    return view('faqs');    
});

Route::get('/complaint', function () {
    return view('complaint');    
});

Route::get('/login', function () {
    return view('login');    
});

Route::get('/search', function () {
    return view('search');    
});

Route::get('/actualizar', function () {
    return view('actualizar');    
});

Route::get('/encargado', function () {
    $nombreEncargado = DB::table('encargado')->get();
    return view('encargado',[
        'nombreEncargado' => $nombreEncargado
    ]);
});

Route::get('/search', function (\Illuminate\Http\Request $request) {
    $page = $request->input('page');
    $query = $request->input('query');
    session_start();
    $_SESSION['type']=$page;
    $_SESSION['except']=$query;
    $_SESSION['Actual']=0;

    // Perform the database query based on $page and $query
    $results = DB::table($page)->where('field', 'like', "%{$query}%");
    return view('search', ['searchResults' => $results]);
})->name('search');

Route::get('/search2', function (\Illuminate\Http\Request $request) {
    $Atras = $request->input('Atras');
    $Adelante = $request->input('Adelante');
    session_start();
    if ($Atras=="1"){
        $_SESSION['Actual']=$_SESSION['Actual']-1;
    }
    else{
        $_SESSION['Actual']=$_SESSION['Actual']+1;
    }
    // Perform the database query based on $page and $query
    $results = DB::table($Atras)->where('field', 'like', "%{$Adelante}%");
    return view('search', ['searchResults' => $results]);
})->name('search2');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        echo "Connected successfully to the database!";
    } catch (\Exception $e) {
        die("Could not connect to the database. Error: " . $e->getMessage());
    }
});