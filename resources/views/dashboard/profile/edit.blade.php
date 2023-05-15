<x-app-layout>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      My Profile
    </h4>

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
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="{{ asset(Auth::user()->profile) }}"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
                <div>
                  <p>{{ Auth::user()->email }}</p>
                  <p>{{ Auth::user()->position }}</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    value="{{ explode(" ", Auth::user()->name)[0] }}"
                    disabled
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input class="form-control" type="text" name="lastName" id="lastName" value="{{ implode(" ", array_slice(explode(" ", Auth::user()->name), 1)) }}" disabled />
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
                    disabled
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">ID (+62)</span>
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      class="form-control"
                      value="3853797950"
                      disabled
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">Street</label>
                  <input class="form-control" disabled type="text" id="state" name="Street" placeholder="California" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="zipCode" class="form-label">City</label>
                  <input
                    type="text"
                    class="form-control"
                    id="city"
                    name="city"
                    disabled
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="country">Birthday</label>
                  <input class="form-control" type="date" id="birthday" value="2013-01-08" name="birthday" placeholder="California" disabled />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="language" class="form-label">Password</label>
                  <input class="form-control" type="password" id="password" value="2013-01-08" name="password" placeholder="California" disabled />

                </div>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>

      </div>
    </div>
  </div>
  <!-- / Content -->

</x-app-layout>
