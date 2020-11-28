@extends('layouts.master')
@section('content')
    <div class="card-body">
        <h2>list of Borrowed History</h2>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Copy Right Year</th>
                    <th>Borrower</th>
                    <th>Date Return</th>

                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->book->title}}</td>
                        <td>{{$book->book->author}}</td>
                        <td>{{$book->book->publisher}}</td>
                        <td>{{$book->book->copyright_year}}</td>
                        <td>{{$book->member->fname}} {{$book->member->lname}}</td>
                        <td>{{$book->date_return}}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $books->links() }}
    </div>
@endsection
