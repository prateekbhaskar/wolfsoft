@extends('profile_layout')
@section('content')
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="btn btn-primary h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" onclick='location.replace("/logout")'
                    target="_blank">Logout</a>
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src='{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/no-image.svg') }}'>
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->first_name }}</span>
                                </div>
                            </div>
                        </a>

                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
            style="min-height:100px; background-image: url({{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/no-image.svg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello {{ auth()->user()->first_name }} !</h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see your details and edit them.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center" style='margin-bottom:100px'>
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/no-image.svg') }}"
                                            class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4" style='margin-top:25px;'>
                            <div class="text-center">
                                <h3>
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}<span
                                        class="font-weight-light">, {{ auth()->user()->gender }}</span>
                                </h3>
                                <div>
                                    <i class="ni education_hat mr-2"></i>{{ auth()->user()->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method='post' action='/update'>
                                @csrf
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first_name">First name</label>
                                                <input type="text" name='first_name'
                                                    class="form-control form-control-alternative" placeholder="First Name"
                                                    value="{{ auth()->user()->first_name }}" required>
                                            </div>

                                        @error('first_name')
                                            <i class='error'>{{ $message }}</i>
                                        @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last_name">Last name</label>
                                                <input type="text" name='last_name'
                                                    class="form-control form-control-alternative" placeholder="Last Name"
                                                    value="{{ auth()->user()->last_name }}" required>
                                            </div>

                                        @error('last_name')
                                            <i class='error'>{{ $message }}</i>
                                        @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" name="email"
                                                    class="form-control form-control-alternative" placeholder="Email"
                                                    value="{{ auth()->user()->email }}" required>
                                            </div>

                                        @error('email')
                                            <i class='error'>{{ $message }}</i>
                                        @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-gender">Gender</label>
                                                <select class='btn btn-primary' name='gender' required>
                                                    <option value=''>Select Gender</option>
                                                    <option value='male'
                                                        @if (auth()->user()->gender == 'male') {{ 'selected' }} @endif>Male
                                                    </option>
                                                    <option value='female'
                                                        @if (auth()->user()->gender == 'female') {{ 'selected' }} @endif>Female
                                                    </option>
                                                    <option value='other'
                                                        @if (auth()->user()->gender == 'other') {{ 'selected' }} @endif>Other
                                                    </option>
                                                </select>
                                            </div>

                                        @error('gender')
                                            <i class='error'>{{ $message }}</i>
                                        @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-photo">Change Photo</label>
                                                <input class='btn btn' style='width:80%' type="file" name="photo"
                                                    class="form-control form-control-alternative">
                                            </div>

                                        @error('photo')
                                            <i class='error'>{{ $message }}</i>
                                        @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-photo">Save Changes</label>
                                                <button class='btn btn-info '>Save</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6 m-auto text-center">
                <div class="copyright">
                    <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon
                            Dashboard</a> by Creative Tim</p>
                </div>
            </div>
        </div>
    </footer>
