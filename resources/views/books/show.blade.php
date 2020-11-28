@extends('layouts.master')
@section('content')

    <div>
        <h3 class="text-info">Book Info</h3>
        <h3 class="text-info">Category: {{$book->category->name}}</h3>
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}} </h5>
            <p class="font-weight-bold">Author: {{$book->author}} - Publisher: {{$book->publisher}}</p>
            <p class="card-text">Copy Right Year: {{$book->copyright_year}} || Book Price: {{$book->unit_price}}</p>
            <p class="card-text">{{$book->description}}</p>
        </div>
        <a href="/books" class="btn btn-primary">Back</a>
    </div>
@endsection
