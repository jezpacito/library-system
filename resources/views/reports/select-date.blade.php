@extends('layouts.master')
@section('content')
    <form action="/report-daily " method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Select Date</label>
            <input type="date" name="date" id="date" value="" class="form-control @error('date') is-invalid @enderror" placeholder="Date" required>

        </div>

        <div class="modal-footer">
{{--            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
            <button type="submit"  class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
