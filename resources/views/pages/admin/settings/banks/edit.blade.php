@extends('layouts.admin')

@section('title')
    Edit Bank
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="folder"></i></div>
                                Edit Bank
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('banks.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Informasi Bank</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('banks.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="name">Bank</label>
                                        <input class="form-control" name="bank" type="text" value="{{ $item->bank }}" />
                                        @error('bank')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            @if (substr($item->image, 0, 5) == 'https')
                                                <img src="{{ $item->image }}" class="img-thumbnail" alt="image_village">
                                            @else
                                                <img src="{{ Storage::url('/assets/banks/images/' . $item->image) }}"
                                                    class="img-thumbnail" alt="image_village">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="name">Thumbnail</label>
                                            <input class="form-control @error('image') is-invalid @enderror" name="image"
                                                type="file" value="{{ old('image') }}" />
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Account Holder</label>
                                        <input class="form-control @error('account_holder') is-invalid @enderror"
                                            name="account_holder" type="text" value="{{ $item->account_holder }}"
                                            required />
                                        @error('account_holder')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Account Number</label>
                                        <input class="form-control @error('account_number') is-invalid @enderror"
                                            name="account_number" type="text" value="{{ $item->account_number }}"
                                            required />
                                        @error('account_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">
                                    Update Bank
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
