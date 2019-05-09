<?php
use Illuminate\Support\Facades\Route;

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

//thêm/update ảnh phần nghe
Route::post('/upload-image-listen', [
    'uses' => 'ListeningPartController@uploadimage'
]);
//thêm/update audio phần nghe
Route::post('/upload-audio-listen', [
    'uses' => 'ListeningPartController@uploadaudio'
]); 


//thêm các câu part1
Route::post('/part1/add', [
    'uses' => 'Part1Controller@createPart1'
]);
// lấy dữ liệu part1
Route::get('/part1/get', [
    'uses' => 'Part1Controller@getPart1'
]);
// update các câu part1
Route::post('/part1/update', [
    'uses' => 'Part1Controller@updatePart1'
]);
Route::get('/part1/practice', [
    'uses' => 'ListeningPartController@indexGuestPart1'
]);



Route::get('/part2/practice', [
    'uses' => 'ListeningPartController@indexGuestPart2'
]);


Route::get('/part3/practice', [
    'uses' => 'ListeningPartController@indexGuestPart3'
]);


Route::get('/part4/practice', [
    'uses' => 'ListeningPartController@indexGuestPart4'
]);


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
Route::post('manage-part5/add',[
    'uses' => 'ReadingPartController@addPart5'
])->name("readingpartcontroller.add");
Route::get('/manage-reading-part/part5/update',[
    'uses' => 'ReadingPartController@indexUpdatePart5'
]);
Route::get('/part1/delete', [
    'uses' => 'Part1Controller@DeletePart1'
]);
Route::post('manage-part5/update',[
    'uses' => 'ReadingPartController@updatePart5'
])->name("readingpartcontroller.update");
Route::get('/part5/practice', [
    'uses' => 'ReadingPartController@indexGuestPart5'
]);

// para part 7 admin
Route::get('/manager-para-part7', [
    'uses' => 'Part7ParagraphController@getPart7Paragraph'
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











Route::get('/test',[
    'uses' => 'TestController@index'
]);

Route::get('/test/add',[
    'uses' => 'TestController@addIndex'
]);

Route::get('/test/do',[
    'uses' => 'TestController@doTest'
]);
