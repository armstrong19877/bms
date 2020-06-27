@extends('backend/layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading ">
                <h2><i class="fa fa-map-marker red "></i><strong>{{Auth::user()->name}}</strong></h2>
                <div class="panel-actions">
                  <a href="{{ route('result.index')}}" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
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
                               <th scope="col">Result</th>
                           </tr>
                       </thead>
                        @if(isset($details))
                       <tbody>
                         @foreach($details as $result)  
                           <tr>
                               <th> 
                                <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('uploads/results/' .$result->image)}}" width="400px" height="600px" alt="image" /> 

                               </th>
                           </tr>
                          @endforeach
                       </tbody>
                @elseif(isset($message))
                <p>{{ $message }}</p>
               @endif
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
