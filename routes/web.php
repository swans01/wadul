<?php

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
    return view('home');
});

Route::get('/register' , function(){
    return view('registrasi');
});

Route::get('/login' , function(){
    return view('login');
});

Route::get('/halamanAdmin' , [
    'uses' => 'c_postingan@tampilAdmin', 
    'as' => 'halamanAdmin',]);

Route::get('/kelola-user', [
    'uses' => 'c_user@tampilUser',
    'as' => 'tampilUser'
]);

Route::get('/delete-user/{user_id}', [
    'uses' => 'c_user@deleteUser',
    'as' => 'deleteUser'
]);

Route::get('/logout', [
    'uses' => 'c_autentikasi@logout'
]);

Route::get('/halamanUtama' , [
    'uses' => 'c_postingan@tampilPostingan', 
    'as' => 'halamanUtama',])->middleware('auth');


Route::post('/register', [
    'uses' => 'c_user@addUser',
    'as' => 'register'
]);

Route::post('/login', [
    'uses' => 'c_autentikasi@login',
    'as' => 'login'
]);

Route::post('/addPostingan', [
    'uses' => 'c_postingan@addPostingan',
    'as' => 'addPostingan'
]);

Route::get('/profile/{user_id}', [
    'uses' => 'c_user@tampilProfile',
    'as' => 'profileUser'
]);

Route::post('/edit-user', [
    'uses' => 'c_user@editUser',
    'as' => 'editUser'
]);

Route::get('/userImage/{filename}', [
    'uses' => 'c_user@getImage',
    'as' => 'accountImage'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'c_postingan@deletePostingan',
    'as' => 'deletePost'
]);

Route::get('/edit-post/{post_id}', [
    'uses' => 'c_postingan@showEditPostingan',
    'as' => 'showEditPost'
]);

Route::get('/add-post/{post_id}', [
    'uses' => 'c_postingan@addStatus',
    'as' => 'addStatus'
]);

Route::post('/edit-post/{post_id}', [
    'uses' => 'c_postingan@editPostingan',
    'as' => 'editPost'
]);

Route::get('/tampil-komentar/{post_id}', [
    'uses' => 'c_komentar@tampilKomentar',
    'as' => 'tampilKomentar'
]);

Route::post('/add-komentar/{post_id}', [
    'uses' => 'c_komentar@addKomentar',
    'as' => 'addKomentar'
]);

Route::get('/edit-komentar/{komentar_id}', [
    'uses' => 'c_komentar@showEditkomentar',
    'as' => 'showEditKomentar'
]);

Route::post('/edit-komentar/{komentar_id}', [
    'uses' => 'c_komentar@editkomentar',
    'as' => 'editKomentar'
]);

Route::get('/delete-komentar/{komentar_id}', [
    'uses' => 'c_komentar@deleteKomentar',
    'as' => 'deleteKomentar'
]);

Route::get('/add-agree/{post_id}', [
    'uses' => 'c_agree@addAgree',
    'as' => 'addAgree'
]);

Route::get('/delete-agree/{post_id}', [
    'uses' => 'c_agree@deleteAgree',
    'as' => 'deleteAgree'
]);