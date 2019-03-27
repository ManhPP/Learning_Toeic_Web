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

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/reading', function(){
    return view('prHome');
});

Route::get('/listening', function(){
    return view('plHome');
});

Route::get('/testing', function(){
    return view('testHome');
});

Route::get("/forum", function(){
    return view("forumHome");
});


Route::get("/forum/add-discuss", function(){
    return view("addDiscuss");
});

Route::get("/test-toeic", function(){
    return view("testToeic");
});

Route::get("/forum/view-post", function(){
    return view("viewPost");
});
Route::get('/add-part-1', function () {
    return view('add_part_1');
});
Route::get('/add-part-2', function () {
    return view('add_part_2');
});
Route::get('/add-part-3', function () {
    return view('add_part_3');
});
Route::get('/add-part-4', function () {
    return view('add_part_4');
});
Route::get('/add-part-5', function () {
    return view('add_part_5');
});
Route::get('/add-part-6', function () {
    return view('add_part_6');
});
Route::get('/add-part-7', function () {
    return view('add_part_7');
});