<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFullCustomController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FullCustomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavbarNotifController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/', function () {
    // Return your home page content (e.g., a view)
    return view('auth/login');
  });
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/catalog', [HomeController::class, 'products'])->name('products');
Route::get('/product/detail/{product:slug}', [HomeController::class, 'show'])->name('detail');
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => "Product By Category : $category->name",
        'products' => $category->products->load('category')
    ]);
});

Route::get('/dashboard', function () {
    if (auth()->user()->roles == 'admin') {
        return redirect('/admin/dashboard');
    }
    return view('home');
})->middleware(['auth', 'verified']);

Route::middleware('admin', 'verified')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/category/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    Route::get('/admin/product/checkSlug', [AdminProductController::class, 'checkSlug']);
    Route::resource('/admin/category', AdminCategoryController::class);
    Route::resource('/admin/product', AdminProductController::class);
    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('user');
    Route::get('/admin/incomingorder', [AdminOrderController::class, 'incoming_order'])->name('incoming');
    Route::get('/admin/incomingorder/detail/{order:id}', [AdminOrderController::class, 'detail_incoming_order']);
    Route::get('/admin/incomingorder/proses/{order:id}', [AdminOrderController::class, 'proses_incoming_order']);
    Route::put('/admin/incomingorder/proses/konfirmasi/{id}', [AdminOrderController::class, 'konfirmasi_incoming_order']);
    Route::delete('/admin/incomingorder/delete/{id}', [AdminOrderController::class, 'delete_incoming_order']);
    Route::get('/admin/allorder', [AdminOrderController::class, 'all_order'])->name('all');
    Route::get('/admin/allorder/detail/{order:id}', [AdminOrderController::class, 'detail_all_order']);
    Route::get('/admin/allorder/edit/{order:id}', [AdminOrderController::class, 'edit_all_order']);
    Route::put('/admin/allorder/edit/konfirmasi/{order:id}', [AdminOrderController::class, 'konfirmasi_edit_all_order']);
    Route::delete('/admin/allorder/delete/{id}', [AdminOrderController::class, 'delete_all_order']);
    Route::get('/admin/allorder/shipment/{order:id}', [AdminOrderController::class, 'shipment']);
    Route::put('/admin/allorder/shipment/edit/{id}', [AdminOrderController::class, 'updateShipment'])->name('updateShipment');
    Route::get('/admin/fullcustom', [AdminFullCustomController::class, 'index'])->name('full');
    Route::get('/admin/fullcustom/chat/{full_custom:id}', [AdminFullCustomController::class, 'chat'])->name('chat');
    // Route::get('/admin/fullcustom/message/{id}', [AdminFullCustomController::class, 'oneRead'])->name('oneRead');
    Route::get('/admin/fullcustom/allRead', [AdminFullCustomController::class, 'allRead'])->name('allRead');
    Route::post('/admin/fullcustom/send/{id}', [AdminFullCustomController::class, 'sendMessageAdmin']);
    Route::delete('/admin/fullcustom/delete/{id}', [AdminFullCustomController::class, 'delete_full_custom']);
});

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/myprofil/update', [UserController::class, 'update']);
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/settings', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/settings/address/add', [ShipmentController::class, 'store']);
    Route::get('/settings/address/edit/{shipment:id}', [ShipmentController::class, 'edit']);
    Route::put('/settings/address/{shipment:id}', [ShipmentController::class, 'update']);
    Route::delete('/settings/address/delete/{id}', [ShipmentController::class, 'destroy']);
    Route::post('/order/{id}', [OrderController::class, 'order']);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/detail/{order:id}', [OrderController::class, 'orderDetail'])->name('orderDetail');
    Route::put('/order/evidencetf/{id}', [OrderController::class, 'confirm_evidencetf']);
    Route::get('/order/evidencetf/{order:id}', [OrderController::class, 'evidencetf'])->name('order_detail_tf');
    Route::put('/order/evidencetf2/{id}', [OrderController::class, 'confirm_evidencetf2']);
    Route::get('/order/evidencetf2/{order:id}', [OrderController::class, 'evidencetf2'])->name('order_detail_tf2');
    Route::get('/fullpayment/{order:id}', [OrderController::class, 'showpay'])->name('showpay');
    Route::put('/fullpayment/submit/{id}', [OrderController::class, 'fullpayment'])->name('fullpayment');
    Route::get('/orderform', [OrderDetailController::class, 'orderform'])->name('orderform');
    Route::get('/orderform/checkout', [OrderDetailController::class, 'confirmation']);
    Route::delete('/orderform/{id}', [OrderDetailController::class, 'delete']);
    Route::post('/orderform/address', [OrderDetailController::class, 'addAddress']);
    Route::post('/orderform/address/pick', [OrderDetailController::class, 'addressOption']);
    Route::post('/orderform/paymentoption', [OrderDetailController::class, 'paymentoption']);
    Route::put('/complete/order', [OrderDetailController::class, 'complete_order']);
    Route::get('/fullcustom-form', [FullCustomController::class, 'custom_form'])->name('custom_form');
    Route::post('/fullcustom/add', [FullCustomController::class, 'fullcustom_order']);
    Route::get('/fullcustom-orders', [FullCustomController::class, 'index'])->name('fullCustoms');
    Route::get('/fullcustom/detail/{full_custom:id}', [FullCustomController::class, 'fullcustomDetail'])->name('fullcustomDetail');
    // Route::get('/fullcustom/message/{id}', [FullCustomController::class, 'oneRead'])->name('oneRead');
    // Route::get('/fullcustom/allRead', [FullCustomController::class, 'allRead'])->name('allRead');
    Route::post('/fullcustom/send', [FullCustomController::class, 'sendMessage']);
});
require __DIR__ . '/auth.php';
