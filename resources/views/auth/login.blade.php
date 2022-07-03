@extends('layouts.auth')

@section('main')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center mt-10">
                <div class="col-lg-5">
                    <!-- Basic login form-->
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header d-flex justify-content-center" style="background: #fff">
                            {{-- Brand --}}
                            <div class="row align-items-baseline">
                                <div class="col-6">
                                    <img src="{{ asset('/assets/icons/logo-kementrian.svg') }}" class="img img-fluid"
                                        alt="" width="180">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('/assets/icons/logo-kbkm-blue.png') }}" class="img img-fluid"
                                        alt="" width="180">
                                </div>
                            </div>

                            {{-- <h3 class="fw-light my-4">Login Page</h3> --}}
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Login form-->
                            <form action="/login" method="post">
                                @csrf
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" type="email" value="{{ old('email') }}"
                                        placeholder="Enter email address" autofocus required />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        placeholder="Enter password" required aria-describedby="passwordlHelp" />
                                    <div id="passwordlHelp" class="form-text"><a href="#">Forgot Password?</a></div>
                                </div>
                                <!-- Form Group (remember password checkbox)-->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="rememberPasswordCheck" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="rememberPasswordCheck">Remember
                                            password</label>
                                    </div>
                                </div>
                                <!-- Form Group (login box)-->
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="#">

                                    </a>
                                    <button type="submit" class="btn btn-primary">Login &nbsp;<i
                                            class="fas fa-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
