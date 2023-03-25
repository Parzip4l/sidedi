@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-3 col-xl-3 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-12 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">SI<span>DEDI</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
              <form class="forms-sample" action="{{url('login/proses')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input autofocus type="email" class="form-control 
                  @error('username')
                    is-invalid
                  @enderror
                  " id="userEmail" placeholder="email" name="email">
                </div>

                @error('username')
                <div class="invalid-feedback">
                      {{$message}}
                </div>
                @enderror
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control
                  @error('password')
                    is-invalid
                  @enderror
                  " id="userPassword" name="password" autocomplete="current-password" placeholder="Password">
                </div>
                @error('password')
                <div class="invalid-feedback">
                      {{$message}}
                </div>
                @enderror
                <!-- <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div> -->
                <div>
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection