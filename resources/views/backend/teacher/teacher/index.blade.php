@extends('backend/layouts.app')
@section('content')

<div class="">
		<h3><i class="fa fa-user"> Total number of Teacher </i></h3>
	

		<div class="">
			<a href="{{route('register.teacher')}}" class="btn btn-xs btn-success">Register new Teacher</a>
		</div>
                <div class="pull-left">
                  <form action="{{ route('teacher.class')}}" method="get" role="search" class="pull-right">
              {{ csrf_field() }}
              
               <select name="p">
               <option>Enter Class</option>
               @foreach($grades as $grades)
               <option>{{$grades->class}}</option>
                @endforeach
               </select>
               <button type="submit" class="btn btn-success">
               Submit
              </button>
               </form></div></div>


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
			<th>#</th>
			<th>Name</th>
			<th>Sex</th>
			<th>Date Of Birth</th>
			<th>Email</th>
			<th>Class</th>
			<th>Photo</th>
			<th>Actions</th>
		</tr>
		@foreach($data as $teachers)
		<tr>
			<td>{{$teachers->id}}</td>
			<td>{{$teachers->user->name}}</td>
			<td>{{ $teachers->sex}}</td>
			<td>{{ $teachers->dob}}</td>
			<td>{{ $teachers->user->email}}</td>
			<td>{{ $teachers->class}}</td>
			<td><img src="{{ asset('/movements/'.$teachers->user->image)}}" width="30" height="30" /></td>
			<td>
				@hasrole('admin')
				<a class="btn btn-xs btn-info" href=" {{route('teacher.show', $teachers->user->id)}} ">Show</a>
				@endhasrole

				<a class="btn btn-xs btn-primary" href="{{route('teacher.edit', $teachers->user->id)}}">Edit
				</a>
				
				<form action="{{ route('teacher.destroy', $teachers->user->id)}}" method="POST" class="float-right">
                                  @csrf
                              {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                     
                </form>
			</td>
		</tr>
		@endforeach
	</table>
	<ul>
		
	</ul>
	</div>
</div>
</div>
@endsection