@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        {{--        <h1 class="mt-4">Tables</h1>--}}
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Members</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
             Member List
                <div style="margin-top: 1%">
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Register Member
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registration Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                                @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                                @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mname" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" required >

                                                @error('mname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="res_address" class="col-md-4 col-form-label text-md-right">{{ __(' Resident Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="res_address" type="text" class="form-control @error('res_address') is-invalid @enderror" name="res_address" value="{{ old('res_address') }}" required autocomplete="res_address" autofocus>

                                                @error('res_address')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="landline_no" class="col-md-4 col-form-label text-md-right">{{ __('Landline No') }}</label>
                                            <div class="col-md-6">
                                                <input id="landline_no" type="text" class="form-control @error('landline_no') is-invalid @enderror" name="landline_no" value="{{ old('landline_no') }}" required autocomplete="landline_no" autofocus>

                                                @error('landline_no')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>
                                            <div class="col-md-6">
                                                <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="mobile_no" autofocus>

                                                @error('mobile_no')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $m)
                            <tr>
                                <td>{{$m->fname}} {{$m->lname}}</td>
                                <td>{{$m->res_address}}</td>
                                <td>{{$m->email}}</td>
{{--                                <td>{{$m->mobile_no}}</td>--}}
                                @role('admin')
                                <td class="text-">{{$m->status}}</td>
                                <td>
                                    <a href="/members/{{$m->id}}" class="btn btn-outline-info  btn-sm">View</a>
                                    @if($m->status ==='suspend')
                                        <a href="member-activate/{{$m->id}}" class="btn btn-outline-success  btn-sm">Activate</a>
                                        @elseif($m->status ==='active')
                                            <a href="member-suspend/{{$m->id}}" class="btn btn-outline-danger  btn-sm">Suspend</a>
                                    @endif
                                    <a href="/member-revoke/{{$m->id}}" class="btn btn-outline-danger btn-sm">Revoke</a>
{{--                                    <a href="/members/{{$m->id}}" class="btn btn-outline-info">View</a>--}}

                                </td>
                                @endrole('admin')
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $members->links() }}
            </div>
        </div>
    </div>
@endsection
