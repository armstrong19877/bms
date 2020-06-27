@extends('backend/layouts.app')
@section('content')

<div class="">
		<h3><i class="fa fa-user"> Total number of scholars </i></h3>
	

		<div class="">
			<a href="{{route('register.student')}}" class="btn btn-xs btn-success">Register new student</a>
		</div>
                <div class="pull-left" >
                  <form action="{{ route('scholar.class')}}" method="get" role="search" class="pull-right">
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
		@foreach($data as $students)
		<tr>
			<td>{{$students->id}}</td>
			<td>{{$students->user->name}}</td>
			<td>{{ $students->sex}}</td>
			<td>{{ $students->dob}}</td>
			<td>{{ $students->user->email}}</td>
			<td>{{ $students->s_class}}</td>
			<td><img src="{{ asset('/movements/'.$students->user->image)}}" width="30" height="30" /></td>
			<td>
				@hasrole('admin')
				<a class="btn btn-xs btn-info" href=" {{route('student.show', $students->user->id)}} ">Show</a>
				@endhasrole

				<a class="btn btn-xs btn-primary" href="{{route('student.edit', $students->user->id)}}">Edit</a>
				
				<form action="{{ route('student.destroy', $students->user->id)}}" method="POST" class="float-right">
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