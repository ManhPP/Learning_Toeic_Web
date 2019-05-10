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

// cho guest va user
//Route::get('/part1/practice', [
//    'uses' => 'ListeningPartController@indexGuestPart1'
//]);
//Route::get('/part2/practice', [
//    'uses' => 'ListeningPartController@indexGuestPart2'
//]);
//Route::get('/part3/practice', [
//    'uses' => 'ListeningPartController@indexGuestPart3'
//]);
//Route::get('/part4/practice', [
//    'uses' => 'ListeningPartController@indexGuestPart4'
//]);
//Route::get('/part5/practice', [
//    'uses' => 'ReadingPartController@indexGuestPart5'
//]);
//manage bai hoc admin
//cho admin===========================================================================
//trang chu admin quan ly phan nghe
Route::get('/admin/manager-listening-part', [
    'uses' => 'ListeningPartController@get'
]);
//trang chu admin quan ly phan doc
Route::get("/admin/manager-reading-part","ReadingPartController@getListPartDoc");
Route::post("/admin/part-doc/del-part-doc","ReadingPartController@delPartDoc");
Route::get('/admin/bai-hoc-manager/update-part-doc','ReadingPartController@getPartDoc');
//trang chu admin quan ly bkt
Route::get("/admin/manager-testing",[
    'uses'=>'TestController@indexForAdminHome'
]);
//trang chu admin quan ly bai thao luan
Route::get("/admin/manager-discussion",[
   'uses'=> 'DiscussionController@indexAdminManager'
]);

//thêm/update ảnh phần nghe
Route::post('/upload-image-listen', [
    'uses' => 'ListeningPartController@uploadimage'
])->name("listeningpartcontroller.uploadimage");
//thêm/update audio phần nghe
Route::post('/upload-audio-listen', [
    'uses' => 'ListeningPartController@uploadaudio'
])->name("listeningpartcontroller.uploadaudio");
//thêm các câu part1
//================= part 1 ===========================
Route::get('/admin/manager-listening-part/add-part1', function () {
    return view('add_part_1_new');
});
Route::post('/admin/manager-listening-part/add-part1/do-add', [
    'uses' => 'Part1Controller@create'
])->name("part1controller.create");
// update các câu part1
Route::post('/admin/manager-listening-part/update-part1/do-update', [
    'uses' => 'Part1Controller@update'
])->name("part1controller.update");
//================= end part 1 ===========================
//================= part 2 ===========================
//================= end part 2 ===========================
//================= part 3, 4 ===========================
// Thêm part 3,4
Route::get('/admin/manager-listening-part/add-part3', function () {
    return view('add_part_3');
});
Route::get('/admin/manager-listening-part/add-part4', function () {
    return view('add_part_4');
});
Route::post('/admin/manager-listening-part/add-part3/do-add', [
    'uses' => 'ConversationParagraphController@createCPPart3'
])->name("conversationparagraphcontroller.createcppart3");
// Update part 3,4
Route::post('/admin/manager-listening-part/update-part3/do-update', [
    'uses' => 'ConversationParagraphController@updatePart3'
])->name('conversationparagraphcontroller.updatepart3');
//================= end part 3,4===========================
//================= part 5 ===========================
//them cau part 5
Route::get('admin/manager-sentence-part5',[
    'uses' => 'Part5Controller@index'
]);
Route::post('admin/manager-sentence-part5/add',[
    'uses' => 'Part5Controller@add'
])->name("part5controller.add");
// update cau part 5
Route::post('admin/manager-sentence-part5/update',[
    'uses' => 'Part5Controller@update'
])->name("part5controller.update");
// delete cau part 5
Route::post('admin/manager-sentence-part5/delete',[
    'uses' => 'Part5Controller@delete'
])->name("part5controller.delete");
//add part 5 index
Route::get('admin/manager-reading-part/add-part5',[
    'uses' => 'ReadingPartController@indexAddPart5'
]);
Route::post('admin/manager-reading-part/add-part5/do-add',[
    'uses' => 'ReadingPartController@addPart5'
])->name("readingpartcontroller.add");
//// update part 5
//Route::get('admin/manage-reading-part/updatepart5/update',[
//    'uses' => 'ReadingPartController@indexUpdatePart5'
//]);
Route::post('/admin/manager-reading-part/update-part5/do-update',[
    'uses' => 'ReadingPartController@updatePart5'
])->name("readingpartcontroller.update");
//================= end part 5 ===========================
//================= part 6 ===========================
// manager doan part 6
Route::get('admin/manager-para-part6', 'Part6ParagraphController@listPart6Para');
Route::post('/admin/manager-para-part6/delete', 'Part6ParagraphController@delete')
    ->name("part6paragraphcontroller.delete");
Route::post('admin/manager-para-part6/add', 'Part6ParagraphController@add')
    ->name("part6paragraphcontroller.add");
Route::post('admin/manager-para-part6/update', 'Part6ParagraphController@update')
    ->name("part6paragraphcontroller.update");
// magager part 6
//add part 6
Route::get('/admin/manager-reading-part/add-part6','Part6ParagraphController@listPart6');
Route::post('/admin/manager-reading-part/add-part6/do-add','ReadingPartController@addPart6')
    ->name("readingpartcontroller.addpart6");

Route::post('/admin/manager-reading-part/update-part6/do-update','ReadingPartController@updatePart6')
    ->name("readingpartcontroller.updatepart6");
//================= end part 6 ===========================
//================= part 7 ===========================
// para part 7 admin
Route::get('admin/manager-para-part7', [
    'uses' => 'Part7ParagraphController@getPart7Paragraph'
]);
//add para part 7
Route::post("admin/manager-para-part7/add",[
    "uses"=> 'Part7ParagraphController@addPara'
]) -> name("part7paragraph.add");
//update para part 7
Route::post("admin/manager-para-part7/update",[
    "uses"=>'Part7ParagraphController@updatePara'
]) -> name("part7paragraph.update");
Route::get("admin/manager-para-part7/delete",[
    "uses"=>"Part7ParagraphController@delPara"
]) -> name("part7paragraph.delpara");

//upload file part 7
Route::post("/manager-para-part7/upload",[
    'uses' => 'Part7ParagraphController@uploadFile'
])->name('part7paragraph.upload');

// part 7 admin
Route::get('/admin/manager-reading-part/add-part7', [
    'uses' => 'ReadingPartController@getPart7'
]);
Route::post('/admin/manager-reading-part/add-part7/do-add', [
    'uses' => 'ReadingPartController@addPart7'
])->name("readingpartcontroller.addpart7");
//Route::get('manager-reading-part/update-part7', [
//    'uses'=> 'ReadingPartController@indexUpdatePart7'
//]);
Route::post('/admin/manager-reading-part/update-part7/do-update', [
    'uses'=> 'ReadingPartController@updatePart7'
])->name("readingpartcontroller.updatepart7");

//================= end part 7 ===========================
//cho user va guest =================================================================================================
//luyen nghe
Route::get("/guest/luyen-nghe","ListeningPartController@practicePartNghe");
// luyen doc
Route::get("/guest/luyen-doc","ReadingPartController@practicePartDoc");



//================= testing ==================================
//test
//testing home
Route::get('user/testing-home',[
    'uses' => 'TestController@index'
]);

Route::get('admin/manager-testing/add',[
    'uses' => 'TestController@addIndex'
]);

Route::post('admin/manager-testing/add/do-add', [
    'uses' => 'TestController@addTest'
])->name("testcontroller.add");

Route::get('user/testing-home/test',[
    'uses' => 'TestController@doTest'
]);
Route::post('admin/manager-testing/delete',[
    'uses'=>'TestController@delete'
])->name("testcontroller.delete");
//================= endtesting ==================================

//================= discussion =====================================
// discussion
Route::get("/user/discussion/home","DiscussionController@home")
    ->name('discussionController.home');

Route::get("/user/discussion/view","DiscussionController@accessDiscussion");

Route::get("/user/discussion/viewAdd","DiscussionController@indexAddDiscussion")
->name("discussionController.add");

Route::get("/user/discussion/viewUpdate","DiscussionController@indexUpdateDiscussion");

Route::post("/admin/manager-discussion/delete",[
    "uses"=>"DiscussionController@delete"
])->name("discussioncontroller.delete");
//================= end discussion =======================================
// view quản lý phần nghe của admin
Route::get('/admin/quanly/baihoc/phannghe', [
    'uses' => 'ListeningPartController@get'
]);

// admin lấy view update bài học phần nghe
Route::get('/admin/bai-hoc-manager/update-part-nghe/{id}',[
    'uses'=>'ListeningPartController@redirectViewUpdate'
    ]);

// admin lấy view bài học phần nghe
Route::get('guest/luyen-nghe/{id}',[
    'uses'=>'ListeningPartController@redirectView'
    ]);

// admin xóa phần nghe
Route::post('/admin/bai-hoc-manager/delete-part-nghe',[
    'uses'=>'ListeningPartController@delete'
    ]);

// view quản lý tài khoản của admin
Route::get('/admin/quanly/account', [
    'uses' => 'AccountController@get'
]);

Route::post('/admin/account-manager/ban',['uses'=>'AccountController@ban']);

