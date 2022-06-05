@extends('layouts.main')

@section('container')

<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="/register" method="POST">
            @csrf
            <div class="text-center my-4">
              <p class="mb-4 fs-3">Register</p>
            </div>

            <!-- Username input -->
            <div class="form-floating mb-3">
              <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                placeholder="Enter a valid username" required value="{{ old('name') }}" autofocus/>
              <label class="form-label" for="floatingInput">Username</label>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>          
              @enderror
            </div>

            <!-- Email input -->
            <div class="form-floating mb-3">
              <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Enter a valid email address" required value="{{ old('email') }}"/>
              <label class="form-label" for="floatingInput">Email address</label>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>          
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-floating mb-3">
              <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Enter password" required value="{{ old('password') }}"/>
              <label class="form-label" for="floatingPassword">Password</label>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>          
              @enderror
            </div>

            <div class="text-center text-lg-start mt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already registered? <a href="/login"
                  class="link-danger text-decoration-none">Login now!</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
</section>
@endsection