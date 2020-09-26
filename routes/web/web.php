<?php

Route::get('/', 'HomeController@index')->name('home');

// Route::group(['namespace' => 'Auth'], function () {
//     Route::get('/login', 'SocialAccountController@showLoginForm')->name('login');
//     Route::get('login/{provider}', 'SocialAccountController@redirectToProvider')->name('redirect.provider');
//     Route::get('{provider}/callback', 'SocialAccountController@handleProviderCallback');
//     Route::get('email', 'SocialAccountController@getEmail')->name('get.email');
//     Route::post('email', 'SocialAccountController@storeEmail')->name('store.email');
// });

Auth::routes(['verify' => true]);

// 認証ずみのみ
Route::group(['middleware' => ['auth:user']], function () {
});

// 認証ずみのみ
Route::group(['middleware' => ['auth:user', 'verified']], function () {
});
