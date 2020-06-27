@extends('backend/layouts.student')
@section('content')
<div class="card">
		
				<img src="{{asset('uploads/results/' .$data->image)}}" width="400px" height="600px" alt="image" />
		
</div>
@endsection