@extends('backend/layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$student->user->name}}</div>
                <div class="card-body">
                  <form action="{{route('scholar.update', $student->user->name)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  {{ method_field('PUT') }}
                  <div class="form-check">
                    <div class="row">
                      <div class="col">
                    <label>Name <strong style="font-size: 20px;">:</strong></label>
                    <input type="text" name="name" class="" value="" placeholder="{{$student->user->name}}" />

                     <label>Email <strong style="font-size: 20px;">:</strong></label>
                    <input type="email" name="email" class="" value="" placeholder="{{$student->user->email}}" />

                    <label>Password <strong style="font-size: 20px;">:</strong></label>
                    <input type="password" name="password" class="" value="" placeholder="Enter Password" />
                  </div>

                    <div class="col">
                      
                                <input id="password-confirm"  class="display-7"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            
                    
                    <input type="file" name="image" class="" value="{{asset('movements/'.$student->user->image)}}" placeholder="Enter Password" />
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
