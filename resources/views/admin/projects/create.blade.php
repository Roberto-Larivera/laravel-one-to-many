@extends('layouts.admin')
@section('head-title', 'Create | ')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    Aggiungi Progetto
                </h1>

            </div>
            <div class="col">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">
                    Torna Indietro
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            </div>
        </div>
        @if ($errors->any())

            <div class="row mb-5">
                <div class="col">
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label  @error('title') text-danger @enderror ">Title <span
                                class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="Example Title" maxlength="98" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name_repo" class="form-label  @error('name_repo') text-danger @enderror">Name
                            Repo <span class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control @error('name_repo') is-invalid @enderror" id="name_repo"
                            name="name_repo" placeholder="example-name-repo" maxlength="98" value="{{ old('name_repo') }}"
                            required>
                        @error('name_repo')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link_repo" class="form-label  @error('link_repo') text-danger @enderror">Link
                            Repo <span class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control @error('link_repo') is-invalid @enderror" id="link_repo"
                            name="link_repo" placeholder="https://github.com/Example-link/name-repo" maxlength="255"
                            value="{{ old('link_repo') }}" required>
                        @error('link_repo')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="featured_image"
                            class="form-label  @error('featured_image') text-danger @enderror">Featured Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                            id="featured_image" name="featured_image" {{-- validazione frontend da aggiungere --}} {{-- si usa per i file --}}
                            accept="image/*">
                        @error('featured_image')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description"
                            class="form-label  @error('description') text-danger @enderror">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Lorem ipsum dolor sit amet ..." rows="3" maxlength="4096"> {{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <p>
                            Fields marked with <span class="text-danger fw-bold">*</span> are <span
                                class="text-danger fw-bold">mandatory</span>
                        </p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mb-3">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
