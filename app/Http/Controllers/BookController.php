<?php

namespace App\Http\Controllers;

use App\Book;
use App\BorrowedBook;
use App\Category;
use App\Http\Requests\BookFormRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function direct_borrow(Book $book){
        $borrowed = new BorrowedBook();
        $borrowed->transaction_no ='trans_'.mt_rand(100000000000,999999999999);
        $borrowed->book_id = $book->id;
        $borrowed->member_id = auth()->user()->id;
        $borrowed->save();

        $borrowed->update(['status'=>'received','due_date' =>Carbon::now()->addDay(3)]);
        $book->decrement('quantity',1);

        return redirect()->back()->with('success','Success!');
    }
    public function books_return(){
        $books = BorrowedBook::onlyTrashed()->latest()->paginate();
        return view('books.myhistory',compact('books'));
    }
    public function myhistory(){
        $books = BorrowedBook::where('member_id',auth()->user()->id)
            ->onlyTrashed()->latest()->paginate();
        return view('books.myhistory',compact('books'));

    }
    public  function returned(BorrowedBook $book){
        $book->update(['status' =>'returned','date_return' => Carbon::now()]);
        $book->delete();

        $book->book->increment('quantity',1);

        return redirect()->back()->with('success','Book was return');
    }
    public function claim(BorrowedBook $book){
        $book->update(['status' =>'received','due_date' =>Carbon::now()->addDay(3)]);
        return redirect()->back()->with('success','Book was claimed');
    }
    //borrow/request
    public function borrow(Book $book){
       $count = BorrowedBook::where('member_id',auth()->user()->id)
//           ->where('status','pending')
           ->count();
       if($count >=3){
           return redirect()->back()->with('warning','Reach Maximum Number of Reservation!');
       }
        $b =BorrowedBook::where('book_id',$book->id)->where('member_id',auth()->user()->id)->exists();
        if($b ===true){
         return redirect()->back()->with('warning','You Already Reserved this book');
        }
        DB::transaction(function () use ($book){
            $borrowed = new BorrowedBook();
            $borrowed->transaction_no ='trans_'.mt_rand(100000000000,999999999999);
            $borrowed->book_id = $book->id;
            $borrowed->member_id = auth()->user()->id;
            $borrowed->save();
        });

     return redirect()->back()->with('success','Reserved a book');
    }

    public function approved(BorrowedBook $book){
        DB::transaction(function ()use ($book){
            $book->update(['status'=>'approved']);
            $book->book->decrement('quantity',1);
            $book->save();
        });

        return redirect()->back()->with('success','Request Approved');

    }
    public function myBorrowed(){
        $books = BorrowedBook::where('member_id',auth()->user()->id)
            ->where('status','received')
            ->latest()->paginate(10);
        return view('books.my-borrowed',compact('books'));
    }

    public function myPendingBooks(){
        $books = BorrowedBook::where('member_id',auth()->user()->id)
            ->where('status','pending')
            ->latest()->paginate(10);

        return view('books.my-borrowed',compact('books'));
    }
    public  function my_to_received(){

        $books = BorrowedBook::with(['member','book'])
            ->where('status','approved')
            ->where('member_id',auth()->user()->id)
            ->latest()->paginate();
        return view('books.unobtainable',compact('books'));
    }

    public function available(){
        $books = Book::where('status','available')
            ->where('quantity','>',0)
            ->latest()->paginate(10);
        return view('books.available',compact('books'));
    }
    public function approved_list(){
        $books = BorrowedBook::with(['member','book'])
            ->where('status','received')
            ->latest()->paginate();
        return view('books.unobtainable',compact('books'));
    }

    public function to_received_list(){
        $books = BorrowedBook::with(['member','book'])
            ->where('status','approved')
            ->latest()->paginate();
        return view('books.unobtainable',compact('books'));
    }

    public  function request_list(){
        $books = BorrowedBook::with(['member','book'])
            ->where('status','pending')
            ->latest()->paginate();
        return view('books.unobtainable',compact('books'));
    }


    public function index()
    {
        try {
            $categories = Category::get();
            $books = Book::latest()->paginate(10);
            return view('books.index',compact(['books','categories']));
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {
        $book = new Book($request->all());
        $book->user_id = auth()->user()->id;
        $book->save();
//        dd($book);
        return redirect()->back()->withSuccess('Book Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::get();
        return view('books.edit',compact(['book','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->back()->withSuccess('updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
