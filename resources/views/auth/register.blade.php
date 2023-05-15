@extends('layouts.auth')

@section('content')  
  <div class="card">
      <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bolder">Ngopi Sedoyo</span>
              </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to NgopiSedoyo! 👋</h4>
          <form method="POST" class="nb-3" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Enter your name"
                      autofocus
                      value="{{ old('name') }}"
                  />
                  {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Enter your email"
                      value="{{ old('email') }}"
                      autofocus
                  />
                  {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
              </div>
              <div class="mb-3">
                  <label for="defaultSelect" class="form-label">Select Your Position</label>
                  <select id="defaultSelect" name="position" class="form-select">
                      <option value="">Please Select one</option>
                      <option value="Karyawan">Karyawan</option>
                      <option value="Admin Caffe">Admin Caffe</option>
                      <option value="Admin Kopi">Admin Kopi</option>
                  </select>
                  {{-- <x-input-error :messages="$errors->get('position')" class="mt-2" /> --}}
                </div>
              <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                      <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
              </div>
              <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Confirm Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                      <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password_confirmation"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
              </div>
              
              <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
              </div>
          </form>

          <p class="text-center">
              <span>Already have an account?</span>
              <a href="/login">
              <span>Sign in instead</span>
              </a>
          </p>
      </div>
  </div>
@endsection

