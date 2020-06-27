@extends('backend/layouts.student')
@section('title', 'Scholar Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>
            <div class="panel panel-default">
              <div class="panel-heading ">
                
                <h2><i class="fa fa-map-marker red "></i><strong>{{$student->user->name}}</strong></h2>
                <div class="panel-actions">
                  <a href="{{ route('home')}}" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map">
                

                  <div class="card-body">
                   <table class="table">

                    <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('movements/'.$student->user->image )}}" width="200px" height="200" alt="image">

                       <thead>
                           <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Class</th>
                               <th scope="col">Age</th>
                               <th scope="col">Addmission Number</th>
                               <th scope="col">Parent Name</th>
                           </tr>
                       </thead>

                       <tbody>
                          
                           <tr>
                            
                               <th>{{$student->user->name}}</th>
                               <th>{{$student->user->email}}</th>
                               <th>{{ $student->s_class }}</th>
                               <th>{{ $student->dob }}</th>
                               <th>{{$student->reg_no}}</th>
                               <th>{{$student->p_name}}</th>
                           </tr>
                           
                       </tbody>


                       <thead class="">
                           <tr class="card-header">
                               <th scope="col">Admission Number</th>
                               <th scope="col">State</th>
                               <th scope="col">Local Government</th>
                               <th scope="col">Sex</th>
                               <th scope="col">Address</th>
                               <th scope="col">Phone</th>
                           </tr>
                       </thead>
                       <tr>
                       <th>{{$student->reg_no}}</th>
                       <th>{{$student->state}}</th>
                       <th>{{$student->lg}}</th>
                       <th>{{$student->sex}}</th>
                       <th>{{$student->add}}</th>
                       <th>{{$student->phone}}</th>
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
    </div>
</div>
@endsection
