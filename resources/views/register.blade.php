@extends('master')


@section('content')

 <div class="row">

           
      <div class="col-md-offset-3 col-md-6">
        <h3 class="text-center">Create a new user</h3>
        @if($stop_register==1)
             <h3 class="text-center">Registeration are currently closed !!</h3>
        @else
        <form method="post" action="/register">
          {{csrf_field()}}
          <div class="form-group">
          	<label for="name">Name</label>
          	<input type="text" name="name" id="name" value="{{old('name')}}" class="form-control form-app @error('name') is-invalid @enderror" placeholder="Full Name">
          	 @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="form-group">
          	<label for="email">Email</label>
          	<input type="email" name="email" id="email" value="{{old('email')}}" class="form-control form-app @error('email') is-invalid @enderror" placeholder="Email Address">
          	@error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="form-group">
          	<label for="password">Password</label>
          	<input type="password" name="password" id="password" value="{{old('password')}}" class="form-control form-app @error('password') is-invalid @enderror" placeholder="Password">
          	@error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="form-group">
          	<label for="rpassword">Confirm Password</label>
          	<input type="password" name="rpassword" id="rpassword" value="{{old('rpassword')}}" class="form-control form-app @error('rpassword') is-invalid @enderror" placeholder="Confirm Password">
          	@error('rpassword')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="form-group">
          	<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
        </form>
        @endif
      </div>
 </div>

@endsection