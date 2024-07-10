 <?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
// use App\Http\Controllers\LanguageController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/items/ricerca', [HomeController::class, 'search'])->name('items.search');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



Route::get('/admin/items', [ItemController::class, 'index'])->name('admin.items.index');
Route::get('/admin/items/create', [ItemController::class, 'create'])->name('admin.items.create');
Route::post('/admin/items', [ItemController::class, 'store'])->name('admin.items.store');
Route::get('/admin/items/{id}', [ItemController::class, 'show'])->name('admin.items.show');
Route::get('/admin/items/{id}/edit', [ItemController::class, 'edit'])->name('admin.items.edit');
Route::put('/admin/items/{id}/update', [ItemController::class, 'update'])->name('admin.items.update');
Route::delete('/admin/items/{id}', [ItemController::class, 'destroy'])->name('admin.items.destroy');


Route::get('/sizes', [SizeController::class, 'index'])->name('sizes.index');
Route::get('/sizes/create', [SizeController::class, 'create'])->name('sizes.create');
Route::post('/sizes', [SizeController::class, 'store'])->name('sizes.store');
Route::get('/sizes/{id}', [SizeController::class, 'show'])->name('sizes.show');
Route::get('/sizes/{id}/edit', [SizeController::class, 'edit'])->name('sizes.edit');
Route::put('/sizes/{id}', [SizeController::class, 'update'])->name('sizes.update');
Route::delete('/sizes/{id}', [SizeController::class, 'destroy'])->name('sizes.destroy');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/colors', [ColorController::class, 'index'])->name('actors.index');
Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
Route::get('/colors/{id}', [ColorController::class, 'show'])->name('colors.show');
Route::get('/colors/{id}/edit', [ColorController::class, 'edit'])->name('colors.edit');
Route::put('/colors/{id}', [ColorController::class, 'update'])->name('colors.update');
Route::delete('/colors/{id}', [ColorController::class, 'destroy'])->name('colors.destroy');


Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/create', [CollectionController::class, 'create'])->name('collections.create');
Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');
Route::get('/collections/{id}', [CollectionController::class, 'show'])->name('collections.show');
Route::get('/collections/{id}/edit', [CollectionController::class, 'edit'])->name('collections.edit');
Route::put('/collections/{id}', [CollectionController::class, 'update'])->name('collections.update');
Route::delete('/collections/{id}', [CollectionController::class, 'destroy'])->name('collections.destroy');
