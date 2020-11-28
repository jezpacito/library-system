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



//Route::get('books/filter', function (){
//    return view('filter');
//});

Route::get('/', function (){
    $sports = \App\Book::where('category_id',6)->get();
    $science = \App\Book::where('category_id',5)->get();
    $history = \App\Book::where('category_id',4)->get();
    $novels = \App\Book::where('category_id',3)->get();
    $biographies = \App\Book::where('category_id',2)->get();
    $nonfiction =\App\Book::where('category_id',1)->get();
    return view('filter',compact(['sports','science','history','novels','biographies','nonfiction']));
});


Route::get('/search', function () {
    return view('save');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/direct-borrow/{book}', 'BookController@direct_borrow');

    Route::get('books/available', 'BookController@available');
    //reports
    Route::get('/select-date', 'ReportController@select_date');

    Route::post('/report-daily', 'ReportController@daily');

    Route::get('/books-returned', 'BookController@books_return');

    Route::get('/my-history', 'BookController@myhistory');

    Route::get('/books/unobtainable', 'BookController@approved_list');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/borrow/{book}', 'BookController@borrow');

    Route::get('/book-request', 'BookController@request_list');

    Route::get('/claim/{book}', 'BookController@claim');

    Route::get('/return/{book}', 'BookController@returned');

    Route::get('/to-receive', 'BookController@to_received_list');

    Route::get('/approved/{book}', 'BookController@approved');

    Route::get('/my-pending', 'BookController@myPendingBooks');

    Route::get('/my-borrowed', 'BookController@myBorrowed');

    Route::get('/my-approved', 'BookController@my_to_received');

    Route::get('/members', 'MemberController@index');

    Route::get('/member-revoke/{user}','MemberController@revoke');

    Route::get('/member-activate/{user}','MemberController@activate');

    Route::get('/member-suspend/{user}','MemberController@suspend');

    Route::get('/members/{user}', 'MemberController@show');

    Route::resource('books', 'BookController');

    Route::view('dashboard','dashboard');
});

