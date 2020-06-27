@extends('backend/layouts.app')
@section('content')
<div class="container">
		<form action="{{ route('create.class.store')}}" method="post" >
			@csrf
		<input type="text" name="class" class="form-group" placeholder="Enter Class">

					<button type="submit" class="btn btn-primary">
						Submit
					</button>
				</form>



@endsection