<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 主页
Route::any('/','BlogController@main');

//帖子
Route::get('scan_view','BlogController@scan_view');
Route::get('create_view','BlogController@create_view');
Route::post('create','BlogController@create');
Route::get('manage_view','BlogController@manage_view');
Route::any('delete','BlogController@delete');
Route::any('update_view', 'BlogController@update_view');
Route::any('update', 'BlogController@update');
Route::any('delete_comment','BlogController@delete_comment');
Route::get('blog_content/{unique_id}','BlogController@blog_content');
Route::any('comment','BlogController@comment');
Route::any('delete_comment','BlogController@delete_comment');

//管理



Route::group(['middleware'=>['admin']],function ()
{
    Route::get('admin','BlogController@admin');
    Route::get('admin_users','BlogController@admin_users');
    Route::get('admin_blogs','BlogController@admin_blogs');
    Route::get('admin_comments','BlogController@admin_comments');
    Route::any('admin_createAdmin_view','BlogController@admin_createAdmin_view');
    Route::any('admin_createAdmin','BlogController@admin_createAdmin');
    Route::any('delete_blogs/{unique_id}','BlogController@delete_blogs');
    Route::any('delete_users/{id}','BlogController@delete_users');
    Route::any('delete_comments/{unique_id}','BlogController@delete_comments');
    Route::any('users_update/{id}','BlogController@users_update');
});


//
Auth::routes();

Route::get('/home', 'HomeController@index');
