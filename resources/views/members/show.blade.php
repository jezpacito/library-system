@extends('layouts.master')
@section('content')

    <div>
        <h3 class="text-info">Member Info</h3>
{{--        <h3 class="text-info">Category: {{$user->fname}}</h3>--}}
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Full Name: {{$user->fname}}  {{$user->mname}} {{$user->lname}}</h5>
            <p class="font-weight-bold">Address: {{$user->res_address}} - Contant No. : {{$user->mobile_no}}</p>
            <p class="card-text">Email: {{$user->email}} Landline no. {{$user->landline_no}}</p>
        </div>
        <a href="/members" class="btn btn-primary">Back</a>
    </div>
@endsection
