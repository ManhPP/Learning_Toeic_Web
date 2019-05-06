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

Route::get('/add-part-6','Part6ParagraphController@listPart6');

Route::get('/add-part6Paragraph', 'Part6ParagraphController@listPart6Para');

Route::get('/add-part-7', function () {
    return view('add_part_7');
});
Route::get("/listening/part1",function(){
   return view("part1");
});

Route::get("/listening/part2",function(){
    return view("part2");
});

Route::get("/listening/part3",function(){
    return view("part3");
});

Route::get("/listening/part4",function(){
    return view("part4");
});

Route::get("/reading/part5",function(){
    return view("part5");
});

Route::get("/reading/part6",function(){
    return view("part6");
});

Route::get("/reading/part7",function(){
    return view("part7");
});

Route::get('/adlesson', function(){
    return view('adminLesson');
});

Route::get('/addiscuss', function(){
    return view('adminDiscuss');
});

Route::get('/adacc', function(){
    return view('adminAcc');
});
Route::get('/test-relationship', [
    'uses' => 'Part7ParagraphController@getPart7Paragraph'
]);

Route::post('/addlistening-part1', [
    'uses' => 'ListeningPartController@createpart1'
]);
