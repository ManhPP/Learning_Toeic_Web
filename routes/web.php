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

// part6 an part6Paragraph
Route::get('/add-part-6','Part6ParagraphController@listPart6');
Route::post('/admin/bai-hoc-manager/add-part-doc/add','ReadingPartController@addPart6');


Route::get('/admin/bai-hoc-manager/update-part-doc/{id}','ReadingPartController@getPartDoc');
Route::post('/admin/bai-hoc-manager/update-part-doc/update','ReadingPartController@updatePart6');


Route::get('/manage-part6Paragraph', 'Part6ParagraphController@listPart6Para');
Route::post('manager-doan-part6/add', 'Part6ParagraphController@add');

Route::post('manager-doan-part6/update', 'Part6ParagraphController@update');

Route::get('/manager-doan-part6/del', 'Part6ParagraphController@delete');


// part 7 and part7 paragraph

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


Route::get("/guest/luyen-doc/{id}","ReadingPartController@practicePartDoc");


Route::get('/adlesson', function(){
    return view('adminLesson');
});

Route::get('/addiscuss', function(){
    return view('adminDiscuss');
});

Route::get('/adacc', function(){
    return view('adminAcc');
});
// test
Route::get('/manager-para-part7', [
    'uses' => 'Part7ParagraphController@getPart7Paragraph'
]);

Route::post('/addlistening-part1', [
    'uses' => 'ListeningPartController@createpart1'
]);

//upload file part 7
Route::post("/manager-para-part7/upload",[
    'uses' => 'Part7ParagraphController@uploadFile'
])->name('part7paragraph.upload');

//add para part 7
Route::post("/manager-para-part7/add",[
    "uses"=> 'Part7ParagraphController@addPara'
]) -> name("part7paragraph.add");

//update para part 7
Route::post("/manager-para-part7/update",[
    "uses"=>'Part7ParagraphController@updatePara'
]) -> name("part7paragraph.update");

Route::get("/manager-para-part7/del",[
    "uses"=>"Part7ParagraphController@delPara"
]) -> name("part7paragraph.delpara");

// part 7 admin
Route::get('/manager-reading-part/add-part7', [
    'uses' => 'ReadingPartController@getPart7'
]);
Route::post('/manager-reading-part/add-part7/add', [
    'uses' => 'ReadingPartController@addPart7'
])->name("readingpartcontroller.addpart7");
Route::get('manager-reading-part/update-part7', [
    'uses'=> 'ReadingPartController@indexUpdatePart7'
]);
Route::post('manager-reading-part/update-part7/update', [
    'uses'=> 'ReadingPartController@updatePart7'
])->name("readingpartcontroller.updatepart7");



//part 5
Route::get('/manage-sentence-part5',[
    'uses' => 'Part5Controller@index'
]);

Route::post('manage-sentence-part5/add',[
    'uses' => 'Part5Controller@add'
])->name("part5controller.add");
Route::post('manage-sentence-part5/update',[
    'uses' => 'Part5Controller@update'
])->name("part5controller.update");
Route::post('manage-sentence-part5/delete',[
    'uses' => 'Part5Controller@delete'
])->name("part5controller.delete");
Route::get('/manage-reading-part/part5/add',[
    'uses' => 'ReadingPartController@indexAddPart5'
]);

Route::post('manage-part5/update',[
    'uses' => 'ReadingPartController@updatePart5'
])->name("readingpartcontroller.update");
Route::post('manage-part5/add',[
    'uses' => 'ReadingPartController@addPart5'
])->name("readingpartcontroller.add");
Route::get('/manage-reading-part/part5/update',[
    'uses' => 'ReadingPartController@indexUpdatePart5'
]);


//manage bai hoc admin

Route::get("/admin/manager-baihoc-pd","ReadingPartController@getListPartDoc");

Route::post("/admin/part-doc/del-part-doc","ReadingPartController@delPartDoc");

Route::get("/user/discussion/view","DiscussionController@accessDiscussion");
