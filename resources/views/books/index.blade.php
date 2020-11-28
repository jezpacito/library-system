@extends('layouts.master')

@section('content')
    <div class="container-fluid">
{{--        <h1 class="mt-4">Tables</h1>--}}
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Books</li>
        </ol>

        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Book List
                    <div style="margin-top: 1%">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Book
                        </button>

                       @include('books.create')
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Copy Right Year</th>
                            <th>Qty</th>

                            <th class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->publisher}}</td>
                            <td>{{$book->copyright_year}}</td>
                            <td>{{$book->quantity}}</td>

                            <td>
                                <a href="/books/{{$book->id}}" class="btn btn-outline-info">View</a>
                                @role('admin')
                                <a href="{{route('books.edit',$book->id)}}" class="btn btn-outline-info">Edit</a>

                                @endrole

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
