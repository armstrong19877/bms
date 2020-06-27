@extends('backend/layouts.student')
@section('content')
<div class="container">
		<form action="{{ route('check.result.get', Auth::user()->id)}}" method="GET" role="search">
			@csrf
			<div class="form-group row">

				<div class="col">
					
				<select name="session">
					<option>Enter Session</option>
					<option>2019/2020</option>
					<option>2020/2021</option>	
					<option>2021/2022</option>
					<option>2022/2023</option>
					<option>2023/2024</option>
					<option>2024/2025</option>
				</select>
			</div>

			<div class="col">
				<select name="term">
					<option>Enter Term</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>

			</div>
		</div>

					<button type="submit" class="btn btn-primary">
						Submit
					</button>
				</form>



@endsection