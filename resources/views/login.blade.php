@extends('master')


@section('content')

 <div class="row">

           
      <div class="col-md-offset-3 col-md-6">
        <h3 class="text-center">Login</h3>
        <form method="post" action="/login">
          {{csrf_field()}}
            @error('message')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                      </span>
          @enderror
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
          	<button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>


          
        </form>
          

             
        
      </div>
 </div>

@endsection