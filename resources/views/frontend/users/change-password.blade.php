@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Change Password
                            <a href="{{ url('profile') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label>Current Password</label>
                              <div class="input-group">
                                <input type="password" name="current_password" id="currentPassword" class="form-control" />
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <input type="checkbox" style="height: 30px; width: 30px" id="toggleCurrentPassword" onchange="togglePasswordField('currentPassword', 'toggleCurrentPassword')">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label>New Password</label>
                              <div class="input-group">
                                <input type="password" name="password" id="newPassword" class="form-control" />
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <input style="height: 30px; width: 30px" type="checkbox" id="toggleNewPassword" onchange="togglePasswordField('newPassword', 'toggleNewPassword')">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label>Confirm Password</label>
                              <div class="input-group">
                                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" />
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <input type="checkbox" style="height: 30px; width: 30px" id="toggleConfirmPassword" onchange="togglePasswordField('confirmPassword', 'toggleConfirmPassword')">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3 text-end">
                              <hr>
                              <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function togglePasswordField(fieldId, toggleId) {
      var passwordInput = document.getElementById(fieldId);
      var toggleCheckbox = document.getElementById(toggleId);

      if (toggleCheckbox.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
  </script>
@endpush
