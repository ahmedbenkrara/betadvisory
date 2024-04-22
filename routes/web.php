<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EtudeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationStudentController;
use App\Http\Controllers\EchangeOrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfilecController;
use App\Http\Controllers\NewsLetterController;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


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
Route::get('/', [HomeController::class, 'index']);
Route::get('/cgv', function(){
    return view('client.paymentrules');
});

Route::get('/etudes', [EtudeController::class, 'index']);
Route::get('/etude/details/{id}', [EtudeController::class, 'show']);
///saveformation
Route::get('/formations', [FormationController::class, 'index']);
Route::get('/formation/details/{id}', [FormationController::class, 'show']);


Route::get('/cart', function () {
    return view('client.cart');
});

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'sendMail']);

Route::post('/newsletter', [NewsLetterController::class, 'store']);

Route::get('/dashboard', function () {
    if(Auth::user()->hasRole('user')){
        return redirect('/mesformations');
    }else{
        return redirect('/category/list');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth','role:admin']],function(){
    //admin
    Route::get('/category/list', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/create', [CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/category/edit/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy']);

    Route::get('/etude/list', [EtudeController::class, 'list']);
    Route::get('/etude/create', [EtudeController::class, 'create']);
    Route::post('/etude/create', [EtudeController::class, 'store']);
    Route::get('/etude/edit/{id}', [EtudeController::class, 'edit']);
    Route::put('/etude/edit/{id}', [EtudeController::class, 'update']);
    Route::delete('/etude/delete/{id}', [EtudeController::class, 'destroy']);

    Route::get('/formation/list', [FormationController::class, 'list']);
    Route::get('/formation/create', [FormationController::class, 'create']);
    Route::post('/formation/create', [FormationController::class, 'store']);
    Route::get('/formation/edit/{id}', [FormationController::class, 'edit']);
    Route::put('/formation/edit/{id}', [FormationController::class, 'update']);
    Route::delete('/formation/delete/{id}', [FormationController::class, 'destroy']);

    Route::get('/request/list', [EchangeOrderController::class, 'index']);
    Route::put('/request/edit/{id}', [EchangeOrderController::class, 'update']);

    Route::get('/formation/students/{id}', [FormationStudentController::class, 'index']);

    Route::get('/newsletter', [NewsLetterController::class, 'index']);

    //end admin
});


Route::group(['middleware' => ['auth','role:user']],function(){
    Route::get('/profile', [ProfilecController::class, 'index']);
    Route::patch('/profile', [ProfilecController::class, 'update']);

    //inscription formation
    Route::post('/saveformation', [FormationStudentController::class, 'store']);

    //exchange request
    Route::post('/exchange', [EchangeOrderController::class, 'store']);
    
    Route::get('/mesetudes', function () {
        return view('client.myetudes');
    });

    Route::get('/mesformations', function () {
        $user = Auth::user();
        $formations = $user->load('formationstudent.formation');
        return view('client.myformations', compact('formations'));
    });

    Route::get('/mesetudes', function () {
        return view('client.myetudes');
    });

    Route::post('/checkout', [OrderController::class, 'store']);

});
Route::get('/cancel/{id}', function($id){
    $order = Order::find($id);
    $order->delete();
    return redirect('/cart');
});

Route::post('/ok', function(Request $request){
    $localStorageRemovalScript = "<script> localStorage.removeItem('cart'); </script>";
    return redirect('/mesetudes')->with('localStorageRemovalScript', $localStorageRemovalScript);
})->withoutMiddleware([VerifyCsrfToken::class]);

Route::post('/fail/{id}', function(Request $request, $id){
    $order = Order::find($id);
    $order->delete();
    return redirect('cart');
})->withoutMiddleware([VerifyCsrfToken::class]);


// Route::middleware('auth')->group(function () {


    
// });

require __DIR__.'/auth.php';
