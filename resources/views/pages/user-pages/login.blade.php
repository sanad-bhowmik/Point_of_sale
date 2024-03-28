@extends('layout.master-mini')
@section('content')


<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <h1 style="text-align: center;">Log In</h1>
        <p style="height: 5px;background: #378CE7;width: 35px;top: -0.75rem;border-radius: 3px;margin-left: 32%;margin-top: 4px;"></p>
        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="label">Phone Number</label>
            <div class="input-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone Number">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text toggle-password">
                  <i class="mdi mdi-eye" onclick="togglePassword()"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
          @endif
          <div class="form-group d-flex justify-content-between">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
            </div>
            <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Not a member ?</span>
            <a href="{{ url('/user-pages/register') }}" class="text-black text-small">Create new account</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  function togglePassword() {
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.querySelector('.toggle-password i');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('mdi-eye');
      eyeIcon.classList.add('mdi-eye-off');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('mdi-eye-off');
      eyeIcon.classList.add('mdi-eye');
    }
  }
</script>

@endsection