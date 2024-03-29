@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('container')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">Administrator Panel</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 p-5">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                        <h1 class="text-primary">Selamat Datang {{ Auth::user()->name }}!</h1>
                                        <p class="text-gray-700 mb-0">Di Admin Panel Balkondes Borobudur</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center">
                                    {{-- <img class="img-fluid" src="/admin/assets/img/illustrations/at-work.svg" style="max-width: 26rem" /> --}}
                                    @if (Auth::user()->profile != null)
                                        <img class="img-fluid img-account-profile rounded-circle" style="max-width: 26rem" src="{{ Storage::url(Auth::user()->profile) }}" />
                                    @else
                                        <img class="img-fluid img-account-profile rounded-circle" style="max-width: 26rem"
                                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="col-lg-12 col-xl-12 mb-4">
                        <div class="card bg-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="small">Produk Budaya</div>
                                        <div class="text-lg fw-bold">{{ $products }}</div>
                                    </div>
                                    <i class="feather-xl" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="stretched-link" href="{{ route('products.index') }}">Selengkapnya</a>
                                <div class=""><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Travel Wisata</div>
                                        <div class="text-lg fw-bold">{{ $trips }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="navigation"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link" href="{{ route('trips.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="col-lg-12 col-xl-12 mb-4">
                        <div class="card bg-light h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="small">Desa</div>
                                        <div class="text-lg fw-bold">{{ $villages }}</div>
                                    </div>
                                    <i class="feather-xl" data-feather="folder"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="stretched-link" href="{{ route('trips.index') }}">Selengkapnya</a>
                                <div class=""><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Cerita Budaya</div>
                                        <div class="text-lg fw-bold">{{ $cultures }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="clock"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('culture-histories.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Colored Cards for Dashboard Demo-->
            <div class="row">

            </div>
        </div>
    </main>
@endsection
