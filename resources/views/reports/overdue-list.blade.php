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
                List of Overdue

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Borrowed Book</th>
                                <th>Borrower</th>
                                <th>OverDue Fee</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($overdues as $overdue)
{{--                                {{dd($overdue->borrowed_book->book->title)}}--}}
                                <tr>
                                    <td>{{$overdue->borrowed_book->book->title}}</td>
                                    <td>{{$overdue->borrowed_book->member->fname}} {{$overdue->borrowed_book->member->lname}}</td>
                                    <td>₱{{$overdue->overdue_fee}} .00 /day </td>
                                    <td>{{$overdue->status}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="justify-content-lg-end">
                    <h4>
                        Total unpaid: {{$total_unpaid->sum('overdue_fee')}}
                    </h4>
                        <h4>
                            Total paid:
                        </h4>

                    </div>
                    {{ $overdues->links() }}
                </div>
            </div>
        </div>
@endsection
