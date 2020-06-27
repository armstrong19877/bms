@extends('backend/layouts.app')
@section('content')
<div> 

  <h3>{{$student->s_name}}</h3>



<form action="{{route('result.submit')}}"   enctype="multipart/form-data"    method="Post">
  @csrf
    <div class="row">
      <div class="col">
    <div class="form-group">
      <label for="session">Session</label>
      <input type="text" class="form-control" name="session" id="session" aria-describedby="emailHelp" placeholder="Enter Session" >
    </div>

    <div class="form-group">
     <label for="term" class="col-md-4 col-form-label text-md-right">{{ __('Term') }}</label>
        <select id="term" name="term">
            <option  value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
    </div>
  </div>

      
         <div class="col">
        <div class="form-group">
      <input type="hidden" class="form-control" name="u_id" id="u_id" aria-describedby="emailHelp" value="{{$student->user_id}}">
    </div>

        <div class="form-group">
      <label for="exampleInputEmail1">Result</label>
      <input type="file" class="form-control" name="image" id="image" aria-describedby="emailHelp" placeholder="Enter image">
    </div>
      </div>

    </div>
    
    
    <button type="submit" class="btn btn-primary">Upload Result</button>
  </fieldset>
</form>
</div>
@endsection