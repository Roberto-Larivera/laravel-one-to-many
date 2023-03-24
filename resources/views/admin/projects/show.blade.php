@extends('layouts.admin')
@section('head-title', ' Project | ')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    {{ $project->id }} - {{ $project->title }}
                </h1>
            </div>
            <div class="col">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">
                    Torna Indietro
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                @include('admin.projects.partials.delete')
            </div>
        </div>
        @include('admin.projects.partials.warning')
        @include('admin.projects.partials.success')
        @include('admin.projects.partials.errors')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row g-0">
                        {{-- verifica se c'è l'immagine --}}
                        @if (isset($project->featured_image))
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $project->featured_image) }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                        @endif
                        <div class="col-md-8">
                            <div class="card-body h-100">
                                <h5 class="card-title">Titolo: {{ $project->title }}</h5>
                                <p class="card-text">Slug: {{ $project->slug }}</p>
                                <p class="card-text">Nome Repo: {{ $project->name_repo }}</p>
                                <p class="card-text">Link Repo: {{ $project->link_repo }}</p>
                                <p class="card-text">Descrizione: {!! nl2br($project->description)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
