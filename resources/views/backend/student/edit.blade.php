@extends('backend/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>
                <div class="card-body">
                  <form action="{{route('student.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  {{ method_field('PUT') }}
                  <div class="form-check">
                    <div class="row">
                      <div class="col">
                    <label>Name <strong style="font-size: 20px;">:</strong></label>
                    <input type="text" name="name" class="" value="" placeholder="{{$user->name}}" />

                     <label>Email <strong style="font-size: 20px;">:</strong></label>
                    <input type="email" name="email" class="" value="" placeholder="{{$user->email}}" />

                    <label>Name <strong style="font-size: 20px;">:</strong></label>
                    <input type="date" name="dob" class="" value="" placeholder="{{$user->student->dob}}" />
                  </div>

                    <div class="col">
                    <label>Name <strong style="font-size: 20px;">:</strong></label>
                    <input type="text" name="nation" class="" value="" placeholder="{{$user->student->nation}}" />

                    <label>Password <strong style="font-size: 20px;">:</strong></label>
                    <input type="password" name="password" class="" value="" placeholder="Enter Password" />
                      
                                <input id="password-confirm"  class="display-7"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                    </div>

                            
                    <div class="col">
                    <input type="file" name="image" class="" value="" placeholder="Enter Password" />
                  </div>
                  </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                    Update
                  </button>
                </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@endsection
