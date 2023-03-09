<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//HOME PAGE
Route::get('/', [RecipeController::class, 'home']);
Route::get('/show/{id}', [RecipeController::class, 'home_show']);

//LOGIN
Route::get('login', [AuthController::class, 'show'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');

//REGISTRATION
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('register.store');

//LOGOUT
Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

//AUTH USER
Route::get('profile', [UserController::class, 'show'])
    ->middleware(['auth'])
    ->name('profile');


//AUTH USER PAGES
Route::get('admin', function () {
    return view('admin/admin');
})->middleware(['auth']);

//RECIPES
Route::middleware(['auth'])->group(function () {
    Route::get('recipes', [RecipeController::class, 'index']);
    Route::get('recipes/show/{id}', [RecipeController::class, 'show']);
    Route::get('recipes/create_new_recipe', [RecipeController::class, 'create']);
    Route::post('recipes/create_new_recipe', [RecipeController::class, 'store']);
    Route::any('recipes/edit/{id}', [RecipeController::class, 'edit'])->name('recipe.edit');
    Route::delete('recipes/delete/{id}', [RecipeController::class, 'delete'])->name('recipe.delete');
});

//CATEGORIES
Route::middleware(['auth'])->group(function () {
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create_new_category', [CategoryController::class, 'create']);
Route::post('categories/create_new_category', [CategoryController::class, 'store']);
Route::any('categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});

//INGREDIENTS
Route::middleware(['auth'])->group(function () {
Route::get('ingredients', [IngredientController::class, 'index']);
Route::get('ingredients/create_new_ingredient', [IngredientController::class, 'create']);
Route::post('ingredients/create_new_ingredient', [IngredientController::class, 'store']);
Route::any('ingredients/edit/{id}', [IngredientController::class, 'edit'])->name('ingredient.edit');
Route::delete('ingredients/delete/{id}', [IngredientController::class, 'delete'])->name('ingredient.delete');
});
