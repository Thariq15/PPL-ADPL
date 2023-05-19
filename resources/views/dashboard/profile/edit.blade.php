@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">My Profile /</span> Edit</h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('profile.show') ? "active" : "" }}" href="{{ route('profile.show') }}">
            <i class="bx bx-user me-1"></i> Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('profile.edit') ? "active" : "" }}" href="{{ route("profile.edit") }}">
            <i class='bx bx-edit-alt'></i> Edit Profile
          </a>
        </li>
      </ul>
      <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="card mb-4">
        @csrf
        @method('patch')
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          @if (session('status') === 'profile-updated')
          <div class="alert alert-primary alert-dismissible" role="alert">
            Your are <b>success</b> to update data.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ asset(Auth::user()->profile) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden="" name="profiles" accept="image/png, image/jpeg">
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 5MB</p>
              <div class="mt-2">
                @if ($errors->get('profiles'))
                  @foreach ( $errors->get('profiles') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          <div method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            {{-- <input type="file" id="upload-form" name="profile" class="file-profile" accept="image/png, image/jpeg"> --}}
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input
                  class="form-control"
                  type="text"
                  id="firstName"
                  name="firstname"
                  value="{{ explode(" ", Auth::user()->name)[0] }}"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input class="form-control" type="text" name="lastname" id="lastName" value="{{ implode(" ", array_slice(explode(" ", Auth::user()->name), 1)) }}" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input
                  class="form-control"
                  type="text"
                  id="email"
                  name="email"
                  value="{{ Auth::user()->email }}"
                  placeholder="john.doe@example.com"
                
                />
             </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">ID (+62)</span>
                  <input
                    type="text"
                    id="phoneNumber"
                    name="phone"
                    class="form-control"
                    value="{{ Auth::user()->phone }}"
                    placeholder="3547xxxx"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">Address</label>
                <input class="form-control" type="text" id="state" name="address" placeholder="Jl Tegal Boto No. 05" value="{{ Auth::user()->address }}" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="zipCode" class="form-label">City</label>
                <input
                  type="text"
                  class="form-control"
                  id="city"
                  name="city"
                  placeholder="Jember"
                  value="{{ Auth::user()->city }}"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="country">Birthday</label>
                <input class="form-control" type="date" id="birthday" value="{{ Auth::user()->birthday }}" name="birthday" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="language" class="form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password" />
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <a href="{{ route("profile.show") }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </div>
        </div>
        <!-- /Account -->
      </form>

    </div>
  </div>
</div>  
@endsection


@section("scripts")
<script>
  document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
      const deactivateAcc = document.querySelector('#formAccountDeactivation');

      // Update/reset user image of account page
      let accountUserImage = document.getElementById('uploadedAvatar');
      const fileInput = document.querySelector('.account-file-input');
      const resetFileInput = document.querySelector('.account-image-reset');
      const profileInpput = document.querySelector('.file-profile');

      if (accountUserImage) {
        const resetImage = accountUserImage.src;
        fileInput.onchange = () => {
          if (fileInput.files[0]) {
            accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
            profileInpput.value = fileInput.value
          }
        };
      

        resetFileInput.onclick = () => {
          fileInput.value = '';
          profileInpput.value = ''
          accountUserImage.src = resetImage;
        };
      }
    })();
  });

</script>
@endsection