@extends('backend/layouts.app')
@section('content')
<div class="container">
		<form action="{{ route('result.checker.store', Auth::user()->id)}}" method="POST" role="search">
			@csrf
			<div class="form-group row">

				<div class="col">
					
				<select name="q">
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
				<select name="p">
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