@extends('backend/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Teacher's Profile</div>
            <div class="panel panel-default">
              <div class="panel-heading ">
                
                <h2><i class="fa fa-map-marker red "></i><strong>{{$user->name}}</strong></h2>
                <div class="panel-actions">
                  <a href="{{ route('home')}}" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map">
                

                  <div class="card-body">
                   <table class="table">

                    <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('movements/'.$user->image )}}" width="200px" height="200" alt="image">

                       <thead>
                           <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Class</th>
                               <th scope="col">Age</th>
                               <th scope="col">State</th>
                               <th scope="col">Address</th>
                           </tr>
                       </thead>

                       <tbody>
                          
                           <tr>
                            
                               <th>{{$user->name}}</th>
                               <th>{{$user->email}}</th>
                               <th>{{ $user->teacher->class }}</th>
                               <th>{{ $user->teacher->dob }}</th>
                               <th>{{$user->teacher->state}}</th>
                               <th>{{$user->teacher->add}}</th>
                           </tr>
                           
                       </tbody>
                   </table>
                </div>
                </div>
                
              </div>

            </div>
            
          </div>
            </div>
        </div>
@endsection