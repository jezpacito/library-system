@extends('layouts.master')
@section('content')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Copy Right Year</th>
                    <th>Date Request to Borrow</th>
                    <th>Borrow Date</th>
                    @foreach($books as $book)
                    @if($book->status =='approved')
                    <th>Date Request Approved</th>
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->book->title}}</td>
                        <td>{{$book->book->author}}</td>
                        <td>{{$book->book->publisher}}</td>
                        <td>{{$book->book->copyright_year}}</td>
                        <td>{{$book->book->created_at}}</td>
                        <td>{{$book->created_at}}</td>
                        @if($book->status =='approved')
                            <td>{{$book->book->updated_at}}</td>

                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $books->links() }}
    </div>
@endsection
