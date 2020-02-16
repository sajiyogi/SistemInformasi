<?php

Route::redirect('/', '/login');

Route::get('/register', 'Auth/RegisterController@create');
Route::post('register', 'RegistrationController@store');
Auth::routes(['register' => false]);
Route::get('admin-login','Auth\AdminLoginController@showLoginForm');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');
    Route::resource('barang', 'BarangController');
    Route::delete('barang/destroy', 'BarangController@massDestroy')->name('barang.massDestroy');
    Route::resource('kategori', 'KategoriController');
    Route::delete('kategori/destroy', 'KategoriController@massDestroy')->name('kategori.massDestroy');
    Route::resource('jenis', 'JenisController');
    Route::delete('jenis/destroy', 'JenisController@massDestroy')->name('jenis.massDestroy');

});
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

});