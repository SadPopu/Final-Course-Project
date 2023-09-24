<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsData;
use App\Http\Controllers\UsersData;
use App\Http\Controllers\CartController;

//Route::get('/' , 'listindex');

Route::get('adduser', function(){
    return view ('adduser');
});

Route::post('adduser', function(){
  $user = new User();
  $user -> username = request('username');
  $user -> password = request('pw');
  $user -> NIF = request('nif');
  $user -> email = request('email');
  $user -> name = request('name');
  $user -> surname = request('surname');
  $user -> phoneNumber = request('phone');
  $user -> address = request('add');
  $user -> postalCode = request('postal');
  $user -> roleID =1;
  $user -> save();
});




Route::controller(LoginController::class)->group(function(){
    Route::get ('login', 'login' )->name('login');
    Route::get ('registration', 'registration' )->name('registration');
    Route::get ('logout', 'logout' )->name('logout');
    Route::post ('validate_registration','validate_registration')->name('sample.validate_registration');
    Route::post ('validate_login','validate_login')->name('sample.validate_login');
    Route::put('/validate_update', 'validate_update')->name('sample.validate_update');
    Route::put('/validate_update_admin', 'validate_update_admin')->name('sample.validate_update_admin');
    Route::get ('dashboard', 'dashboard' )->name('dashboard');
    Route::get('profile', 'profile')->name('profile');
    Route::get('profile-edit', 'profileedit')->name('profileedit');
    Route::get('profileeditadmin/{id}', 'editProfileAdmin')->name('editprofileadmin');
    Route::get('profiledeleteadmin/{id}', 'deleteProfileAdmin')->name('deleteprofileadmin');
    Route::delete('/users/{id}', 'confirmDelete')->name('confirmDeleteUserAdmin');
    
    
}); 

Route::controller(ProductsData::class)->group(function(){
  Route::get('/', 'listindex')->name('index');
  Route::get('products/{page}' , 'list')->name('productslist');
  Route::get('products' , 'list')->name('productslist');
  Route::get('myProducts/{page}', 'listMy')->name('myproducts');
  Route::get('product-edit/{id}', 'editProduct')->name('productedit');
  Route::get('product-edit-admin/{id}', 'editProductAdmin')->name('producteditadmin');
  Route::get('product-delete-confirm/{id}', 'deleteProductConfirm')->name('productdeleteconfirm');
  Route::get('product-delete-confirm-admin/{id}', 'deleteProductConfirmAdmin')->name('productdeleteconfirmadmin');
  Route::get('addproduct', 'addproduct')->name('addproduct');
  Route::put('/validate_add_product', 'validate_add_product')->name('sample.validate_add_product');
  Route::put('/validate_update_product', 'validate_update_product')->name('sample.validate_update_product');
}); 

Route::controller(CategoriesController::class)->group(function(){
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
    Route::get('/categories/{id}/edit',  'edit')->name('categories.edit');
    Route::put('/categories/{id}', 'update')->name('categories.update');
    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
}); 

Route::controller(UsersData::class)->group(function(){
  Route::get('users' , 'list')->name('users');
}); 

Route::controller(CartController::class)->group(function(){
  Route::get('/cart', 'index')->name('cart');
}); 
