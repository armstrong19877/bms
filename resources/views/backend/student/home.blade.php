@extends('backend/layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3>Student Register</h3>
	</div>
</div>


<div class="row">
	<div class="col-sm-12">
		<div class="pull-right">
			<a href="{{route('register.student')}}" class="btn btn-xs btn-success">Register new student</a>
		</div>
	</div>
</div>


	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
	@endif

<div class="panel-body-map">
    <div id="map" style="height:380px;">
	<div class="card-body">
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Sex</th>
			<th>Phone</th>
			<th>Actions</th>
		</tr>
		@foreach($students as $student)
		<tr>
			<td>{{ $student->class}}</td>
			<td>{{ $student->sex}}</td>
			<td>{{ $student->phone}}</td>
			<td>
				@hasrole('admin')
				<a class="btn btn-xs btn-info" href="{{route('student.show', $student->id)}}">Show</a>
				@endhasrole

				@hasrole('scholar')
				<a class="btn btn-xs btn-info" href="{{route('student.show', Auth::user()->id)}}">Show</a>
				@endhasrole
				<a class="btn btn-xs btn-primary" href="{{route('student.edit')}}">Edit</a>
				<a class="btn btn-xs btn-danger" href="">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
	<ul>
		{{ $students->links()}}
	</ul>
	</div>
</div>
</div>
@endsection