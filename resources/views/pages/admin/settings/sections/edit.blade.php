@extends('layouts.admin')

@section('title')
    Edit Sections
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
                                Edit Sections
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('sections.index') }}">
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
                        <div class="card-header">Informasi Section</div>
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
                            <form action="{{ route('sections.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="name">section</label>
                                        <select name="section" id="" class="form-select">
                                            <option value="1" @if ($item->section == 1) selected @endif>Hero
                                            </option>
                                            <option value="2" @if ($item->section == 2) selected @endif>Travel
                                            </option>
                                        </select>
                                        @error('section')
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

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="name">Title</label>
                                        <input class="form-control @error('title') is-invalid @enderror" name="title"
                                            type="text" value="{{ $item->title }}" required />
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="name">Deskripsi</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="15"
                                            name="description" value="{{ old('description') }}">{{ $item->description }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">
                                    Update Section
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
