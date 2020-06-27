@extends('backend/layouts.app')
@section('content')
<div class="container">
<form action="{{ route('class.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" class="form-group" name="class"
            placeholder="Enter Class" /> 
            <button type="submit" class="btn btn-info display-3 ">
             Submit
            </button>
    </div>
</form>
</div>
@endsection