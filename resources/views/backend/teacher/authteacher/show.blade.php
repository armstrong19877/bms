@extends('backend/layouts.app')
@section('title', 'Scholar Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>
            <div class="panel panel-default">
              <div class="panel-heading ">
                
                <h2><i class="fa fa-map-marker red "></i><strong>{{$teacher->user->name}}</strong></h2>
                <div class="panel-actions">
                  <a href="{{ route('home')}}" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map">
                

                  <div class="card-body">
                   <table class="table">

                    <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('movements/'.$teacher->user->image )}}" width="200px" height="200" alt="image">

                       <thead>
                           <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Class</th>
                               <th scope="col">Age</th>
                               <th scope="col">State</th>
                           </tr>
                       </thead>

                       <tbody>
                          
                           <tr> 
                               <th>{{$teacher->user->name}}</th>
                               <th>{{$teacher->user->email}}</th>
                               <th>{{ $teacher->class }}</th>
                               <th>{{ $teacher->dob }}</th>
                               <th>{{$teacher->state}}</th>
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
