@extends('backend/layouts.student')
@section('content')
<div class="card">
		@foreach($data as $data)
		<h4>{{$data->s_name}}</h4>
		<h4>{{$data->s_email}}</h4>
		<h4>{{$data->s_class}}</h4>
		<h4>{{$data->session}}</h4>
		<h4>{{$data->term}}</h4>
		<h4>{{$data->image}}</h4>
				<img src="{{asset('uploads/results/' .$data->image)}}" width="400px" height="600px" alt="image" />
		@endforeach
</div>
@endsection