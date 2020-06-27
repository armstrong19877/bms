@extends('backend/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Scholars' Result</div>

                <div class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading ">
                <h2><i class="fa fa-map-marker red "></i><strong>Scholars' Result</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map">
                <div id="map" style="height:380px;">
                  

                  <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <th scope="col">Session</th>
                               <th scope="col">Term</th>
                               <th scope="col">Result</th>
                               <th scope="col">Actions</th>
                           </tr>
                       </thead>

                       <tbody>
                           @foreach($results as $results)
                           <tr>
                               <th>{{ $results->session }}</th>
                               <th>{{ $results->term }}</th>
                               <th> <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('uploads/results/' .$results->image)}}" width="60px" height="60" alt="image">
                               </th>
                               <th>
                                   <a href="{{route('result.show', $results->id)}}" class="float-left">
                                       <button type="button" class="btn btn-primary">Edit</button>
                                   </a>

                                   <form action="{{ route('admin.users.destroy', $results->id)}}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                     
                                   </form>
                                    
                               </th>
                           </tr>
                           @endforeach
                       </tbody>
                       
                   </table>
                   <ul>
                   
                   </ul>
                </div>

                </div>
              </div>

            </div>
          </div>
      
           </div>
        </div>
   
@endsection   