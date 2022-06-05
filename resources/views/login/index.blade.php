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

          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form action="/login" method="POST">
            @csrf
            <div class="text-center my-4">
              <p class="mb-4 fs-3">Login</p>
            </div>

            <!-- Email input -->
            <div class="form-floating mb-3">
              <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Enter a valid email address" autofocus value="{{ old('name') }}"/>
              <label class="form-label" for="email">Email address</label>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>          
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-floating mb-3">
              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Enter password" />
              <label class="form-label" for="password">Password</label>
            </div>

            <div class="text-center text-lg-start mt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Not registered? <a href="/register"
                  class="link-danger text-decoration-none">Register now!</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
</section>
@endsection