@extends('backend/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          
            <div class="card">
                <div class="card-header">{{$teacher->user->name}}</div>
                <div class="card-body">
                  <form action="{{route('staff.update', $teacher->user->name)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  {{ method_field('PUT') }}
                    
                    
                    <input type="text" name="name" class="" value="" placeholder="{{$teacher->user->name}}" />
                    <br><br>
                    <input type="email" name="email" class="" value="" placeholder="{{$teacher->user->email}}" />

                    <input type="date" name="dob" class="" value="" placeholder="{{$teacher->dob}}" />
                    <br><br>
                    <input type="text" name="state" class="" value="" placeholder="{{$teacher->state}}" />
                
                    <input type="password" name="password" class="" value="" placeholder="Enter Password" />
                      <br><br>
                    <input id="password-confirm"  class="display-7"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                  
                    <input type="file" name="image" class="" value="{{asset('movements/'.$teacher->user->image)}}" placeholder="Enter Password" />

                  <button type="submit" class="btn btn-primary">
                    Update
                  </button>
                </form>
                </div>
                  
            </div>
        </div>
    </div></div>
@endsection
