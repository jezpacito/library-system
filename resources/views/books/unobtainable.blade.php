@extends('layouts.master')
@section('content')
    <div class="card-body">

                        <h2>List of  Books</h2>

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
                    <th>Due Date</th>
                    <th>Action</th>
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
                        <td>{{$book->book->date_return}}</td>
                        @if($book->due_date ==null)

                            <td></td>
                        @else
{{--                        <td>{{\Carbon\Carbon::parse($book->due_date)->diffForHumans()}}</td>--}}
                            <td>{{\Carbon\Carbon::parse($book->due_date)->toDateString()}}</td>

                        @endif
                       @if($book->status =='pending')
                           <td>
                               <a href="/approved/{{$book->id}}" class="btn btn-outline-info">Approved</a>
                           </td>

                        @elseif($book->status =='received')

{{--                        @foreach($book->fees as $fee)--}}
{{--                          @if($fee->status =='unpaid')--}}
                                    <td>
{{--                                        {{$book->fees->overdue_fee}}--}}
                                    </td>
{{--                                @endif--}}
{{--                            @endforeach--}}
                            <td>
                                <a href="/return/{{$book->id}}" class="btn btn-outline-info">Return</a>
                            </td>
                        @else
                            <td>
                                @role('admin')
                                <a href="/claim/{{$book->id}}" class="btn btn-outline-info">Claim</a>
                                @endrole
                            </td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $books->links() }}
    </div>
@endsection
