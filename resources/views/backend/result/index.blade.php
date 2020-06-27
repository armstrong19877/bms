@extends('backend/layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Result Sheet</div>
           <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading ">
                <h2><i class="fa fa-map-marker red "></i><strong>Students</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>

              <div class="panel-body-map">
                <div id="map">
                  <form action="{{ route('result.index')}}" method="get" role="search">
              {{ csrf_field() }}
              <div class="input-group">

               <select name="p">
               <option>Enter Class</option>
               @foreach($grades as $grades)
               <option>{{$grades->class}}</option>
                @endforeach
               </select>
               <button type="submit" class="btn btn-success">
               Submit
              </button>
               </div></form></div>

                  <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Roles</th>
                               <th scope="col">Actions</th>
                           </tr>
                       </thead>

                       <tbody>
                           @foreach($data as $data)
                           <tr>
                               <th>{{ $data->p_name }}</th>
                               <th>{{ $data->user->email }}</th>
                               <th>{{ $data->user->name }}</th>
                               <th>
                                 <h4>  <a href="{{route('result.getscholars.show', $data->id)}}" class="float-left">
                                       <button type="button" class="btn btn-primary">Edit</button>
                                   </a></h4>

                               <h4> <form action="{{ route('admin.users.destroy', $data->id)}}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button> 
                                   </form> </h4> 
                               </th>
                           </tr>
                           
                       </tbody>
                        @endforeach
                   </table>
                </div>
                </div>
              </div>
            </div>
          </div>  
            </div>
        </div>
@endsection   