@extends('backend/layouts.app')
@section('content')
<div class="card">
		<div class="card-body">
			<h3><a href="{{route('create.class')}}" class="float-left btn btn-success" >
                                    Create A Class  
                                   </a></h3>
                   <table class="table bordered">
                       <thead>
                           <tr>
                               <th scope="col">Classes</th>  
                           </tr>
                       </thead>

                       <tbody>
                           @foreach($classes as $class)
                           <tr>
                          <th> {{$class->class}} </th>
                               <th>
                                   <a href="{{route('admin.users.edit', $class->id)}}" class="float-left btn btn-info" >
                                    Edit   
                                   </a>

                                   <form action="{{ route('admin.users.destroy', $class->id)}}" method="POST" class="pull-right">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                     
                                   </form>
                                    
                               </th>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
</div>
@endsection