@extends('backend/layouts.app')
@section('content')




            <div class="container">
            <div class="card">  
                 <div class="card-header">{{ __('Register') }}</div>

                <div class="form-group">
                    <form method="POST"  enctype="multipart/form-data"    action="{{ route('register.student.submit') }}">
                        @csrf           

                        <div class="row">

                            <div class="col">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"  class="display-7"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="image" class="display-7" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    <div class="form-group row">                       
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Choose Sex') }}</label>
                        <div class="col-md-6 display-7">
                            <select id="cars" name="sex">
                            <option  value="">Choose Sex</option>
                            <option  value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                    </div>



                    <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone"  class="display-7"  type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email"  class="display-7"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                          <div class="form-group row">
                            <label for="p_name" class="col-md-4 col-form-label text-md-right">{{ __('Parent Name') }}</label>

                            <div class="col-md-6">
                                <input id="p_name"  class="display-7"  type="text" class="form-control @error('p_name') is-invalid @enderror" name="p_name" value="{{ old('p_name') }}" required autocomplete="p_name" autofocus>

                                @error('p_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="reg_no" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="reg_no"  class="display-7"   type="text" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" value="{{ old('reg_no') }}" required autocomplete="reg_no" autofocus>

                                @error('reg_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    




                        


                          <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob"  class="display-7"  type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>




                    <div class="col">
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
                        <div class="col-md-6">
                        <select name="s_class">
                        <option>Enter Class</option>
                         @foreach($classes as $class)
                         <option>{{$class->class}}</option>
                         @endforeach
                        </select>
                        </div>
                        </div>


                         <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State of Origin') }}</label>

                            <div class="col-md-6">
                                <input id="state"  class="display-7"   type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                         <div class="form-group row">
                            <label for="lg" class="col-md-4 col-form-label text-md-right">{{ __('Local Government') }}</label>

                            <div class="col-md-6">
                                <input id="lg"   class="display-7"  type="text" class="form-control @error('lg') is-invalid @enderror" name="lg" value="{{ old('lg') }}" required autocomplete="lg" autofocus>

                                @error('lg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          <div class="form-group row">
                            <label for="nation" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                                <input id="nation"  class="display-7"  type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" value="{{ old('nation') }}" required autocomplete="nation" autofocus>

                                @error('nation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                         <div class="form-group row">
                            <label for="reg_date" class="col-md-4 col-form-label text-md-right">{{ __('Addmission Date') }}</label>

                            <div class="col-md-6">
                                <input id="reg_date"  class="display-7"  type="date" class="form-control @error('reg_date') is-invalid @enderror" name="reg_date" value="{{ old('reg_date') }}" required autocomplete="reg_date" autofocus>

                                @error('reg_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="add" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="add" type="text"  class="display-7"  class="form-control @error('reg_date') is-invalid @enderror" name="add" value="{{ old('add') }}" required autocomplete="add" autofocus>

                                @error('add')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password"  class="display-7"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm"  class="display-7"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                    </div>

                </div>


                        <div class="form-group row mb-0" >
                            <div class="col-md-6 offset-md-4">
                                <a style="font-size: 18px;" class="btn btn-xs btn-primary" href="{{ route('student.list')}}">Back</a>
                                <button type="submit" class="btn btn-primary"  style="font-size: 18px;" >
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                   </div>
               </div>
           </div>
        
@endsection