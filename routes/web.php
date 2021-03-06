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
Route::get('/', [
    'uses'=> 'HomeController@index'
])->name('home');
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

// ===nghe====
//trang chu admin quan ly phan nghe
Route::get('/admin/manager-listening-part', [
    'uses' => 'ListeningPartController@get'
    ])->name("listeningpartcontroller.get");

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

// ====doc=====
//trang chu admin quan ly phan doc
Route::get("/admin/manager-reading-part","ReadingPartController@getListPartDoc")->name("readingpartcontroller.getlistpartdoc");
Route::post("/admin/part-doc/del-part-doc","ReadingPartController@delPartDoc");
Route::get('/admin/bai-hoc-manager/update-part-doc','ReadingPartController@getPartDoc');

// ====account=====
// view quan ly account cho user
Route::get('/user/account-manager',[
    'uses'=> 'AccountController@indexUpdateUserAccount'
])->name('accountcontronller.indexupdateuseraccount');

// view quản lý tài khoản của admin
Route::get('/admin/quanly/account', [
    'uses' => 'AccountController@get'
])->name("accountcontroller.get");

// ban tài khoản
Route::post('/admin/account-manager/ban',[
    'uses'=>'AccountController@ban'
    ]);


// unban tài khoản
Route::post('/admin/account-manager/unban',[
    'uses'=>'AccountController@unban'
    ]);
// thêm tài khoản
Route::post('/admin/account-manager/add',[
    'uses'=>'AccountController@add'
    ]);

// update tài khoản
Route::post('/admin/account-manager/update',[
    'uses'=>'AccountController@update'
])->name('accountcontroller.update');

// update tài khoản user
Route::post('/user/account-manager/update',[
    'uses'=>'AccountController@updateForUser'
])->name('accountcontroller.updateforuser');

// xóa tài khoản
Route::post('/admin/account-manager/delete',[
    'uses'=>'AccountController@delete'
])->name("accountcontroller.delete");

// kiểm tra username có tồn tại?
Route::post('/account-manager/check-username',[
    'uses'=>'AccountController@checkuser'
    ]);

// kiểm tra email có tồn tại?
Route::post('/account-manager/check-email',[
    'uses'=>'AccountController@checkemail'
    ]);


//trang chu admin quan ly bkt
Route::get("/admin/manager-testing",[
    'uses'=>'TestController@indexForAdminHome'
])->name("testcontroller.indexforadminhome");
//trang chu admin quan ly bai thao luan
Route::get("/admin/manager-discussion",[
   'uses'=> 'DiscussionController@indexAdminManager'
])->name("discussioncontroller.indexadminmanager");

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

Route::get('/admin/manager-listening-part/add-part1', [
    'uses' => 'ListeningPartController@indexAddPart1'
])->name("viewaddpart1");

Route::post('/admin/manager-listening-part/add-part1/do-add', [
    'uses' => 'Part1Controller@create'
])->name("part1controller.create");
// update các câu part1
Route::post('/admin/manager-listening-part/update-part1/do-update', [
    'uses' => 'Part1Controller@update'
])->name("part1controller.update");
//================= end part 1 ===========================
//================= part 2 ===========================

Route::get('/admin/manager-listening-part/add-part2', [
    'uses'=> 'ListeningPartController@indexAddPart2'
])->name("viewaddpart2");

Route::post('/admin/manager-listening-part/add-part2/do-add', [
    'uses' => 'Part2Controller@create'
])->name("part2controller.create");
// update các câu part2
Route::post('/admin/manager-listening-part/update-part2/do-update', [
    'uses' => 'Part2Controller@update'
])->name("part2controller.update");
//================= end part 2 ===========================
//================= part 3, 4 ===========================
// Thêm part 3,4

Route::get('/admin/manager-listening-part/add-part3', [
    'uses'=>'ListeningPartController@indexAddPart3'
])->name("viewaddpart3");
Route::get('/admin/manager-listening-part/add-part4', [
    'uses'=>'ListeningPartController@indexAddPart4'
])->name("viewaddpart4");

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
])->name("part5controller.index");
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
])->name("viewaddpart5");
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
Route::get('admin/manager-para-part6', 'Part6ParagraphController@listPart6Para')->name("part6paragraphcontroller.listpart6para");
Route::post('/admin/manager-para-part6/delete', 'Part6ParagraphController@delete')
    ->name("part6paragraphcontroller.delete");
Route::post('admin/manager-para-part6/add', 'Part6ParagraphController@add')
    ->name("part6paragraphcontroller.add");
Route::post('admin/manager-para-part6/update', 'Part6ParagraphController@update')
    ->name("part6paragraphcontroller.update");
// magager part 6
//add part 6
Route::get('/admin/manager-reading-part/add-part6','Part6ParagraphController@listPart6')->name("viewaddpart6");
Route::post('/admin/manager-reading-part/add-part6/do-add','ReadingPartController@addPart6')
    ->name("readingpartcontroller.addpart6");

Route::post('/admin/manager-reading-part/update-part6/do-update','ReadingPartController@updatePart6')
    ->name("readingpartcontroller.updatepart6");
//================= end part 6 ===========================
//================= part 7 ===========================
// para part 7 admin
Route::get('admin/manager-para-part7', [
    'uses' => 'Part7ParagraphController@getPart7Paragraph'
])->name("part7paragraphcontroller.getpart7paragraph");
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
])->name("viewaddpart7");
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
Route::get("/guest/listening/practice","ListeningPartController@practicePartNghe")->name("listeningpartcontroller.practicepartnghe");
// luyen doc
Route::get("/guest/reading/practice","ReadingPartController@practicePartDoc")->name("readingpartcontroller.practicepartdoc");

Route::get("/guest/reading",[
    'uses' => "ReadingPartController@index"
])->name("readingpartcontroller.index");
Route::get("/guest/listening",[
    'uses' => "ListeningPartController@index"
])->name("listeningpartcontroller.index");

Route::post("guest/reading/search",[
    "uses"=> "ReadingPartController@searchReading"
])->name("readingpartcontroller.searchreading");

Route::post("guest/listening/search",[
    "uses"=> "ListeningPartController@searchListening"
])->name("listeningpartcontroller.searchlistening");

//================= testing ==================================
//test
//testing home
Route::get('user/testing-home',[
    'uses' => 'TestController@index'
])->name('testcontroller.index');

Route::get('admin/manager-testing/add',[
    'uses' => 'TestController@addIndex'
])->name("testcontroller.addindex");

Route::post('admin/manager-testing/add/do-add', [
    'uses' => 'TestController@addTest'
])->name("testcontroller.add");

Route::get('user/testing-home/test',[
    'uses' => 'TestController@doTest'
])->name("testcontroller.dotest");

Route::post('admin/manager-testing/delete',[
    'uses'=>'TestController@delete'
])->name("testcontroller.delete");

// index update
Route::get("admin/manager-testing/update",[
   'uses'=> "TestController@indexUpdate"
])->name("testcontroller.indexupdate");

//do update testing
Route::post("admin/manager-testing/update/do-update", [
   "uses"=> "TestController@update"
])->name("testcontroller.update");

Route::post("admin/manager-testing/search",[
    "uses"=> "TestController@searchTesting"
])->name("testcontroller.searchtesting");
//================= endtesting ==================================

//================= discussion =====================================
// discussion
Route::get("/discussion/home","DiscussionController@home")
    ->name('discussionController.home');

Route::get("/discussion/view","DiscussionController@accessDiscussion")
->name('dicussionController.view');

Route::post("/user/discussion/upload-img","DiscussionController@upload_Img")
    ->name("discussionController.uploadImg");

Route::get("/user/discussion/viewAdd","DiscussionController@indexAdd")
->name("discussionController.indexAdd");


Route::post('/user/discussion/add','DiscussionController@addDiscussion')
    ->name('discussionController.add');

Route::post("/admin/manager-discussion/delete",[
    "uses"=>"DiscussionController@delete"
])->name("discussioncontroller.delete");

Route::get("/user/discussion/viewUpdate","DiscussionController@indexUpdate")
    ->name('discussionController.indexUpdate');

Route::post("/user/discussion/update","DiscussionController@update")
    ->name('discussionController.update');

// comment
Route::get("/discussion/comment","CommentController@comment")
    ->name('commentController.comment');

Route::get("/discussion/get-sum-comment","CommentController@getSumComment")
    ->name('commentController.sumComment');

Route::get("/discussion/update-cmt","CommentController@update")
    ->name('commentController.update');

Route::get("/discussion/del-cmt","CommentController@delete")
    ->name('commentController.delete');

//reply comment
Route::get("/discussion/reply-comment","ReplyCommentController@reply")
    ->name('replyCommentController.reply');

Route::get("/discussion/reply-comment-view","ReplyCommentController@getListReply")
    ->name('replyCommentController.listReply');

Route::get("/discussion/get-sum-reply-comment","ReplyCommentController@getSumReply")
    ->name('replyCommentController.sumReply');

Route::get("/discussion/update-repcmt","ReplyCommentController@update")
    ->name('replyCommentController.updateReply');

Route::get("/discussion/del-rep-cmt","ReplyCommentController@delete")
    ->name('replyCommentController.deleteReply');

//================= end discussion =======================================

// report
Route::post("/bai-thao-luan/report", [
    'uses'=>'ReportController@addReport'
]);

// skip report
Route::post('/report-manage/skip',[
    'uses'=>'ReportController@changeStatusProcess'
])->name('reportcontroller.changestatusprocess');


// authentication
Route::get("/account/login", [
    'uses'=> 'Auth\MyLoginController@getLogin'
])->name('mylogincontroller.login');

Route::post("/account/login/do-login", [
    'uses'=>'Auth\MyLoginController@postLogin'
])->name("mylogincontroller.postlogin");

Route::get("/account/register",[
    'uses'=> 'AccountController@registerIndex'
])->name('accountcontroller.registerindex');

Route::post('/account/register/do-register',[
   'uses'=>'AccountController@doRegister'
])->name("accountcontroller.doregister");

Route::get('/account/logout',[
    'uses'=> 'Auth\MyLoginController@logout'
])->name('mylogincontroller.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
