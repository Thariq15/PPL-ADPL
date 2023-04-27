@extends('layouts.main')

@section('container')

<div>
  <div>
    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
      <form action="/register" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Name" required>
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div><div class="form-floating">
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" Required>
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" Required>
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Alredy registered? <a href="/login">Login Now</a></small>
    </main>
  </div>
</div>

@endsection